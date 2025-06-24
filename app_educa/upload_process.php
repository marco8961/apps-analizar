<?php
session_start();

// Redirigir si no está logueado
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

// Incluir la configuración de la BD
require_once "config.php";

// Verificar que el formulario se envió y que el archivo existe
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == 0){

    $nombre_archivo = $_FILES['archivo']['name'];
    $tipo_archivo = $_FILES['archivo']['type'];
    $tamano_archivo = $_FILES['archivo']['size'];
    $ruta_temporal = $_FILES['archivo']['tmp_name'];
    $subido_por = $_SESSION['id'];

    // Leer el contenido del archivo en una variable
    $datos_archivo = file_get_contents($ruta_temporal);

    if($datos_archivo !== false) {
        // Preparar la consulta SQL para insertar los datos
        $sql = "INSERT INTO archivos (nombre_archivo, tipo_archivo, tamano_archivo, datos_archivo, subido_por) VALUES (?, ?, ?, ?, ?)";

        if($stmt = $mysqli->prepare($sql)){

            // Enlazar los parámetros. 's' para string, 'i' para integer, 'b' para blob.
            $null = NULL; // Variable para enlazar el blob
            $stmt->bind_param("ssibi", $nombre_archivo, $tipo_archivo, $tamano_archivo, $null, $subido_por);

            // Enviar los datos del archivo (el blob) por separado
            $stmt->send_long_data(3, $datos_archivo);

            if($stmt->execute()){
                // Si todo va bien, redirigir al portal con mensaje de éxito
                header("location: portal.php?upload_success=1");
                exit();
            } else {
                // Si falla la ejecución, redirigir con un error
                header("location: portal.php?upload_error=" . urlencode("Error al guardar en la BD: " . $stmt->error));
                exit();
            }
            $stmt->close();
        } else {
            header("location: portal.php?upload_error=" . urlencode("Error al preparar la consulta: " . $mysqli->error));
            exit();
        }
    } else {
        header("location: portal.php?upload_error=" . urlencode("No se pudo leer el contenido del archivo."));
        exit();
    }

} else {
    // Si no se envió un archivo o hubo un error en la subida
    $error_msg = "Por favor, selecciona un archivo válido.";
    if(isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] != 0){
        $error_msg = "Error en la subida del archivo: " . $_FILES["archivo"]["error"];
    }
    header("location: portal.php?upload_error=" . urlencode($error_msg));
    exit();
}

$mysqli->close();
?>
