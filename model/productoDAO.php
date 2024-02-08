<?php
// Incluimos archivos necesarios
include_once 'config/db.php';
include_once 'menus.php';
include_once 'platos.php';
include_once 'postres.php';
include_once 'bebidas.php';
include_once 'producto.php';
include_once 'pedido.php';

// Clase que maneja la interacción con la base de datos para los productos
class ProductoDAO
{
    // Obtenemos todos los productos de todas las categorías
    public static function getAllProduct()
    {

        $listaAllProductos = [];

        // Obtenemos productos de cada categoría y los combinamos en una lista única
        $listaAllProductos[] = ProductoDAO::getAllByTipe('Menus');
        $listaAllProductos[] = ProductoDAO::getAllByTipe('Platos');
        $listaAllProductos[] = ProductoDAO::getAllByTipe('Postres');
        $listaAllProductos[] = ProductoDAO::getAllByTipe('Bebidas');
        $listaProductos = array_merge($listaAllProductos[0], $listaAllProductos[1], $listaAllProductos[2], $listaAllProductos[3]);
        return $listaProductos;
    }

    // Obtenemos todos los productos de una categoría específica
    public static function getAllByTipe($categoria)
    {
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM productos WHERE categoria=?");
        $stmt->bind_param("s", $categoria);

        //Ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        $listaProductos = [];

        // Recorremos los resultados y creamos objetos de producto según la categoría
        while ($row = $result->fetch_assoc()) {
            $productoBD = $categoria === 'Bebidas' ?
                new Bebidas(
                    $row['id'],
                    $row['nombre'],
                    $row['precio'],
                    $row['categoria'],
                    $row['foto'],
                    isset($row['mayor']) ? $row['mayor'] : null
                ) :
                new Producto(
                    $row['id'],
                    $row['nombre'],
                    $row['precio'],
                    $row['categoria'],
                    $row['foto']
                );
            $listaProductos[] = $productoBD;
        }


        return $listaProductos;
    }

    // Obtenemos un producto por su ID y categoría
    public static function getProductoById($id, $categoria)
    {
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM productos WHERE id=?");
        $stmt->bind_param("i", $id);

        //Ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        // Creamos un objeto de producto según la categoría
        if ($categoria == 'Bebidas') {
            $row = $result->fetch_assoc();
            $producto = new Bebidas(
                $row['id'],
                $row['nombre'],
                $row['precio'],
                $row['categoria'],
                $row['foto'],
                isset($row['mayor']) ? $row['mayor'] : null
            );
        } else {
            $row = $result->fetch_assoc();
            $producto = new Producto(
                $row['id'],
                $row['nombre'],
                $row['precio'],
                $row['categoria'],
                $row['foto']
            );
        }
        return $producto;
    }

    // Eliminamos un producto por su ID
    public static function deleteProduct($id)
    {
        $con = DataBase::connect();

        $stmt = $con->prepare("DELETE FROM productos WHERE id=?");
        $stmt->bind_param("i", $id);

        //Ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    // Actualizamos la información de un producto
    public static function updateProduct($id, $nombre, $precio, $categoria, $foto)
    {
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE productos SET nombre=?, precio=?, categoria=?, foto=? WHERE id=?");
        $stmt->bind_param("sdssi",  $nombre, $precio, $categoria, $foto, $id);

        //Ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    // Creamos un nuevo producto en la base de datos
    public static function crearProducto($nombre, $precio, $categoria, $foto)
    {
        $con = DataBase::connect();

        $stmt = $con->prepare("INSERT INTO productos (nombre, precio, categoria, foto) VALUES (?, ?, ?, ?)");

        $stmt->bind_param("sdss", $nombre, $precio, $categoria, $foto);

        if (!$stmt->execute()) {
            return "Producto no añadido en la base de datos";
        }
        //Ejecutamos la consulta
        $result = $stmt->get_result();

        $con->close();

        return $result;
    }

    // Creamos un nuevo pedido en la base de datos y actualizamos los puntos de fidelidad del usuario
    public static function crearPedido($id_usuario, $fecha, $total, $session)
{
    $con = DataBase::connect();
    $stmt = $con->prepare("INSERT INTO pedidos (id_usuario, hora, total) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isdi", $id_usuario, $fecha, $total);
    $stmt->execute();

    $añadirID = $con->insert_id;

    foreach ($session as $articulos) {
        $cantidad = $articulos->getCantidad();
        $idProducto = $articulos->getProducto()->getId();
        $productos_Pedido = $con->prepare("INSERT INTO productos_pedido (id_producto, cantidad, id_pedido) VALUES (?, ?, ?)");
        $productos_Pedido->bind_param("iii", $idProducto, $cantidad, $añadirID);
        $productos_Pedido->execute();
    }
    return $añadirID;
}


    
}
