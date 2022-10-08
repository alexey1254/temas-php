<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo" for="archivo" accept="image/*" / >
        <span>Buscar</span>
        <button type="submit">Ok</button>
    </form>
    <?php
    if($_FILES) {
        $archivo = file_get_contents($_FILES["archivo"]["tmp_name"]) ;
        $archivoCodificado = base64_encode($archivo);
    }

    echo ("\n<br><img src='data:image/png;base64, $archivoCodificado' alt='' srcset=''>\n");
    ?>

</body>
</html>