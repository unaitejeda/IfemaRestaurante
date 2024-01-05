<?php

include_once 'config/db.php';
include_once 'menus.php';
include_once 'platos.php';
include_once 'postres.php';
include_once 'bebidas.php';
include_once 'producto.php';

class ProductoDAO
{
    public static function getAllProduct()
    {
        //Prepaaremos la consulta


        $listaAllProductos = [];
        //Obtengo la lista de mis dos clases

        $listaAllProductos[] = ProductoDAO::getAllByTipe('Menus');
        $listaAllProductos[] = ProductoDAO::getAllByTipe('Platos');
        $listaAllProductos[] = ProductoDAO::getAllByTipe('Postres');
        $listaAllProductos[] = ProductoDAO::getAllByTipe('Bebidas');
        $listaProductos = array_merge($listaAllProductos[0], $listaAllProductos[1], $listaAllProductos[2], $listaAllProductos[3]);
        return $listaProductos;
    }


    public static function getAllByTipe($categoria)
    {
        //Prepaaremos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM productos WHERE categoria=?");
        $stmt->bind_param("s", $categoria);

        //Ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        //Almaceno el resultado en un lista
        $listaProductos = [];

        
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

    public static function getProductoById($id, $categoria)
    {
        //Prepaaremos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM productos WHERE id=?");
        $stmt->bind_param("i", $id);

        //Ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        
        if($categoria == 'Bebidas'){
            $row = $result->fetch_assoc();
            $producto = new Bebidas(
                $row['id'],
                $row['nombre'],
                $row['precio'],
                $row['categoria'],
                $row['foto'],
                isset($row['mayor']) ? $row['mayor'] : null
            ); 
        }else{
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




    public static function deleteProduct($id)
    {
        $con = DataBase::connect();

        $stmt = $con->prepare("DELETE FROM productos WHERE id=?");
        $stmt->bind_param("i", $id);

        //Ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        // $con->close();
        return $result;
    }

    public static function updateProduct($id, $nombre, $precio, $categoria, $foto)
    {
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE productos SET nombre=?, precio=?, categoria=?, foto=? WHERE id=?");
        $stmt->bind_param("sdssi",  $nombre, $precio, $categoria, $foto, $id);

        //Ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        // $con->close();
        return $result;
    }

    public static function crearProducto($nombre, $precio, $categoria, $foto)
    {
        $con = DataBase::connect();

        // Prepare the INSERT statement
        $stmt = $con->prepare("INSERT INTO productos (nombre, precio, categoria, foto) VALUES (?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("sdss", $nombre, $precio, $categoria, $foto);

        // Execute the INSERT statement
        if (!$stmt->execute()) {
            return "Producto no añadido en la base de datos";
        }
        // Get the result
        $result = $stmt->get_result();

        // Close the connection
        $con->close();

        // Return the result
        return $result;
    }
}
