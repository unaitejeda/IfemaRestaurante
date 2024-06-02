<?php
include_once 'config/db.php';
include_once 'repartidor.php';
include_once 'pedido.php'; 

class RepartidorDAO {
    // Consultas SQL como constantes
    const QUERY_INSERT_REPARTIDOR = "INSERT INTO repartidores (nombre, metodo_transporte, usuario, contraseña) VALUES (?, ?, ?, ?)";
    const QUERY_SELECT_REPARTIDOR = "SELECT * FROM repartidores WHERE usuario = ? AND contraseña = ?";
    const QUERY_SELECT_PEDIDOS_REPARTIDOR = "SELECT * FROM pedidos WHERE repartidor = ?";
    const QUERY_SELECT_ALL_PEDIDOS = "SELECT * FROM pedidos";
    const QUERY_UPDATE_PEDIDO_ACEPTADO = "UPDATE pedidos SET estado = 'aceptado' WHERE id = ?";
    const QUERY_SELECT_PEDIDOS_ASIGNADOS = "SELECT * FROM pedidos WHERE repartidor = ? AND estado = 'aceptado'";

    public static function registrarRepartidor($nombre, $metodo_transporte, $usuario, $contraseña) {
        $con = DataBase::connect();
        $stmt = $con->prepare(self::QUERY_INSERT_REPARTIDOR);
        $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);
        $stmt->bind_param('ssss', $nombre, $metodo_transporte, $usuario, $hashed_password);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public static function buscarRepartidor($usuario, $contraseña) {
        $con = DataBase::connect();
        $stmt = $con->prepare(self::QUERY_SELECT_REPARTIDOR);
        $stmt->bind_param("ss", $usuario, $contraseña);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public static function obtenerPedidos($usuario) {
        $con = DataBase::connect();
        $stmt = $con->prepare(self::QUERY_SELECT_PEDIDOS_REPARTIDOR);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $pedidos = array();
        while ($row = $result->fetch_assoc()) {
            $pedidos[] = $row;
        }
        return $pedidos;
    }
    

    public static function obtenerPedidosGenerales() {
        $con = DataBase::connect();
        $result = $con->query(self::QUERY_SELECT_ALL_PEDIDOS);
        $pedidos = array();
        while ($row = $result->fetch_assoc()) {
            $pedidos[] = $row;
        }
        return $pedidos;
    }
    
    

    public static function aceptarPedido($pedido_id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("UPDATE pedidos SET estado = 'aceptado' WHERE id = ?");
        $stmt->bind_param("i", $pedido_id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public static function rechazarPedido($pedido_id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("UPDATE pedidos SET estado = 'rechazado' WHERE id = ?");
        $stmt->bind_param("i", $pedido_id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
    

    public static function obtenerPedidosAsignados($usuario) {
        $con = DataBase::connect();
        $stmt = $con->prepare(self::QUERY_SELECT_PEDIDOS_ASIGNADOS);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $pedidos = array();
        while ($row = $result->fetch_assoc()) {
            $pedido = new Pedido($row['id'], $row['cliente'], $row['descripcion'], $row['estado']);
            $pedidos[] = $pedido;
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
    
    

    public static function actualizarDisponibilidad($usuario, $disponibilidad) {
        $con = DataBase::connect();
        $stmt = $con->prepare("UPDATE repartidores SET disponibilidad = ? WHERE usuario = ?");
        $stmt->bind_param("is", $disponibilidad, $usuario);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
    

    public static function actualizarPerfil($usuario, $nombre, $metodo_transporte, $disponibilidad) {
        $con = DataBase::connect();
        $stmt = $con->prepare("UPDATE repartidores SET nombre = ?, metodo_transporte = ?, disponibilidad = ? WHERE usuario = ?");
        $stmt->bind_param("ssis", $nombre, $metodo_transporte, $disponibilidad, $usuario);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}
?>
