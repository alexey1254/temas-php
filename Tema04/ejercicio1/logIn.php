<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <?php 
        if(isset($_POST['username']) && isset($_POST['password'])) {
            require_once("../../config.php");
            require_once("../../funciones.php");
            $pass = $_POST['password'];
            $user = $_POST['username'];
            $rutaArchivo = DATA_PATH."/bdUsuarios.txt";
            $usuario = buscarUsuario($user, $rutaArchivo);
            if($usuario == false) {
                echo "<label>El usuario no existe</label>";
            } else {

                echo "<span>
                Bienvenido ".$usuario['nombre']."</span>\n";
            if(isset($_SERVER['PHP_AUTH_USER']) == "admin") {
                header("Location: ../ejercicio3/bienvenido.phpp");
            }
            }
        } else {
    ?>
    <style>
        td {
            text-align: right;
        }
    </style>
    <form id="login" action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label>Usuario:</label></td>
                <td><input type="text" name="username" required /></td>
            </tr>
            <tr>
                <td><label>Contraseña:</label></td>
                <td><input type="password" name="password" required/></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Ok</button></td>
            </tr>
        </table>
</body>
<?php } ?>
</html>