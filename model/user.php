<?php
// Incluimos la definición de la clase base "Usuarios"
include_once 'usuarios.php';

// Creamos la clase "User" que hereda de "Usuarios"
class User extends Usuarios{
    // Constructor vacío por ahora, ya que no agrega funcionalidad adicional
    public function __construct(){}

}
?>