<?php

/**
 * Busca un usuario en un archivo JSON y devuelve los datos del usuario si los encuentra, o falso si no los
 * encuentra
 * 
 * @param string user el nombre de usuario
 * @param string fullPath La ruta completa al archivo donde se almacenan los usuarios.
 * 
 * @return array|bool Un array con los datos del usuario o false si no se encuentra el usuario.
 */
function buscarUsuario(string $user, string $fullPath): array|bool {
    $fdBdUsuarios=fopen($fullPath,"r"); 
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
 * Toma un array de datos de usuario y una ruta de archivo, y agrega una versión codificada en JSON
 * de los datos de usuario al archivo.
 * 
 * @param array datosUsuario una matriz con los datos del usuario.
 * @param string rutaArchivo La ruta al archivo donde se almacenan los datos del usuario.
 */
function crearUsuario(array $datosUsuario, string $rutaArchivo) {
    $fdBdUsuarios=fopen($rutaArchivo, "a");
    $datosUsuario['password'] = password_hash($datosUsuario['user'], PASSWORD_DEFAULT);
    $datosUsuarioJSON = json_encode($datosUsuario, JSON_UNESCAPED_UNICODE);
    fputs($fdBdUsuarios, $datosUsuarioJSON."\n");
    fclose($fdBdUsuarios);
}



?>