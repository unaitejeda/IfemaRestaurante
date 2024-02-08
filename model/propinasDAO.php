<?php

include_once 'config/db.php';

class PropinasDAO
{

    public static function actualizarPropinaPedido($id_usuario, $propina)
    {
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE pedido SET propina = ? WHERE id = ?");
        $stmt->bind_param("ii", $propina, $id_usuario);

        if (!$stmt->execute()) {
            $con->close();
            return "No se pudo actualizar los puntos del cliente en la base de datos.";
        }

        $con->close();
        return "Puntos actualizados correctamente en la base de datos.";
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
