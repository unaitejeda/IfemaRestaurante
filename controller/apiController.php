<?php
include_once 'model/comentarios.php';
include_once 'model/comentariosDAO.php';

class ApiController{
    public function apiComentarios(){
        if($_GET["accion"] == 'buscar_review'){
            $comentarios = ComentariosDAO::getComentarios();
          //  var_dump($comentarios);
            $comenArray = [];
            foreach ($comentarios as $comentario) {
                $comenArray[] = [
                    'id' => $comentario->getId(),
                    'nombre' => $comentario->getNombreUsuario(),
                    'resenya' => $comentario->getResenya(),
                    'valoracion' => $comentario->getValoracion(),
                ];
            }
            header("Content-Type: application/json");
            echo json_encode($comenArray, JSON_UNESCAPED_UNICODE);
            return;    
        }
    }
}