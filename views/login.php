<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuarto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$error = '';
$success = '';

// Procesar formulario de login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $input_username = trim($_POST['username']);
    $input_password = trim($_POST['password']);
    
    if (empty($input_username) || empty($input_password)) {
        $error = "Por favor ingrese usuario y contraseña";
    } else {
        // Preparar consulta para evitar SQL injection
        $stmt = $conn->prepare("SELECT id, username, password, nombre FROM usuarios WHERE username = ?");
        $stmt->bind_param("s", $input_username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            // Verificar contraseña (asumiendo que está hasheada)
            if (password_verify($input_password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['nombre'] = $user['nombre'];
                
                // Redirigir a servicios
                echo "Redirigiendo a: index.php?action=servicios";
                var_dump($_SESSION);
                exit();
                header("Location: index.php?action=servicios");
                exit();
            } else {
                $error = "Credenciales incorrectas";
            }
        } else {
            $error = "Usuario no encontrado";
        }
        $stmt->close();
    }
}

// Resto del código para registro...
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login - Universidad Técnica de Ambato</title>
    <link rel="stylesheet" type="text/css" href="css/style.css ">
</head>
<body>
        <nav class="custom-nav">
        <a href="index.php?action=inicio">Inicio</a>
        <a href="index.php?action=nosotros">Nosotros</a>
        <a href="index.php?action=login">Servicios</a>
        <a href="index.php?action=contactanos">Contáctanos</a>
    </nav>  
    <br><br>
    <div class="login-container">
        <div class="login-header">
            <h1>UNIVERSIDAD TÉCNICA DE AMBATO</h1>
            <h2>SISTEMA INTEGRADO de Información</h2>
        </div>

        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>

        <div id="login-tab" class="tab-content active">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="login" class="btn">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>