<?php
// Incluimos la definición de la clase base "Producto"
include_once 'producto.php';

// Creamos la clase "Platos" que hereda de "Producto"
class Platos extends Producto{
    
    // Constructor vacío por ahora, ya que no agrega funcionalidad adicional
    public function __construct(){}

}
?>