<?php
    require_once("Producto.php");
    class Carrito {
    private $listaProductos = [];
/**
 * > Si el producto ya está en el carrito, aumenta la cantidad, de lo contrario, lo agrega al carrito
 * con una cantidad de 1
 * 
 * @param Producto producto El producto a añadir al carrito.
 */
        function aniadir(Producto $producto) {
            if (in_array($producto, $this->listaProductos)) {
                //incrementar la cantidad del qeu teniamos guardado
                $producto->cantidad++;
            } else {
                $producto->cantidad=1;
                array_push($this->listaProductos, $producto);
            }
        }
        function __toString() {
            return "Carro: ".json_encode($this->listaProductos,JSON_UNESCAPED_UNICODE);
        }
    }
?>