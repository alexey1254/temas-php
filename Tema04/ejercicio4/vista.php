<?php
    declare(strict_types=1);
    require_once("Carrito.php");
    require_once("Producto.php");
    session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <style>
        main {
            display:grid;
            grid-template-columns: 2fr 1fr;
            overflow: auto;
            justify-items: center;
        }
        body {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 10vh 85vh 10vh;
        }
        h1,h2 {
            text-decoration: underline;
        }
        h1 {
            text-align: center;
        }
        
    </style>
</head>
<body>
    <h1>Tienda online sencilla la estilografica</h1>
    <main>
        
        <div id="catalogo">
            <h2>Productos</h2>
            <?php
            require_once("catalogo.php");
            ?>
        </div>
        <div id="carro">
            <h2>Carrito</h2>
        <?php 
        require_once("VistaCarro.php");
        ?>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>