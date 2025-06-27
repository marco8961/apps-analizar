<?php

// Paso 1: Incluir el autoload de Composer.
// Esta línea es OBLIGATORIA para poder usar CUALQUIER librería de Composer.
require 'vendor/autoload.php';

// Paso 2: Importar la clase Carbon para poder usarla fácilmente.
use Carbon\Carbon;

// Establecer el idioma a Español para que los nombres de los días y meses salgan en nuestro idioma.
Carbon::setLocale('es');

// Obtener la fecha y hora actual, especificando la zona horaria de Perú.
$ahora_en_lima = Carbon::now('America/Lima');

// Crear una fecha específica para hacer comparaciones.
$fecha_mision = Carbon::create(2025, 6, 20, 10, 0, 0, 'America/Lima');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba de Fechas con Carbon</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        strong { color: #2c3e50; }
    </style>
</head>
<body>
    <h1>Pruebas con la Librería Carbon</h1>

    <p>
        <strong>Fecha y hora actual en Lima:</strong><br>
        <?php echo $ahora_en_lima->toDateTimeString(); ?>
    </p>

    <p>
        <strong>La misma fecha, pero en un formato más legible y en español:</strong><br>
        <?php echo $ahora_en_lima->translatedFormat('l, d \d\e F \d\e Y, h:i A'); ?>
    </p>

    <p>
        <strong>Añadiendo 7 días a la fecha actual:</strong><br>
        <?php echo $ahora_en_lima->addDays(7)->translatedFormat('l, d \d\e F'); ?>
    </p>

    <p>
        <strong>¿Cuánto tiempo ha pasado desde el inicio de la misión (20 de Junio de 2025)?</strong><br>
        <?php echo $fecha_mision->diffForHumans(); ?>
    </p>

</body>
</html>
