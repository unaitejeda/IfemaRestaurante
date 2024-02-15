<?php

include_once 'config/db.php';
include_once 'menus.php';
include_once 'platos.php';
include_once 'postres.php';
include_once 'bebidas.php';
include_once 'producto.php';
include_once 'pedido.php';
include_once 'pedidos.php';

class UsuarioDAO
{
    // Función para actualizar los puntos de fidelidad del usuario
    public static function mostrarPuntosFidelidad($id_usuario)
    {
        $con = DataBase::connect();

        // Obtenemos los puntos de fidelidad actuales del usuario
        $stmt = $con->prepare("SELECT puntos FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $puntosActuales = $row['puntos'];

        $con->close();

        // Devolvemos los puntos de fidelidad
        return $puntosActuales;
    }

    public static function actualizarPuntosFidelidad($id_usuario, $nuevosPuntos)
    {
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE usuarios SET puntos = ? WHERE id = ?");
        $stmt->bind_param("ii", $nuevosPuntos, $id_usuario);

        if (!$stmt->execute()) {
            $con->close();
            return "No se pudo actualizar los puntos del cliente en la base de datos.";
        }

        $con->close();
        return "Puntos actualizados correctamente en la base de datos.";
    }

    public static function acumularPuntosPorCompra($id_usuario, $total)
    {
        // Establece la tasa de conversión de puntos basada en el gasto 
        $tasaConversion = 0.5;

        // Calcula la cantidad de puntos a acumular
        $puntosAcumulados = round($total * $tasaConversion);

        // Obtén los puntos actuales del cliente
        $puntosActuales = self::mostrarPuntosFidelidad($id_usuario);

        // Actualiza los puntos del cliente sumando los puntos acumulados
        $nuevosPuntos = $puntosActuales + $puntosAcumulados;
        self::actualizarPuntosFidelidad($id_usuario, $nuevosPuntos);

        return $puntosAcumulados;
    }

    public static function calcularPuntosAcumulados($total, $id_usuario)
    {
        // Establece la tasa de conversión de puntos basada en el gasto (por ejemplo, 1 euro = 1 punto)
        $tasaConversion = 0.5;

        // Calcula la cantidad de puntos a acumular
        $puntosAcumulados = round($total * $tasaConversion);

        return $puntosAcumulados;
    }




    public static function qrLastPedido($pedidoId)
    {
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM pedidos WHERE id = ? ORDER BY id DESC LIMIT 1");
        $stmt->bind_param("i", $pedidoId);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $ultimoPedidoInfo = $result->fetch_assoc();

            $stmtUsuario = $con->prepare("SELECT puntos FROM usuarios WHERE id = ?");
            $stmtUsuario->bind_param("i", $ultimoPedidoInfo['id']);
            $stmtUsuario->execute();

            $resultUsuario = $stmtUsuario->get_result();

            if ($resultUsuario->num_rows > 0) {
                $usuarioInfo = $resultUsuario->fetch_assoc();
                $ultimoPedidoInfo['puntos'] = $usuarioInfo['puntos'];
            } else {
                $ultimoPedidoInfo['puntos'] = null;
            }

            $stmtUsuario->close();

            $stmtPlato = $con->prepare("SELECT id_producto FROM productos_pedido WHERE id_pedido = ?");
            $stmtPlato->bind_param("i", $pedidoId);
            $stmtPlato->execute();

            $resultPlato = $stmtPlato->get_result();

            if ($resultPlato->num_rows > 0) {
                $platoInfo = $resultPlato->fetch_assoc();
                $ultimoPedidoInfo['id_producto'] = $platoInfo['id_producto'];
            } else {
                $ultimoPedidoInfo['id_producto'] = null;
            }

            $stmtPlato->close();
        } else {
            $ultimoPedidoInfo = null;
        }

        $stmt->close();
        $con->close();

        return $ultimoPedidoInfo;
    }




    // public static function getPedidoById($id_pedido){
    //     $con = DataBase::connect();

    //     $stmt = $con->prepare("SELECT * FROM pedidos WHERE id = ?");
    //     $stmt->bind_param("i", $id_pedido);
    //     $stmt->execute();
    //     $resultado = $stmt->get_result();

    //     $pedidoActual = $resultado->fetch_object('Pedidos');

    //     $con->close();
    //     return $pedidoActual;

    // }




    // public static function obtenerIdUltimoPedido(){
    //     $con = DataBase::connect();

    //     $select_ultPedido = ("SELECT id FROM pedidos WHERE id_usuario = ? ORDER BY id DESC LIMIT 1");

    //     $stmt = $con->prepare($select_ultPedido);
    //     $stmt->bind_param("i", $_SESSION['id_usuario']);
    //     $stmt->execute();

    //     $resultado = $stmt->get_result();


    //     if ($resultado->num_rows > 0){
    //         $row = $resultado->fetch_object();
    //         $idUltimoPedido = $row->id;

    //         return $idUltimoPedido;
    //     }else{
    //         return null;
    //     }
    // }
    public static function getUltimoPedidoByUser($id)
    {
        $con = DataBase::connect();
        $query = "SELECT pedidos.id FROM pedidos WHERE id_usuario = ? ORDER BY pedidos.id DESC LIMIT 1";

        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->store_result();

        $stmt->bind_result($id);

        $stmt->fetch();

        return $id;
    }

    public static function getProductoByPedido($id_pedido)
    {
        $con = DataBase::connect();
        $query = "SELECT 
        productos_pedido.id_producto, 
        productos_pedido.cantidad, 
        productos_pedido.id_pedido, 
        pedidos.id,
        pedidos.id_usuario,
        pedidos.hora,
        pedidos.total,
        pedidos.propina,
        usuarios.puntos,
        usuarios.nombre
        FROM productos_pedido
        JOIN pedidos ON productos_pedido.id_pedido = pedidos.id
        JOIN usuarios ON pedidos.id_usuario = usuarios.id
        WHERE productos_pedido.id_pedido = ?;";

        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id_pedido);
        $stmt->execute();
        $result = $stmt->get_result();
        $detalles_pedido = array();
        while ($row = $result->fetch_assoc()) {
            //Por cada fila obtenemos los detalles del producto
            $id_producto = $row['id_producto'];
            $cantidad = $row['cantidad'];
            $nombre = $row['nombre'];
            $ID = $row['id'];
            $fecha = $row['hora'];
            $precioTotal = $row['total'];
            $propina = $row['propina'];
            $puntos = $row['puntos'];


            //Consulta para obtener los datos del producto y ademas el objeto Producto
            $producto_pedido = ProductoDAO::getProductByIdOnly($id_producto);

            //creamos el objeto pedido con el producto y la cantidad
            $pedido = new Pedido($producto_pedido);
            $pedido->setCantidad($cantidad);
            $pedido->setNombreUsuario($nombre);
            $pedido->setId($ID);
            $pedido->setHora($fecha);
            $pedido->setTotal($precioTotal);
            $pedido->setPropina($propina);
            $pedido->setPuntos($puntos);

            //Agregamos el objeto Pedido al array de detalles
            $detalles_pedido[] = $pedido;
        }
        return $detalles_pedido;
    }
}
