<?php
// Se incluyen los archivos necesarios.
include_once 'model/comentarios.php';
include_once 'model/comentariosDAO.php';
include_once 'model/usuarioDAO.php';

class ApiController
{
    public function apiComentarios()
    {
        // Dependiendo de la acción solicitada...
        if ($_GET["accion"] == 'buscar_review') {
            // Se obtienen los comentarios de la base de datos.
            $comentarios = ComentariosDAO::getComentarios();
            $comenArray = [];
            // Se recorren los comentarios y se almacenan en un array.
            foreach ($comentarios as $comentario) {
                $comenArray[] = [
                    'id' => $comentario->getId(),
                    'nombre' => $comentario->getNombreUsuario(),
                    'resenya' => $comentario->getResenya(),
                    'valoracion' => $comentario->getValoracion(),
                ];
            }
            // Se envía la respuesta en formato JSON.
            header("Content-Type: application/json");
            echo json_encode($comenArray, JSON_UNESCAPED_UNICODE);
            return;
        } elseif ($_GET["accion"] == 'insertar') {
            // Leer los datos JSON del flujo de entrada
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);

            // Asegurarse de que los datos necesarios están presentes
            if (isset($data['id_usuario']) && isset($data['resenya']) && isset($data['valoracion']) && isset($data['id_pedido'])) {
                // Extraer los datos
                $id_usuario = $data['id_usuario'];
                $resenya = $data['resenya'];
                $valoracion = $data['valoracion'];
                $id_pedido = $data['id_pedido'];
                // Crear el comentario en la base de datos.
                ComentariosDAO::crearComentarios($id_usuario, $resenya, $valoracion, $id_pedido);

                // Confirmar la inserción.
                echo "insertado";
            } else {
                // Enviar error si faltan datos.
                echo json_encode(['success' => false, 'error' => 'Faltan datos']);
            }
            return;
        } elseif ($_GET["accion"] == 'reviewId') {
            if (isset($_GET["pedido_id"])) {
                // Verificar si el pedido tiene una reseña asociada.
                $pedidoId = $_GET["pedido_id"];
                $tieneResenya = ComentariosDAO::tieneResenya($pedidoId);
                // Enviar la respuesta en formato JSON.
                header("Content-Type: application/json");
                echo json_encode(['tiene_resenya' => $tieneResenya]);
            } else {
                // Enviar error si no se proporciona un ID de pedido.
                echo json_encode(['error' => 'No se proporcionó un ID de pedido']);
            }
        } elseif ($_GET["accion"] == 'puntosUser') {
            // Leer los datos JSON del flujo de entrada
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);

            // Obtener el ID de usuario
            $id_usuario = $data['id_usuario'];
            if (isset($id_usuario)) {
                // Obtener los puntos de fidelidad asociados a ese usuario.
                $puntos = UsuarioDAO::mostrarPuntosFidelidad($id_usuario);
                // Enviar la respuesta en formato JSON.
                echo json_encode($puntos, JSON_UNESCAPED_UNICODE);
                return;
            } else {
                // Enviar error si no hay sesión iniciada.
                echo json_encode(['error' => 'No hay sesión iniciada']);
            }
            return;
        }
    }
}
?>
