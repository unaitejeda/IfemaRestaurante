<?php
include_once 'config/db.php';
include_once 'repartidor.php';
include_once 'pedido.php'; 

class RepartidorDAO {
    public static function registrarRepartidor($nombre, $metodo_transporte, $usuario, $contraseña) {
        $con = DataBase::connect();
        $stmt = $con->prepare("INSERT INTO repartidores (nombre, metodo_transporte, usuario, contraseña) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $nombre, $metodo_transporte, $usuario, $contraseña);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }    

    public static function buscarRepartidor($usuario, $contraseña) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM repartidores WHERE usuario = ? AND contraseña = ?");
        $stmt->bind_param("ss", $usuario, $contraseña);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }    

    public static function obtenerPedidosGenerales() {
        $con = DataBase::connect();
        $result = $con->query("SELECT * FROM pedidos");
        $pedidos = array();
        while ($row = $result->fetch_assoc()) {
            $pedidos[] = $row;
        }
        return $pedidos;
    }    

    public static function aceptarPedido($pedido_id, $repartidor_id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("UPDATE pedidos SET estado = 'aceptado', repartidor = ? WHERE id = ?");
        $stmt->bind_param("ii", $repartidor_id, $pedido_id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public static function rechazarPedido($pedido_id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("UPDATE pedidos SET estado = 'rechazado', repartidor = 0 WHERE id = ?");
        $stmt->bind_param("i", $pedido_id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public static function obtenerPedidosAsignados($repartidor_id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM pedidos WHERE repartidor = ? AND estado = 'aceptado'");
        $stmt->bind_param("i", $repartidor_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $pedidos = array();
        while ($row = $result->fetch_assoc()) {
            $pedidos[] = $row;
        }
        return $pedidos;
    }

    public static function buscarRepartidorPorUsuario($usuario) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM repartidores WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public static function buscarRepartidorPorId($repartidor_id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM repartidores WHERE id = ?");
        $stmt->bind_param("i", $repartidor_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public static function actualizarDisponibilidad($usuario, $disponibilidad) {
        $con = DataBase::connect();
        $stmt = $con->prepare("UPDATE repartidores SET disponibilidad = ? WHERE usuario = ?");
        $stmt->bind_param("is", $disponibilidad, $usuario);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public static function actualizarPerfil($usuario, $nombre, $metodo_transporte, $disponibilidad, $contraseña = null) {
        $con = DataBase::connect();
        if ($contraseña) {
            // Actualizar todos los campos, incluida la contraseña
            $stmt = $con->prepare("UPDATE repartidores SET nombre = ?, metodo_transporte = ?, disponibilidad = ?, contraseña = ? WHERE usuario = ?");
            $stmt->bind_param("ssiss", $nombre, $metodo_transporte, $disponibilidad, $contraseña, $usuario);
        } else {
            // Actualizar todos los campos excepto la contraseña
            $stmt = $con->prepare("UPDATE repartidores SET nombre = ?, metodo_transporte = ?, disponibilidad = ? WHERE usuario = ?");
            $stmt->bind_param("ssis", $nombre, $metodo_transporte, $disponibilidad, $usuario);
        }
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
    
}
?>
