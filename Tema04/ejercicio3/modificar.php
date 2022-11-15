<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        require_once("../../config.php");
        require_once("../../funciones.php");
        $datosUsuario = buscarUsuario($_SESSION['usuario'], DATA_PATH . "/bdUsuarios.txt");
?>
    <form id="alta" action="altaUsuario.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label>Nombre:</label></td>
                <td><input type="text" name="nombre" required="required" value="<?=$datosUsuario['nombre']?>" /></td>
            </tr>
            <tr>
                <td><label>Primer Apellido:</label></td>
                <td><input type="text" name="ap1" required="required" value="<?=$datosUsuario['ap1']?>"/></td>
            </tr>
            <tr>
                <td><label>Segundo Apellido:</label></td>
                <td><input type="text" name="ap2" value="<?=$datosUsuario['ap2']?>"/></td>
            </tr>
            <tr>
                <td><label>Nombre de Usuario:</label></td>
                <td><input type="text" readonly="readonly" required="required" name="user" value="<?=$datosUsuario['user']?>"/><br/></td>
            </tr>
            <tr>
                <td><label>Contraseña:</label></td>
                <td><input type="password" name="pass1" required="required"/></td>
            </tr>
            <tr>
                <td><label>Confirmar contraseña:</label></td>
                <td><input type="password" name="pass2"required="required"/></td>
            </tr>
            <tr>
                <td><label>E-mail:</label></td>
                <td><input type="email"name="email" required="required" value="<?=$datosUsuario['email']?>"/><br/></td>
            </tr>
        </table>
        <button type="submit" onclick="chequearDatos()">Crear Cuenta</button>
    </form>
<?php
/*
        echo 
        "<div>
            <span>Tus datos son: </span><br>\n".
            "<span>Nombre :". $datosUsuario['nombre']."</span><br>\n".
            "<span>Apellido :". $datosUsuario['ap1']."</span><br>\n". 
            "<span>Apellido 2 :". $datosUsuario['ap2']."</span><br>\n".
            "<span>Usuario :". $datosUsuario['user']."</span><br>\n". 
            "<span>Email :". $datosUsuario['email']."</span><br>\n". 
        "</div>";
        */
    }
?>