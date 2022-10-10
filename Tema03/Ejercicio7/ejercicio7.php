<?php declare(strict_types=1);?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" id="form1" enctype="multipart/form-data">  <!--Subir el fichero-->
        <input type="file" name="archivo" accept="text/csv" >
        <button type="submit">Subir</button>
        
    </form>
    <form action="" method="post" id="form2" enctype="multipart/form-data"><br><br><br>
        <textarea name="texto" id="texto" cols="50" rows="20" ></textarea>
        <button type="submit">Ver</button>
        <?php
            function cogerTexto() {
                $texto = $_POST["texto"];
                $text = explode(chr(10),$texto);

                // tabla
                echo "<table border='1'>\n";
                $celda=[];
                for($i=0;$i<=count($text);$i++) {
                    $celda = explode(";",$text[$i]);
                    echo "<tr>\n";
                    foreach ($celda as $td) {
                        echo "<td> $td </td>";
                    }
                    echo "</tr>\n";
                }
                echo "</table>";
            }
            cogerTexto();
        ?>
    </form>
</body>
</html>

