<?php
//Creamos el controlador de las reseñas

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
}