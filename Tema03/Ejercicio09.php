<?php declare(strict_types = 1); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio09</title>
</head>
<body>
    <?php

    function mostrarFormulario($listaNumeros){
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="n">Número:</label>
            <input type="number" name="n" id="n"/><br/>
            <input type="hidden" name="listaNumeros" value="<?php echo $listaNumeros;?>"/><br/>
            <button type="submit">Sumar</button>
        </form>
        <?php
    }
    $listaNumeros="";
    if (isset($_POST['n'])) {
        $n=$_POST['n'];
        $listaNumeros=$_POST['listaNumeros'];
        if($n=="-1") {
            $numeros=explode("| ",$listaNumeros);
            $suma=0;
            for($i=1;$i<count($numeros);$i++) {
                $suma+=intval($numeros[$i]);
            }
            echo "Los números enviados son: $listaNumeros\n";
            echo "La suma es: $suma";
        } else {
            $listaNumeros.="| ".$n;
            mostrarFormulario( $listaNumeros);
        }
    } else {
            mostrarFormulario($listaNumeros);
    }
    ?>
</body>
</html>