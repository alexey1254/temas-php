<?php
    session_start();
    require_once("logIn.php");

    if($_SESSION['usuario'] != null || $_SESSION['usuario'] != "") {
        echo "<a href='verDatos.php'>Ver/modificar datos</a><br>";
        if($_SESSION['usuario']=="admin") {
            echo "<a href='./formularioAlta.html'>Alta de usuario</a><br>";
        }
        echo "<a href='logout.php'>Cerrar sesión</a><br>";
    }
    else {
        echo "<p>No tienes autorización para acceder a esta página</p>";
    }




?>