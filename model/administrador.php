<?php
// Incluimos la definición de la clase base "Usuarios"
include_once 'usuarios.php';

// Creamos la clase "Administrador" que hereda de "Usuarios"
class Administrador extends Usuarios{
    
    // Constructor vacío por ahora, ya que hereda el constructor de la clase base
    public function __construct(){}

}
?>