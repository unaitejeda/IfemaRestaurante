<?php

include_once 'config/db.php';
include_once 'menus.php';
include_once 'platos.php';
include_once 'postres.php';
include_once 'bebidas.php';
include_once 'producto.php';
include_once 'pedido.php';

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
    



    public static function qrLastPedido($pedidoId){
        $con = DataBase::connect();
    
        $stmt = $con->prepare("SELECT * FROM pedidos WHERE id = ?");
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
}
