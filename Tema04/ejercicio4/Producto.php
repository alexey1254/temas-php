<?php
    class Producto {
        private $atributos=[
            "id"=>0, 
            "nombre"=>"",
            "precio"=>0, 
            "descripcion"=>"", 
            "imagen"=>"", 
            "stock"=>""
    ];
        
        function __construct($id, $nombre, $precio, $descripcion, $imagen, $stock) {
            $this-> id =$id; 
            $this-> nombre = $nombre;
            $this-> precio = $precio;
            $this-> descripcion = $descripcion;
            $this-> imagen = $imagen;
            $this-> stock = $stock;
        }
    
        function __set($propiedad, $valor) {
            if($propiedad == "id" && $valor < 1) {
                throw new Exception("El id no es válido");
            }
            $this->atributos[$propiedad]=$valor;
        }

        function __get($propiedad){
            return $this->atributos[$propiedad];
        }

        function __toString() {
            return "Producto: ".json_encode($this->atributos, JSON_UNESCAPED_UNICODE);
        }
    }

?>