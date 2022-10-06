<?php 

    function mostrarNumImagen(string $numero, string $rutaRelativa, string $porcentaje="100") {
        $numAleatorio=strval(random_int(10000,99999));
        for($i=0;$i<strlen($numero);$i++) {
            echo "<img src='$rutaRelativa$numero[$i].png' alt='numero-$numero[$i]' width='{$porcentaje}%'/>";
        }
    }
?>