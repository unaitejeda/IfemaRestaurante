<?php

include_once 'config/db.php';

class UsuarioDAO
{
    // Función para actualizar los puntos de fidelidad del usuario
    public static function mostrarPuntosFidelidad($id_usuario)
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

    public static function actualizarPuntosFidelidad($id_usuario, $nuevosPuntos)
    {
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE usuarios SET puntos = ? WHERE id = ?");
        $stmt->bind_param("ii", $nuevosPuntos, $id_usuario);

        if (!$stmt->execute()) {
            $con->close();
            return "No se pudo actualizar los puntos del cliente en la base de datos.";
        }

        $con->close();
        return "Puntos actualizados correctamente en la base de datos.";
    }

    public static function acumularPuntosPorCompra($id_usuario, $total)
    {
    // Establece la tasa de conversión de puntos basada en el gasto 
    $tasaConversion = 0.5;

    // Calcula la cantidad de puntos a acumular
    $puntosAcumulados = round($total * $tasaConversion);

    // Obtén los puntos actuales del cliente
    $puntosActuales = self::mostrarPuntosFidelidad($id_usuario);

    // Actualiza los puntos del cliente sumando los puntos acumulados
    $nuevosPuntos = $puntosActuales + $puntosAcumulados;
    self::actualizarPuntosFidelidad($id_usuario, $nuevosPuntos);

    return $puntosAcumulados;
    }

    public static function calcularPuntosAcumulados($total, $id_usuario)
    {
        // Establece la tasa de conversión de puntos basada en el gasto (por ejemplo, 1 euro = 1 punto)
        $tasaConversion = 0.5;
    
        // Calcula la cantidad de puntos a acumular
        $puntosAcumulados = round($total * $tasaConversion);
    
        return $puntosAcumulados;
    }
    
}
