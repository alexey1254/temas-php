<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
    </style>
    <div class="container">
        <h1>Juego de la brisa</h1>
        <div >
        <?php
        $mano=sorteo();
        obtenerPuntuacion($mano);
        ?>
        </div>
    </div>

    <?php
    /**
     * Metodo que genera una mano de 10 cartas de forma aleatoria
     */
    function sorteo(){
        $palos = ['bastos','copas','espadas','oros'];
        $mano =[];
        do {
            $nuevo=$palos[random_int(0,3)];
            $nuevo .= ";".random_int(1,12);
            if(!in_array($nuevo,$mano)){
                array_push($mano,$nuevo);  
            }
        } while (count($mano)<10);
        return $mano;

    }
    /**
     * Funcion que muestra la imagen de una carta
     */
    function mostrarImgen(string $carta){
        $cartavalor = explode(";",$carta);
        echo "<img src='./barajaEspa/",$cartavalor[0],"/",$cartavalor[0],$cartavalor[1],".png' />";
    }

    /**
     * Funcion que obtiene la puntuacion y llama a mostrarImagen
     */
    function obtenerPuntuacion(array $mano){
        $puntuaciones = ['11','0','10','0','0','0','0','0','0','2','3','4'];
        $puntuacionTotal = 0;
        foreach ($mano as $carta) {
            $cartaExplode = explode(";",$carta);
            $cartaValor= intval($cartaExplode[1])-1;
            $puntuacionTotal += intval($puntuaciones[$cartaValor]);
            mostrarImgen($carta);
        }
        echo "Tu puntuación total es: " ,$puntuacionTotal;
    }
    ?>
</body>
</html>