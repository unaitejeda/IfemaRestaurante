<?php
include_once 'model/comentarios.php';
include_once 'model/comentariosDAO.php';
include_once 'model/usuarioDAO.php';

class ApiController
{
    public function apiComentarios()
    {
        if ($_GET["accion"] == 'buscar_review') {
            $comentarios = ComentariosDAO::getComentarios();
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
        } elseif ($_GET["accion"] == 'insertar') {
            // Leer los datos JSON del flujo de entrada
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);

            // Asegúrate de que los datos necesarios están presentes
            if (isset($data['id_usuario']) && isset($data['resenya']) && isset($data['valoracion']) && isset($data['id_pedido'])) {
                $id_usuario = $data['id_usuario'];
                $resenya = $data['resenya'];
                $valoracion = $data['valoracion'];
                $id_pedido = $data['id_pedido'];
                ComentariosDAO::crearComentarios($id_usuario, $resenya, $valoracion, $id_pedido);

                echo "insertado";
            } else {
                echo json_encode(['success' => false, 'error' => 'Faltan datos']);
            }
            return;
        } elseif ($_GET["accion"] == 'reviewId') {
            if (isset($_GET["pedido_id"])) {
                $pedidoId = $_GET["pedido_id"];
                $tieneResenya = ComentariosDAO::tieneResenya($pedidoId);
                header("Content-Type: application/json");
                echo json_encode(['tiene_resenya' => $tieneResenya]);
            } else {
                echo json_encode(['error' => 'No se proporcionó un ID de pedido']);
            }
        } elseif ($_GET["accion"] == 'puntosUser') {
            if (isset($_SESSION['id'])) {
                $id_usuario = $_SESSION['id'];
                $puntos = UsuarioDAO::actualizarPuntosFidelidad($id_usuario);
                echo json_encode(['puntos' => $puntos]);
            } else {
                echo json_encode(['error' => 'No hay sesión iniciada']);
            }
            return;
        }
    }
}
