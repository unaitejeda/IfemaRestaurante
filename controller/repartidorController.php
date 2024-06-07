<?php

include_once 'model/repartidorDAO.php';

class RepartidorController {
    public function mostrarFormularioRegistro() {
        include_once 'view/registroRepartidor.php';
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $metodo_transporte = $_POST['metodo_transporte'];
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];

            $resultado = RepartidorDAO::registrarRepartidor($nombre, $metodo_transporte, $usuario, $contraseña);

            if ($resultado) {
                header('Location: ?controller=producto&action=inicio');
            } else {
                echo "Error en el registro.";
            }
        }
    }

    public function mostrarFormularioLogin() {
        include_once 'view/loginRepartidor.php';
    }

    public function login() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];

            $repartidor = RepartidorDAO::buscarRepartidor($usuario, $contraseña);

            if ($repartidor) {
                // Iniciar sesión
                $_SESSION['usuario'] = $repartidor['usuario'];
                $_SESSION['repartidor_id'] = $repartidor['id']; 

                header('Location: ?controller=repartidor&action=pedidos');
            } else {
                echo "Credenciales incorrectas.";
            }
        }
    }

    public function pedidos() {
        session_start();

        $pedidos = RepartidorDAO::obtenerPedidosGenerales();

        include_once 'view/pedidosGenerales.php';
    }

    public function verPedidosGenerales() {
        session_start();
        if (!isset($_SESSION['repartidor_id'])) {
            header('Location: ?controller=repartidor&action=mostrarFormularioLogin');
            exit();
        }
    
        $repartidor_id = $_SESSION['repartidor_id'];
        $repartidor = RepartidorDAO::buscarRepartidorPorId($repartidor_id);
        $pedidos = RepartidorDAO::obtenerPedidosGenerales();
    
        require_once __DIR__ . '/../view/pedidosGenerales.php';
    }
    

    public function aceptarPedido() {
        session_start();
        if (!isset($_SESSION['repartidor_id'])) {
            header('Location: ?controller=repartidor&action=mostrarFormularioLogin');
            exit();
        }

        $pedido_id = $_GET['id'];
        $repartidor_id = $_SESSION['repartidor_id'];

        $resultado = RepartidorDAO::aceptarPedido($pedido_id, $repartidor_id);
        if ($resultado) {
            // Recargar la misma página
            header('Location: ?controller=repartidor&action=verPedidosGenerales');
            exit();
        } else {
            echo "Error al aceptar el pedido.";
        }
    }

    public function rechazarPedido() {
        session_start();
        if (!isset($_SESSION['repartidor_id'])) {
            header('Location: ?controller=repartidor&action=mostrarFormularioLogin');
            exit();
        }

        $pedido_id = $_GET['id'];

        $resultado = RepartidorDAO::rechazarPedido($pedido_id);
        if ($resultado) {
            // Recargar la misma página
            header('Location: ?controller=repartidor&action=verPedidosGenerales');
            exit();
        } else {
            echo "Error al rechazar el pedido.";
        }
    }

    public function verMisPedidos() {
        session_start();
        if (!isset($_SESSION['repartidor_id'])) {
            header('Location: ?controller=repartidor&action=mostrarFormularioLogin');
            exit();
        }

        $repartidor_id = $_SESSION['repartidor_id'];
        $pedidos = RepartidorDAO::obtenerPedidosAsignados($repartidor_id);
        require_once __DIR__ . '/../view/misPedidos.php';
    }

    public function perfil() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ?controller=repartidor&action=mostrarFormularioLogin');
            exit();
        }
        $repartidor = RepartidorDAO::buscarRepartidorPorUsuario($_SESSION['usuario']);
        include_once 'view/perfilRepartidor.php';
    }

    public function actualizarPerfil() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ?controller=repartidor&action=mostrarFormularioLogin');
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $metodo_transporte = $_POST['metodo_transporte'];
            $usuario = $_SESSION['usuario']; 
    
            $disponibilidad = isset($_POST['disponibilidad']) ? 1 : 0;
    
            $contraseña = !empty($_POST['contraseña']) ? $_POST['contraseña'] : null;
    
            $resultado = RepartidorDAO::actualizarPerfil($usuario, $nombre, $metodo_transporte, $disponibilidad, $contraseña);
    
            if ($resultado) {
                header('Location: ?controller=repartidor&action=verPedidosGenerales');
                exit();
            } else {
                echo "Error al actualizar el perfil.";
            }
        }
    }
    

    public function actualizarDisponibilidad() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ?controller=repartidor&action=mostrarFormularioLogin');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $disponibilidad = isset($_POST['disponibilidad']) ? 1 : 0;
            $usuario = $_SESSION['usuario'];
            $resultado = RepartidorDAO::actualizarDisponibilidad($usuario, $disponibilidad);
            if ($resultado) {
                header('Location: ?controller=repartidor&action=verPedidosGenerales');
                exit();
            } else {
                echo "Error al actualizar la disponibilidad.";
            }
        }
    }
}
?>