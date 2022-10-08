<?php
    declare(strict_types=1);
    
    function mostrarImagen($porcentaje="10") {
        $palos = ["bastos","copas","espadas","oros"];
        $rutaCartas = "../img/barajaEspa/";
        $puntuacion = 0;
        for($i = 0; $i <= 10; $i++) {
            $paloAleatorio = random_int(1,3);
            $cartaAleatoria = random_int(1,11);
            echo ("<img src='$rutaCartas$palos[$paloAleatorio]/$palos[$paloAleatorio]".strval($cartaAleatoria).".png' alt='carta' width='{$porcentaje}%'/>\n");
        }
        echo ("<p>$puntuacion</p>");
    }
    mostrarImagen();

    function verPuntuacion($palo, $carta) {
        return "";
    }
?>
