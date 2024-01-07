<?php
// Incluimos el DAO de productos
include_once 'productoDAO.php';

// Clase que representa un pedido
class Pedido{
    private $producto;
    private $cantidad = 1;

    // Constructor que recibe un producto para el pedido
    public function __construct($producto){
        $this->producto=$producto;
    }

    /**
     * Get the value of producto
     */ 
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set the value of producto
     *
     * @return  self
     */ 
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    //Calcula y devuelve el precio total del pedido
    public function devuelvePrecio(){
        return $this->producto->getPrecio()*$this->cantidad;
    }
}