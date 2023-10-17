<?php
include_once('controller/pedidoController.php');
include_once('config/parameters.php');
/*if(isset($_GET['controller'])){
    echo 'Quieres realizar una accion sobre '.$GET['controller'];
    if(isset($_GET['action'])){
        echo 'Sobre '.$GET['controller'].' quieres mostrar la pagina '.$GET['action']; 
    }else{
        echo 'No me has pasado controller';
    }
}*/
if(!isset($GET['controller'])){
    //Si no se pasa nada, se mostrara pagina principal de pedidos
    header("Location:".url.'?controller=pedido');
}else{
    $nombre_controller = $GET['controller'].' Controller ';

    if(class_exists($nombre_controller)){
        //Miramos si nos pasa una accion
        //si no mostramos por defecto

        $controller = new $nombre_controller();

        if(isset($GET['action']) && method_exists($controller, $_GET['action'])){
            $action = $GET['action'];
        }else{
            $action = action_default;
        }
        $controller->$action();
    }else{
        header("Location:".url.'?controller=pedido');
    }
}

?>