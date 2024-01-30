<?php

include_once 'config/db.php';

class UsuarioDAO
{
    // Función para actualizar los puntos de fidelidad del usuario
    public static function actualizarPuntosFidelidad($id_usuario, $puntosUtilizados)
    {
        $con = DataBase::connect();

        // Obtenemos los puntos de fidelidad actuales del usuario
        $stmt = $con->prepare("SELECT puntos FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $puntosActuales = $row['puntos'];

        // Calculamos los nuevos puntos de fidelidad después de restar los puntos utilizados
        $nuevosPuntos = max(0, $puntosActuales - $puntosUtilizados);

        // Actualizamos los puntos de fidelidad del usuario en la base de datos
        $stmt = $con->prepare("UPDATE usuarios SET puntos = ? WHERE id = ?");
        $stmt->bind_param("ii", $nuevosPuntos, $id_usuario);
        $stmt->execute();

        $con->close();
    }
}
