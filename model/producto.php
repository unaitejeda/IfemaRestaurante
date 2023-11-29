<?php
    abstract class Producto{
        protected   $id;
        protected $nombre;
        protected $precio;
        protected $categoria;
        protected $foto;

        public function __construct($id, $nombre, $precio,$categoria, $foto){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->categoria = $categoria;
            $this->foto = $foto;
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
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->nombre;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of precio
         */ 
        public function getPrecio()
        {
                return $this->precio;
        }

        /**
         * Set the value of precio
         *
         * @return  self
         */ 
        public function setPrecio($precio)
        {
                $this->precio = $precio;

                return $this;
        }

        /**
         * Get the value of id_categoria
         */ 
        public function getcategoria()
        {
                return $this->categoria;
        }

        /**
         * Set the value of id_categoria
         *
         * @return  self
         */ 
        public function setcategoria($categoria)
        {
                $this->categoria = $categoria;

                return $this;
        }

        /**
         * Get the value of foto
         */ 
        public function getFoto()
        {
                return $this->foto;
        }

        /**
         * Set the value of foto
         *
         * @return  self
         */ 
        public function setFoto($foto)
        {
                $this->foto = $foto;

                return $this;
        }
}
?>