<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

require_once "config.php";

if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];
    
    $sql = "SELECT nombre_archivo, tipo_archivo, datos_archivo FROM archivos WHERE id = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("i", $id);
        
        if($stmt->execute()){
            $stmt->store_result();
            if($stmt->num_rows == 1){
                $stmt->bind_result($nombre, $tipo, $datos);
                $stmt->fetch();

                // Enviar cabeceras para forzar la descarga o visualización
                header("Content-Type: " . $tipo);
                header("Content-Disposition: attachment; filename=\"" . $nombre . "\"");
                echo $datos;
                exit;
            }
        }
    }
    echo "Archivo no encontrado.";
} else {
    echo "ID de archivo inválido.";
}
?>
