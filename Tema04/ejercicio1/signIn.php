<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de alta</title>
    <script>
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
    if(isset($_POST['email'])) {
        require_once("../../config.php");

        /**
         * Busca un usuario en un archivo y devuelve los datos del usuario si los encuentra, o falso si
         * no los encuentra
         * 
         * @param string user El nombre de usuario del usuario que desea buscar.
         * 
         * @return array|bool una matriz o un booleano.
         */
        function buscarUsuario(string $user): array|bool {
            $fdBdUsuarios=fopen(DATA_PATH."bdUsuarios.txt", "r"); 
            while($linea=fgets($fdBdUsuarios)) {
                $datosUsuario = json_decode($linea, true);
                if($datosUsuario['user']==$user) {
                    fclose($fdBdUsuarios);
                    return $datosUsuario;
                }
            }
            fclose($fdBdUsuarios);
            return false;
        }
        
        /**
         * Crea un usuario.
         * 
         * @param array datosUsuario Una matriz que contiene los datos del usuario.
         */
        function crearUsuario(array $datosUsuario) {
            $fdBdUsuarios=fopen(DATA_PATH."bdUsuarios.txt", "a");
            $datosUsuario['user'] = password_hash($datosUsuario['user'], PASSWORD_DEFAULT);
            $datosUsuarioJSON = json_encode($datosUsuario, JSON_UNESCAPED_UNICODE);
            fputs($fdBdUsuarios, $datosUsuarioJSON);
            fclose($fdBdUsuarios);
        }
        if(buscarUsuario($_POST['user'])==false) {
            $nombre=$_POST['nombre'];
            $ap1=$_POST['ap1'];
            $ap2=$_POST['ap2'];
            $user=$_POST['user'];
            $pass=$_POST['pass1'];
            $email=$_POST['email'];

            $datosUsuario = [
                "nombre"=>$ap1,
                "usuario" =>$user,
                "ap1" => $ap1,
                "ap2" => $ap2,
                "password" => $pass,
                "email" => $email
        ];
        crearUsuario($datosUsuario);
        echo "<span>Su usuario ha sido creado correctamente</span>";

        } else {
            echo "<span>El usuario ", $_POST['user']," ya existe</span>";
        }
        buscarUsuario($_POST('user'));
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
                <td><input type="text" required name="userName"/><br/></td>
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
        <button type="submit">Crear Cuenta</button>
    </form>
    <?php
        }
    ?>
</body>
</html>