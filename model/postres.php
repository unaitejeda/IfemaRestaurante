<?php
// Incluimos la definición de la clase base "Producto"
include_once 'producto.php';

// Creamos la clase "Postres" que hereda de "Producto"
class Postres extends Producto{
    
    // Constructor vacío por ahora, ya que no agrega funcionalidad adicional
    public function __construct(){}

}
?>