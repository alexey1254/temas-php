<?php
    session_start();
    session_destroy();
    echo "<span>Se ha cerrado la sesión correctamente.</span><br><a href='./logIn.php'>Loguearse</a>";
    //header("Location: ./logIn.php");
?>