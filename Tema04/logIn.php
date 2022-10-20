<?php 
function checkAuth() {
    $validAuth=[
        'user'=>'dwes',
        'pass'=>'$6$vSeuwOWCW76fC421$ZT4EK2OtOcZY7E6ofRGzlimqxe72mJrIy74R.l3ZuRb8PHCNnUtj9xqK4tTdjs0qRVy5ZUWS3sbB25DQCBwX31'
    ];
    return isset($_SERVER['PHP_AUTH_USER'])
    && isset($_SERVER['PHP_AUTH_PW'])
    && $_SERVER['PHP_AUTH_USER']==$validAuth['user']
    && password_verify($_SERVER['PHP_AUTH_PW'], $validAuth['pass']);
    }
    if (!checkAuth()) {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.1 401 Unauthorized');
        echo("Usuario no reconocido!");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nombre de Usuario</label>
        <input type="text" name="usuario" id="usuarioID"/>
        <label>Contraseña</label>
        <input type="pass" name="contrasenia" id="contraseniaID"/>
        <button type="submit">Crear Cuenta</button>
    </form>

    <p>¿Quieres <a href="signIn.php">crear una Cuenta?</a></p>
</body>
</html>