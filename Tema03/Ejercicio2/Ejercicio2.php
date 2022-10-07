<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
<?php

    sorteoToString(); // Llamamos a la funcion

    function sorteo(int $numeros): array{ // Genera 6 numeros comprendidos entre 1,49 y los ordena
        $array=[];
        
        do {
            $numeroGenerado=random_int(1,49);
            
            if(!in_array($numeroGenerado, $array)) {
                array_push($array, $numeroGenerado);
            }
            
        } while(count($array) < $numeros);
        sort($array);
        return $array;
    }
    
    function sorteoToString() { // Imprime el resultado de la funcion sorteo() como tabla de html
        $array=sorteo(6);
        echo "<table><tr>\n  ";
        echo " <td>Numeros ganadores: </td> \n";
        
        for($i = 0; $i < count($array); $i++) { //Generar las celdas de numeros
            echo "<td> ",$array[$i]," </td>\n";
        }
        echo "</tr></table>\n";
    }
    ?>
</body>
</html>