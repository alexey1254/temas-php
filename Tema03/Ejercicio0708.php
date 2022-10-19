<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 y 8</title>
</head>
<body>
    <h1>Ejercicio 7 & 8</h1>

    <?php 

        function lineaCsvToTr(string $linea, string $tipoCelda="td", string $separador=";"):string {
            $res="";
            $campos=explode($separador,$linea);
            $res.="<tr>\n";
            foreach($campos as $campo) {
                $res.="<$tipoCelda>".$campo."</$tipoCelda>";
            }
            $res.="</tr>\n";
            return $res;
        }

        if(isset($_POST['ficheroCsv'])) {
            /** definir la ruta de configuración:*/
            defined("__CONFIG__") || require_once("ruta/config.php");
            // abre el 'ficheroCsv', en la carpeta 'tmp_name' en modo leer (read = 'r')
            $fichero=fopen($_FILES['ficheroCsv']['tmp_name'],"r");
            echo "<table>";
            echo lineaCsvToTr(fgets($fichero),"th");
            while(($linea=fgets($fichero))) {
                echo lineaCsvToTr($fichero);
            }
            echo "<table>\n";

        } elseif (isset($_POST['txtCsv'])) {
            $texto=$_POST['txtCsv'];
            $lineas=explode("\n",$texto);
            echo "<table>\n";
            echo "<thead>\n";
            lineaCsvToTr($lineas[0], "th");
            echo "</thead>\n";
            echo "</table>\n";
            echo "<tbody>\n";
            for ($i=1;$i<count($lineas);$i++) {
                lineaCsvToTr($lineas[$i]);
            }
        } elseif (isset($_POST['imagen'])) {
            $ficheroImg = $_FILES['fimagen']['tmp_name'];
            $imgBase64 = base64_encode(file_get_contents($ficheroImg));
            echo "<img src='data:",$_FILES['fimagen']['tmp_name'],base64,$imgBase64,"'/>";
        } else {
    ?>
    
    <form action="" method="post" enctype="multipart/form-data"></form>
        <input type="file" name="ficheroCsv" for="ficheroCSV"/>
        <button type="submit" name="ficheroCsv">Subir fichero</button>
    </form>
    <hr/>
    <form action="" method="post" enctype="multipart/form-data"></form>
    <label for="txtCsv"></label>
        <textarea name="txtCsv" rows="20" cols="80"></textarea>
        <button type="submit" name="txtCsv">Subir texto</button>
    </form>
    <hr/>
    <form action="" method="post" enctype="multipart/form-data"></form>
    <label for="imagen">Fichero de imagen a subir:</label> 
        <input type="image" name="fimagen" for="imagen" accept="image/*">
        <button type="submit" name="imagen">Subir imagen</button>
    </form>
    <?php 
        } 
    ?>
</body>
</html>