<?php
// config.php - Configuración de la base de datos

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'web_user'); // El usuario que creamos
define('DB_PASSWORD', 'linux123'); // La contraseña que asignamos
define('DB_NAME', 'fuerzas_armadas_db');

// Intentar conectar a la base de datos
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar conexión
if($mysqli === false){
    // En producción, no mostrarías un error detallado
    die("ERROR: No se pudo conectar. " . $mysqli->connect_error);
}
?>
