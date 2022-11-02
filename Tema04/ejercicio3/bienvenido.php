<?php 
declare(strict_types=1);

if (!isset($_SERVER['PHP_AUTH_USER'])) {
header('WWW-Authenticate: Basic Realm="Contenido restringido"');
header('HTTP/1.1 401 Unauthorized');
echo "Usuario no reconocido!";
exit;
}

?>