<?php
// Incluimos la definición de la clase base "Producto"
include_once 'producto.php';

// Creamos la clase "Bebidas" que hereda de "Producto"
class Bebidas extends Producto{

    // Atributo adicional para las bebidas que sean para mayores de edad
    protected $mayor = 0;

    // Constructor de la clase con parámetros específicos para bebidas
    public function __construct($id, $nombre, $precio, $categoria, $foto, $mayor){
        //Inicializamos el atributo adicional
        parent::__construct($id, $nombre, $precio, $categoria, $foto);
        $this->mayor = $mayor;
    }


    /**
     * Get the value of mayor
     */ 
    public function getMayor()
    {
        return $this->mayor;
    }

    /**
     * Set the value of mayor
     *
     * @return  self
     */ 
    public function setMayor($mayor)
    {
        $this->mayor = $mayor;

        return $this;
    }
}
?>