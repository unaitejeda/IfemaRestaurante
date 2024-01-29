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

    public static function crearComentarios($id_usuario, $resenya, $valoracion, $id_pedido)
    {
        // Conexión a la base de datos
        $con = DataBase::connect();

        // Preparar la consulta
        $stmt = $con->prepare("INSERT INTO comentarios (id_usuario, resenya, valoracion, id_pedido) VALUES (?, ?, ?, ?)");



        // Vincular los parámetros
        $stmt->bind_param('isii', $id_usuario, $resenya, $valoracion, $id_pedido);

        // Ejecutar la consulta
        $stmt->execute();

        $id_resenya = $con->insert_id;


        $stmtPedidos = $con->prepare("UPDATE PEDIDOS SET id_resenya = $id_resenya WHERE id = $id_pedido");

        // Ejecutar la consulta
        $stmtPedidos->execute();

        return $stmt;
    }

    public static function getAllPedidos($id_usuario)
    {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM pedidos WHERE id_usuario=?");
        $stmt->bind_param("i", $id_usuario);

        if (!$stmt->execute()) {
            $con->close();
            return "No se muestran los pedidos";
        }

        $resultPedidos = $stmt->get_result();
        $pedidos = $resultPedidos->fetch_all(MYSQLI_ASSOC);

        $con->close();
        return $pedidos;
    }
    public static function selecPedidos($id_pedido)
    {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT p.*, c.id AS id_resenya 
                           FROM pedidos p 
                           LEFT JOIN comentarios c ON p.id_resenya = c.id 
                           WHERE p.id=?");
        $stmt->bind_param("i", $id_pedido);

        if (!$stmt->execute()) {
            $con->close();
            return "No se muestran los pedidos";
        }

        $checkPedido = $stmt->get_result();
        $pedido = $checkPedido->fetch_all(MYSQLI_ASSOC);

        $con->close();
        return $pedido;
    }

    public static function tieneResenya($id_pedido) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT COUNT(*) AS count FROM comentarios WHERE id_pedido = ?");
        $stmt->bind_param("i", $id_pedido);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $con->close();
        return $count > 0; // Devuelve true si hay una reseña, false si no la hay
    }
}
