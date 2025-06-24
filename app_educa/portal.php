<?php
session_start();

// Verificar si el usuario está logueado, si no, redirigirlo a la página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

require_once "config.php";

// Obtener lista de archivos
$files = [];
$sql = "SELECT id, nombre_archivo, tipo_archivo, tamano_archivo, fecha_subida FROM archivos ORDER BY fecha_subida DESC";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $files[] = $row;
        }
        $result->free();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Portal Confidencial</title>
    <style>
        body { font-family: sans-serif; }
        .page-header { display: flex; justify-content: space-between; align-items: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["usuario"]); ?></b>. Bienvenido al sistema.</h1>
        <a href="logout.php">Cerrar Sesión</a>
    </div>

    <h2>Subir Nuevo Archivo Confidencial</h2>
    <form action="upload_process.php" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo" required>
        <input type="submit" value="Subir Archivo">
    </form>
    <?php 
    if(!empty($_GET["upload_success"])){ echo '<p style="color:green;">Archivo subido correctamente.</p>'; }
    if(!empty($_GET["upload_error"])){ echo '<p style="color:red;">' . htmlspecialchars($_GET["upload_error"]) . '</p>'; }
    ?>

    <h2>Archivos Almacenados</h2>
    <?php if(!empty($files)): ?>
    <table>
        <thead>
            <tr>
                <th>Nombre del Archivo</th>
                <th>Tipo</th>
                <th>Tamaño (bytes)</th>
                <th>Fecha de Subida</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($files as $file): ?>
            <tr>
                <td><?php echo htmlspecialchars($file['nombre_archivo']); ?></td>
                <td><?php echo htmlspecialchars($file['tipo_archivo']); ?></td>
                <td><?php echo $file['tamano_archivo']; ?></td>
                <td><?php echo $file['fecha_subida']; ?></td>
                <td><a href="view_file.php?id=<?php echo $file['id']; ?>">Descargar</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>No hay archivos almacenados en la base de datos.</p>
    <?php endif; ?>

</body>
</html>
