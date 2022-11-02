<?php
    require_once("requiereIdent.php");
    require_once("logIn.php");
    $user = $_SESSION['user'];
    echo "<a href='modificar.php'>Ver/modificar datos</a><br>";

    if($user==="admin") {
        echo "<a href='altaUsuario.php'>Alta de usuario</a><br>";
    }
    echo "<a href='logout.php'>Cerrar sesion</a><br>";
?>