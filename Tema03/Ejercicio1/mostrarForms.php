<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    
    <?php
    $filas=intval($_GET['f']);
    $columnas=intval($_GET['c']);
        function ponerMatriz(string $nombreArray, int $filas, int $columnas) {
            for($f=0;$f<$filas;$f++) {
                
                echo"<tr>\n";
                for($c=0;$c<$columnas;$c++) {
                    echo "<td>";
                    echo "<input type='number' name='$nombreArray".",[$f][]' size='5'/>";
                    echo "</td>\n";
                }
                echo "</tr>\n";
            }
        }
    ?>
    <form action="sumaMatrices.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <table border="1">
                        <caption>A</caption>
                        <?php 
                        ponerMatriz("a",$filas,$columnas);
                        ?>
                        
                    </table>
                </td>
                <td>
                    <caption>B</caption>
                    <table border="1">
                    <?php 
                        ponerMatriz("b",$filas,$columnas);
                        ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Enviar"></td>
                <td><input type="reset" value="Borrar"></td>
            </tr>
        </table>
    </form>
</body>
</html>