
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Iniciar sesión
session_start();

// Incluir archivo de configuración
require_once "config.php";

$usuario = $password = "";
$error = "";

// Procesar datos del formulario cuando se envía
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar que el usuario no esté vacío
    if(empty(trim($_POST["usuario"]))){
        $error = "Por favor ingrese su usuario.";
    } else{
        $usuario = trim($_POST["usuario"]);
    }
    
    // Validar que la contraseña no esté vacía
    if(empty(trim($_POST["password"]))){
        $error = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Si no hay errores, continuar
    if(empty($error)){
        // **USO DE SENTENCIAS PREPARADAS PARA PREVENIR INYECCIÓN SQL**
        $sql = "SELECT id, usuario, password_hash FROM usuarios WHERE usuario = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_usuario);
            $param_usuario = $usuario;
            
            if($stmt->execute()){
                $stmt->store_result();
                
                if($stmt->num_rows == 1){                    
                    $stmt->bind_result($id, $usuario, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Contraseña correcta, iniciar sesión
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["usuario"] = $usuario;                            
                            
                            header("location: portal.php");
                        } else{
                            $error = "La contraseña que ingresaste no es válida.";
                        }
                    }
                } else{
                    $error = "No se encontró ninguna cuenta con ese nombre de usuario.";
                }
            } else{
                echo "¡Uy! Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
            }
            $stmt->close();
        }
    }
    
    // Si hay errores, redirigir de vuelta al login
    if(!empty($error)){
        header("location: index.php?error=" . urlencode($error));
        exit;
    }

    $mysqli->close();
}
?>
