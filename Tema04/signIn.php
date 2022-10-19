<?php 

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
</head>
<body>
    <style>
        td {
            text-align: right;
        }
    </style>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label>Nombre:</label></td>
                <td><input type="text"/></td>
            </tr>
            <tr>
                <td><label>Primer Apellido:</label></td>
                <td><input type="text"/></td>
            </tr>
            <tr>
                <td><label>Segundo Apellido:</label></td>
                <td><input type="text"/></td>
            </tr>
            <tr>
                <td><label>Nombre de Usuario:</label></td>
                <td><input type="text"/><br/></td>
            </tr>
            <tr>
                <td><label>Contraseña:</label></td>
                <td><input type="password"/></td>
            </tr>
            <tr>
                <td><label>E-mail:</label></td>
                <td><input type="email"/><br/></td>
            </tr>
        </table>
        <button type="submit">Crear Cuenta</button>
    </form>
</body>
</html>