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

    public function crearComentarios(){
        
        if ($_GET["accion"] == 'insertar') {
            // Leer los datos JSON del flujo de entrada
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);

            // Asegúrate de que los datos necesarios están presentes
            if (isset($data['id_usuario']) && isset($data['resenya']) && isset($data['valoracion'])) {
                $id_usuario = $data['id_usuario'];
                $resenya = $data['resenya'];
                $valoracion = $data['valoracion'];
                ComentariosDAO::crearComentarios($id_usuario, $resenya, $valoracion);

                echo "insertado";
            } else {
                echo json_encode(['success' => false, 'error' => 'Faltan datos']);
            }
            return;
        }
    }
}