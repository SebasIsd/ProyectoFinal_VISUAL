<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "models/conexion.php";

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $input_username = trim($_POST['username']);
    $input_password = trim($_POST['password']);

    if (empty($input_username) || empty($input_password)) {
        $error = "Por favor ingrese usuario y contraseña";
    } else {
        $result = pg_prepare($conn, "login_query", "SELECT usuario, contrasena, cargo FROM usuarios WHERE usuario = $1");
        $result = pg_execute($conn, "login_query", array($input_username));

        if ($result && pg_num_rows($result) == 1) {
            $user = pg_fetch_assoc($result);

        if ($input_password === $user['contrasena']) // Solo para pruebas  
        {
                $_SESSION['username'] = $user['usuario'];
                $_SESSION['cargo'] = $user['cargo'];
                $_SESSION['user_id'] = $user['usuario']; // IMPORTANTE

                header("Location: index.php?action=servicios");
                exit();
            } else {
                $error = "Credenciales incorrectas";
            }
        } else {
            $error = "Usuario no encontrado";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Sistema de Login - Universidad Técnica de Ambato</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <nav class="custom-nav">
        <a href="index.php?action=inicio">Inicio</a>
        <a href="index.php?action=nosotros">Nosotros</a>
        <a href="index.php?action=login">Servicios</a>
        <a href="index.php?action=contactanos">Contáctanos</a>
    </nav>
    <br /><br />
    <div class="login-container">
        <div class="login-header">
            <h1>UNIVERSIDAD TÉCNICA DE AMBATO</h1>
            <h2>SISTEMA INTEGRADO de Información</h2>
        </div>

        <?php if (!empty($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>

        <div id="login-tab" class="tab-content active">
            <!-- CAMBIO AQUÍ -->
            <form action="index.php?action=login" method="post">
                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" required />
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required />
                </div>
                <button type="submit" name="login" class="btn">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
