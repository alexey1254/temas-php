<?php
require_once("./Producto.php");
$conexion = new MySQLi('localhost', 'productos', 'productos2021', 'productos');
if ($conexion->connect_errno != null) {
    echo "Error conectando a la base de datos de productos: ", $conexion->connect_error;
    exit();
}
$conexion->set_charset("utf8");
function mostrarTodosLosProductos($conexion) {
    $resultado = $conexion->query('SELECT * FROM producto');
    if ($resultado == null) {
        echo "Error realizando consulta a la base de datos de productos";
        exit();
    }
    echo "<table border='1'>\n";
    echo "<tr><th>ID</th><th>DESCRIPCIÓN</th><th>NOMBRE</th><th>PRECIO</th><th>IMAGEN</th></tr>";
    while ($producto = $resultado->fetch_assoc()) {
        echo "<tr>";
        foreach ($producto as $campo) {
            echo "<td>$campo</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";
    $conexion->close();
}

function crearProducto($conexion, $producto) {
    $id = $producto->__get("id");
    $descripcion = $producto->__get("descripcion");
    $nombre = $producto->__get("nombre");
    $precio = $producto->__get("precio");
    $sentencia = "INSERT INTO producto VALUES ($id, '$descripcion', '$nombre',$precio)";

    if ($conexion->query($sentencia) === TRUE) {
        echo "Se ha insertado el producto satisfactoriamente";
    } else {
        echo "Error: " . $sentencia . "<br>" . $conexion->error;
    }
    $conexion->close();
}
function leerProducto($conexion, $nombre) {
    $sentencia = "SELECT * FROM producto WHERE nombre like '%$nombre%'";
    $resultado = $conexion->query($sentencia);
    if ($resultado != null) {
        echo "<table border='1'>\n";
        echo "<tr><th>ID</th><th>DESCRIPCIÓN</th><th>NOMBRE</th><th>PRECIO</th><th>IMAGEN</th></tr>";
        while ($producto = $resultado->fetch_assoc()) {
            echo "<tr>";
            foreach ($producto as $campo) {
                echo "<td>$campo</td>";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    } else {
        echo "Error: " . $sentencia . "<br>" . $conexion->error;
    }

}

function updateProducto($conexion, $idProducto, $producto) {
    $id = $producto->__get("id");
    $descripcion = $producto->__get("descripcion");
    $nombre = $producto->__get("nombre");
    $precio = $producto->__get("precio");

    $sentencia = "UPDATE producto SET descripcion='$descripcion', nombre='$nombre', precio=$precio WHERE id=$idProducto";

    if ($conexion->query($sentencia) === TRUE) {
        echo "Se ha cambiado el producto con id $idProducto a: $nombre";
    } else {
        echo "Error: " . $sentencia . "<br>" . $conexion->error;
    }
    //$conexion->close();
}
function deleteProducto($conexion, $idProducto) {
    $sentencia = "DELETE FROM producto where id=$idProducto";
    if ($conexion->query($sentencia) === TRUE) {
        echo "Se ha eliminado el producto con id $idProducto";
    } else {
        echo "Error: " . $sentencia . "<br>" . $conexion->error;
    }
}

$prod1 = new Producto(4, "sierra mecanica de buen tamaño", "sierra mecanica", 12.80);
$prod2 = new Producto(1, "telefono2", "super telefono", 30.00);
//crearProducto($conexion, $prod1);
//leerProducto($conexion, 'mart'); // tiene que ser comilla simple
//updateProducto($conexion, 1, $prod2);
//mostrarTodosLosProductos($conexion);
//deleteProducto($conexion, 1);
//creo que no hay que poner conexion->close() en todas las funciones
?>
