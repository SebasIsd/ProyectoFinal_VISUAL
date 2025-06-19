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
        $result = pg_prepare($conn, "login_query", "SELECT usuario, contrasena, nombre, cargo FROM usuarios WHERE usuario = $1");
        $result = pg_execute($conn, "login_query", array($input_username));

        if ($result && pg_num_rows($result) == 1) {
            $user = pg_fetch_assoc($result);

            // Validar solo contraseña hasheada
            if (password_verify($input_password, $user['contrasena'])) {
                $_SESSION['username'] = $user['usuario'];
                $_SESSION['cargo'] = $user['cargo'];
                $_SESSION['user_id'] = $user['usuario'];
                $_SESSION['nombre'] = $user['nombre'];

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
    <meta charset="UTF-8">
    <title>Login - Universidad Técnica de Ambato</title>
    <style>
        /* Mantenemos solo los estilos necesarios */
        :root {
            --uta-rojo: #8B0000;
            --uta-oscuro: #6b0000;
            --uta-claro: #f9f9f9;
            --sombra: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transicion: all 0.3s ease;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: var(--uta-claro);
            color: #333;
            line-height: 1.6;
        }

        .login-container {
            max-width: 500px;
            margin: 5rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: var(--sombra);
            text-align: center;
        }

        .login-header h1 {
            color: var(--uta-rojo);
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .login-header h2 {
            color: var(--uta-oscuro);
            font-size: 1.2rem;
            margin-bottom: 2rem;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--uta-oscuro);
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: inherit;
            font-size: 1rem;
            transition: var(--transicion);
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--uta-rojo);
            box-shadow: 0 0 0 2px rgba(139, 0, 0, 0.1);
        }

        .btn {
            background-color: var(--uta-rojo);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: var(--transicion);
            width: 100%;
            font-weight: 500;
        }

        .btn:hover {
            background-color: var(--uta-oscuro);
            transform: translateY(-2px);
        }

        .error {
            color: #d9534f;
            background-color: #f8d7da;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }

        .success {
            color: #28a745;
            background-color: #d4edda;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            .login-container {
                margin: 2rem auto;
                padding: 1.5rem;
            }
        }

        nav {
      background-color: var(--uta-oscuro);
      display: flex;
      justify-content: center;
      box-shadow: var(--sombra);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    nav a {
      color: white;
      padding: 1.2rem 2rem;
      text-decoration: none;
      font-weight: 500;
      letter-spacing: 0.5px;
      transition: var(--transicion);
      position: relative;
    }

    nav a:hover {
      background-color: var(--uta-rojo);
    }

    nav a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 3px;
      background: white;
      transition: var(--transicion);
    }

    nav a:hover::after {
      width: 70%;
    }

    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
        <nav>
        <a href="index.php?action=inicio">Inicio</a>
        <a href="index.php?action=nosotros">Nosotros</a>
        <a href="index.php?action=servicios">Servicios</a>
        <a href="index.php?action=contactanos">Contáctanos</a>
    </nav>
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

        <form action="index.php?action=login" method="post">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <div style="position: relative;">
                <input type="password" id="password" name="password" required>
                <span id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">👁️</span>
            </div>
        </div>

            <button type="submit" name="login" class="btn">Iniciar Sesión</button>
        </form>
    </div>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '🙈';
        });
    </script>

</body>
</html>