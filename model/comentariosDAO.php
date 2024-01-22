<?php
// Incluimos archivos necesarios
include_once 'config/db.php';
include_once 'comentarios.php';

// Clase que maneja la interacción con la base de datos para los productos
class ComentariosDAO
{
    public static function getComentarios(){
        $con = DataBase::connect();

        $query = "SELECT comentarios.id, comentarios.id_usuario, comentarios.resenya, comentarios.valoracion, usuarios.nombre 
        FROM comentarios  JOIN usuarios ON comentarios.id_usuario = usuarios.id;";

        $stmt = $con->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $comentario = [];
        while($row = $result->fetch_object('Comentarios')){
            $comentario[] = $row;
        }

        return $comentario;
    }
}