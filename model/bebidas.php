<?php
include_once 'producto.php';

class Bebidas extends Producto{

    protected $mayor = 0;

    public function __construct($id, $nombre, $precio, $categoria, $foto, $mayor){
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