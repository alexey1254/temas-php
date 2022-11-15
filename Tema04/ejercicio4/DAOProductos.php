<?php
require_once("Producto.php");
function getListaProductos() {
    return [
        new Producto(1,"Pelikan",300,"un boli", "./img/parker.png"),
        new Producto(1,"Parker",300,"un boli", "img/pelikan.png")
    ];
}
?>