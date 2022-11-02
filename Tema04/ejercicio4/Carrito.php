<?php
    require_once("Producto.php");
    class Carrito {
        private $listaProductos = [];


        function aniadir(Producto $producto) {
            if (in_array($producto, $this->listaProductos)) {
                //incrementar la cantidad del qeu teniamos guardado
                $producto->cantidad++;
            } else {
                $producto->cantidad=1;
                array_push($this->listaProductos, $producto);
            }
        }
    }
?>