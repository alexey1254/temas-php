<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej 4</title>
</head>
<body>
    <?php 

        function sorteo(){
            $numeros=[];
            do {
                $nuevo=random_int(1,49);
                if(!in_array($nuevo, $numeros)) {
                    array_push($numeros, $nuevo);
                }
            }while(count($numeros)<6);
            sort($numeros);
            return $numeros;
        }
        require_once("../librerias/funcionesAuxImagenes.php");

        
        echo "<table border='1'>";
        $numeros=sorteo();
        echo "<tr>\n";
        foreach($numeros as $numero){
            echo "<td>\n";
            mostrarNumImagen($numero, "../img/imgNumeros","15");
            echo "</td>\n";
        }
        echo "</tr>\n";
        echo "</table>";
    ?>
</body>
</html>