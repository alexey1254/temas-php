<?php
declare(strict_types=1);
session_start();
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin") {

    require_once("../../config.php");
    require_once("../../funciones.php");

    if (buscarUsuario($_POST["user"], DATA_PATH . "/bdUsuarios.txt") == false) { // Si no encuentra el usuario en el json:
        // Recogemos los datos del formulario
        $nombre = $_POST['nombre'];
        $ap1 = $_POST['ap1'];
        $ap2 = $_POST['ap2'];
        $user = $_POST['user'];
        $pass = $_POST['pass1'];
        $email = $_POST['email'];

        $datosUsuario = [ // Pasamos los datos del formulario a un array asociativo
            "nombre" => $nombre,
            "ap1" => $ap1,
            "ap2" => $ap2,
            "user" => $user,
            "password" => $pass,
            "email" => $email
        ];
        crearUsuario($datosUsuario, DATA_PATH . "/bdUsuarios.txt");
        echo "<span>El usuario ha sido creado correctamente</span><br><a href='formularioAlta.html'>Volver</a>";
    } else { // Cuando el usuario ya existe:
        echo "<span>El usuario ", $_POST['user'], " ya existe</span>";
    }
    buscarUsuario($_POST['user'], DATA_PATH . "/bdUsuarios.txt");
} else { // En caso de que el usuario no sea un administrador:
    echo "<span>Para enviar este formulario debes ser administrador</span><br>";
    echo "<a href='logIn.php'>Logueate como admin</a>";

}
