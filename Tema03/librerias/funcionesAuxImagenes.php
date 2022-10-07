<?php 

    function mostrarNumImagen(string $numero, string $rutaRelativa, string $porcentaje="10") {
        for($i = 0; $i < strlen($numero); $i++) {
            echo ("<img src='$rutaRelativa/$numero[$i].png' alt='numero-$numero[$i]' width='{$porcentaje}%'/>\n");
        }
    }
?>