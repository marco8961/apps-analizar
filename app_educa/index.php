<?php
// Inicia la sesión para verificar si el usuario ya está autenticado.
session_start();

// Si el usuario ya inició sesión, lo redirige directamente al portal.
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: portal.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso al Sistema - FFAA del Perú</title>
    <style>
        /* Estilos generales del cuerpo de la página */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f5; /* Un fondo gris claro */
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Contenedor principal del formulario */
        .wrapper {
            width: 400px;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Estilo para la imagen/logo */
        .logo-container {
            margin-bottom: 20px;
        }
        .logo {
            max-width: 200px; /* Ancho máximo para el logo */
            height: auto;     /* Altura se ajusta automáticamente */
        }

        /* Estilos para los títulos */
        h1 {
            font-size: 1.6em;
            color: #2c3e50; /* Un azul oscuro y sobrio */
            margin-bottom: 5px;
        }

        h2 {
            font-size: 1.1em;
            color: #34495e;
            margin-bottom: 25px;
            font-weight: normal;
        }
        
        /* Estilo para el párrafo de instrucciones */
        .instructions {
            margin-bottom: 20px;
            color: #7f8c8d;
        }
        
        /* Contenedor para cada campo del formulario (label + input) */
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #34495e;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            box-sizing: border-box; /* Asegura que el padding no afecte el ancho total */
        }
        
        /* Estilo para el botón de envío */
        .btn-submit {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #34495e; /* Color principal */
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #2c3e50; /* Un poco más oscuro al pasar el mouse */
        }
        
        /* Estilo para el mensaje de error */
        .error-message {
            color: #c0392b; /* Rojo para errores */
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        
        <div class="logo-container">
            <img src="img/Untitled.png" alt="Emblema de las Fuerzas Armadas del Perú" class="logo">
        </div>

        <h1>Fuerzas Armadas del Perú</h1>
        <h2>Acceso al Sistema de Archivos Confidenciales</h2>

        <p class="instructions">Por favor, ingrese sus credenciales.</p>
        
        <?php
        // Muestra un mensaje de error si existe en la URL.
        if (!empty($_GET["error"])) {
            echo '<p class="error-message">' . htmlspecialchars($_GET["error"]) . '</p>';
        }
        ?>

        <form action="login_process.php" method="post">
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="usuario" required>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn-submit" value="Ingresar">
            </div>
        </form>
    </div>
</body>
</html>
