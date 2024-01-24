<?php
//Creamos el controlador de las reseñas
include_once 'model/productoDAO.php';
include_once 'model/pedido.php';
include_once 'utils/CalculadoraPrecios.php';
// Definimos el controlador del producto
class reseñasController
{

    public function reseñas()
    {
        session_start();    
        //  //cabecera
         if (isset($_SESSION['username']) && $_SESSION['username'] == 'Admin') {

            include_once 'view/cabeceraadmin.php';
        } else {
            include_once 'view/cabecera.php';
        }
        //reseñas
        include_once 'view/reseñas.php';

        //footer
        include_once 'view/footer.php';
    }

    public function crearReseña(){
        session_start();    
        //  //cabecera
         if (isset($_SESSION['username']) && $_SESSION['username'] == 'Admin') {

            include_once 'view/cabeceraadmin.php';
        } else {
            include_once 'view/cabecera.php';
        }
        //reseñas
        include_once 'view/crearReseña.php';

        //footer
        include_once 'view/footer.php';
    }

    public function mostrarPedidos(){
        session_start();
        if (isset($_SESSION['id'])){
            $resultado = comentariosDAO::getAllPedidos($_SESSION['id']);
        } else{
            return "Debe iniciar sesión para ver pedidos";
        }

        if (isset($_SESSION['username']) && $_SESSION['username'] == 'Admin') {

            include_once 'view/cabeceraadmin.php';
        } else {
            include_once 'view/cabecera.php';
        }

        //pedidos
        include_once 'view/pedidos.php';

        //footer
        include_once 'view/footer.php';
    }
}