<?php
// Incluimos archivos necesarios
include_once 'config/db.php';
include_once 'comentarios.php';

// Clase que maneja la interacción con la base de datos para los productos
class ComentariosDAO
{
    public static function getComentarios()
    {
        $con = DataBase::connect();

        $query = "SELECT comentarios.id, comentarios.id_usuario, comentarios.resenya, comentarios.valoracion, usuarios.nombre 
        FROM comentarios  JOIN usuarios ON comentarios.id_usuario = usuarios.id;";

        $stmt = $con->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $comentario = [];
        while ($row = $result->fetch_object('Comentarios')) {
            $comentario[] = $row;
        }

        return $comentario;
    }

    public static function crearComentarios($id_usuario, $resenya, $valoracion)
    {
        // Conexión a la base de datos
        $con = DataBase::connect();

        // Preparar la consulta
        $stmt = $con->prepare("INSERT INTO comentarios (id_usuario, resenya, valoracion) VALUES (?, ?, ?)");

        // Vincular los parámetros
        $stmt->bind_param('isi', $id_usuario, $resenya, $valoracion);

        // Ejecutar la consulta
        $stmt->execute();
    }

    public static function getAllPedidos($id_usuario){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM pedidos WHERE id_usuario=?");
        $stmt->bind_param("i", $id_usuario);
        
        if (!$stmt->execute()){
            $con->close();
            return "No se muestran los pedidos";
        }

        $resultPedidos = $stmt->get_result();
        $pedidos = $resultPedidos->fetch_all(MYSQLI_ASSOC);

        $con->close();
        return $pedidos;
    }

    public static function selecPedidos($id_pedido){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM pedidos WHERE id=?");
        $stmt->bind_param("i", $id_pedido);
        
        if (!$stmt->execute()){
            $con->close();
            return "No se muestran los pedidos";
        }

        $checkPedido = $stmt->get_result();
        $pedido = $checkPedido->fetch_all(MYSQLI_ASSOC);

        $con->close();
        return $pedido;
    }
}
