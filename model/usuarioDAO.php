<?php

include_once 'config/db.php';

class UsuarioDAO
{
    // Función para actualizar los puntos de fidelidad del usuario
    public static function actualizarPuntosFidelidad($id_usuario)
    {
        $con = DataBase::connect();

        // Obtenemos los puntos de fidelidad actuales del usuario
        $stmt = $con->prepare("SELECT puntos FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $puntosActuales = $row['puntos'];

        $con->close();

        // Devolvemos los puntos de fidelidad
        return $puntosActuales;
    }

    
}
