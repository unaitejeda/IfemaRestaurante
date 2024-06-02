<?php
class Repartidor
{
    protected $id;
    protected $nombre;
    protected $metodo_transporte;
    protected $usuario;
    protected $contraseña;
    protected $disponibilidad;

    public function __construct()
    {
    }

    // Getters y Setters
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getMetodoTransporte()
    {
        return $this->metodo_transporte;
    }
    public function setMetodoTransporte($metodo_transporte)
    {
        $this->metodo_transporte = $metodo_transporte;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }
    public function setDisponibilidad($disponibilidad)
    {
        $this->disponibilidad = $disponibilidad;
    }
}
