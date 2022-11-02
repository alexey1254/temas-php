<?php declare(strict_types=1);
session_start();
if(isset($_SESSION['user']) && $_SESSION['user'] =="admin") {

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de alta</title>
    <script>
/**
 * Comprueba si las dos contraseñas son iguales
 * 
 * @return un valor booleano.
 */
        function chequearDatos() {
            const pass1 = document.forms('alta').pass1.value;
            const pass2 = document.forms('alta').pass2.value;
            
            if(pass1 != pass2) {
                alert("Las contraseñas no coinciden");
                return false;
            } else {
                return true;
            }
        }
    </script>
</head>
<body>
    <?php
    if(isset($_SERVER['PHP_AUTH_USER']) == "admin") {
        require_once("../../config.php");
        require_once("../../funciones.php");

        if(buscarUsuario($_POST["user"], DATA_PATH."/bdUsuarios.txt") == false) { // Si no encuentra el usuario en el json:
            $nombre=$_POST['nombre'];
            $ap1=$_POST['ap1'];
            $ap2=$_POST['ap2'];
            $user=$_POST['user'];
            $pass=$_POST['pass1'];
            $email=$_POST['email'];

            $datosUsuario = [
                "nombre"=>$ap1,
                "ap1" => $ap1,
                "ap2" => $ap2,
                "user" =>$user,
                "password" => $pass,
                "email" => $email
        ];
        crearUsuario($datosUsuario, DATA_PATH."/bdUsuarios.txt");
        echo "<span>Su usuario ha sido creado correctamente</span>";

        } else { // Cuando el usuario ya existe:
            echo "<span>El usuario ", $_POST['user']," ya existe</span>";
        }
        buscarUsuario($_POST['user'], DATA_PATH."/bdUsuarios.txt");
    } else {
    ?>
<style>
        td {
            text-align: right;
        }
    </style>
    <form id="alta" action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label>Nombre:</label></td>
                <td><input type="text" name="nombre" required /></td>
            </tr>
            <tr>
                <td><label>Primer Apellido:</label></td>
                <td><input type="text" name="ap1" required/></td>
            </tr>
            <tr>
                <td><label>Segundo Apellido:</label></td>
                <td><input type="text" name="ap2"/></td>
            </tr>
            <tr>
                <td><label>Nombre de Usuario:</label></td>
                <td><input type="text" required name="user"/><br/></td>
            </tr>
            <tr>
                <td><label>Contraseña:</label></td>
                <td><input type="password" name="pass1" required/></td>
            </tr>
            <tr>
                <td><label>Confirmar contraseña:</label></td>
                <td><input type="password" name="pass2"required/></td>
            </tr>
            <tr>
                <td><label>E-mail:</label></td>
                <td><input type="email"name="email" required/><br/></td>
            </tr>
        </table>
        <button type="submit" onclick="chequearDatos()">Crear Cuenta</button>
    </form>
    <?php
        }
    } else {
        header("Location: ./logIn.php");
    }
    ?>
</body>
</html>