<?php
// Define la contraseña que quieres usar
$password_claro = 'Tecsup2025';

// Genera el hash seguro
$hash_seguro = password_hash($password_claro, PASSWORD_DEFAULT);

// Muestra el hash en pantalla
echo "La contraseña es: " . $password_claro . "<br>";
echo "El hash que debes copiar en la base de datos es:<br><br>";
echo '<textarea rows="3" cols="70">' . $hash_seguro . '</textarea>';
?>
