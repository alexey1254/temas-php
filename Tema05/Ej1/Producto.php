<?php
class Producto {

    private $atributos=[
        "id"=>0, 
        "nombre"=>"",
        "precio"=>0.0, 
        "descripcion"=>""
];
    function __construct($id, $descripcion, $nombre, $precio) {
        $this->atributos["id"]=$id;
        $this->atributos["descripcion"]=$descripcion;
        $this->atributos["nombre"]=$nombre;
        $this->atributos["precio"]=$precio;
    }
    function __get($propiedad) {
        return $this->atributos[$propiedad];
    }
    function __set($propiedad, $valor) {
        $this->atributos[$propiedad]=$valor;
    }
}

?>