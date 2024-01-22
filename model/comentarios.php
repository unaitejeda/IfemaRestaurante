<?php
// Clase que representa un producto
    class Comentarios{
        // Atributos protegidos para el encapsulamiento
        protected $id;
        protected $id_usuario;
        protected $nombre;
        protected $resenya;
        protected $valoracion;

        // Constructor que inicializa los atributos del producto
        public function __construct(){
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of id_usuario
         */ 
        public function getId_usuario()
        {
                return $this->id_usuario;
        }

        /**
         * Set the value of id_usuario
         *
         * @return  self
         */ 
        public function setId_usuario($id_usuario)
        {
                $this->id_usuario = $id_usuario;

                return $this;
        }
        /**
         * Get the value of NombreUusario
         */ 
        public function getNombreUsuario()
        {
                return $this->nombre;
        }

        /**
         * Set the value of NombreUsuario
         *
         * @return  self
         */ 
        public function setNombreUsuario($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of resenya
         */ 
        public function getResenya()
        {
                return $this->resenya;
        }

        /**
         * Set the value of resenya
         *
         * @return  self
         */ 
        public function setResenya($resenya)
        {
                $this->resenya = $resenya;

                return $this;
        }

        /**
         * Get the value of valoracion
         */ 
        public function getValoracion()
        {
                return $this->valoracion;
        }

        /**
         * Set the value of valoracion
         *
         * @return  self
         */ 
        public function setValoracion($valoracion)
        {
                $this->valoracion = $valoracion;

                return $this;
        }

    }