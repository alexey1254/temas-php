<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        require_once("../../config.php");
        require_once("../../funciones.php");
        $datosUsuario = buscarUsuario($_SESSION['usuario'], DATA_PATH . "/bdUsuarios.txt");
        echo 
        "<div>
            <span>Tus datos son: </span><br>\n".
            "<span>Nombre :". $datosUsuario['nombre']."</span><br>\n".
            "<span>Apellido :". $datosUsuario['ap1']."</span><br>\n". 
            "<span>Apellido 2 :". $datosUsuario['ap2']."</span><br>\n".
            "<span>Usuario :". $datosUsuario['user']."</span><br>\n". 
            "<span>Email :". $datosUsuario['email']."</span><br>\n". 
        "</div>";
    }
?>