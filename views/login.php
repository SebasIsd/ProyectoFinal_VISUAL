<?php
if (isset($_GET['timeout']) && $_GET['timeout'] == 1) {
    $error = "Sesión expirada por inactividad. Por favor, inicie sesión nuevamente.";
} else {
    $error = '';
}

$success = '';

// Conexión MySQL (ajusta los datos a tu configuración)
    $host = "yamanote.proxy.rlwy.net";
    $port = 49129;
    $dbname = "railway";
    $username = "root";
    $password = "CJVVXyfisbdkDCbXALbnrghJQVJpEYCw";

    $conn = new mysqli($host, $username, $password, $dbname, $port);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $input_username = trim($_POST['username']);
    $input_password = trim($_POST['password']);

    if (empty($input_username) || empty($input_password)) {
        $error = "Por favor ingrese usuario y contraseña";
    } else {
        // Consulta preparada
        $stmt = $conn->prepare("SELECT usuario, contrasena, nombre, cargo, bloqueado FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $input_username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if ($user['bloqueado'] == 1) {
                $error = "Este usuario está bloqueado. Contacte al administrador.";
            } else {
                if (!isset($_SESSION['intentos'][$input_username])) {
                    $_SESSION['intentos'][$input_username] = 0;
                }

                if (password_verify($input_password, $user['contrasena'])) {
                    $_SESSION['intentos'][$input_username] = 0;

                    $_SESSION['username'] = $user['usuario'];
                    $_SESSION['cargo'] = $user['cargo'];
                    $_SESSION['user_id'] = $user['usuario'];
                    $_SESSION['nombre'] = $user['nombre'];

                    header("Location: index.php?action=servicios");
                    exit();
                } else {
                    $_SESSION['intentos'][$input_username]++;

                    if ($_SESSION['intentos'][$input_username] >= 3) {
                        // Bloquear usuario
                        $stmt_block = $conn->prepare("UPDATE usuarios SET bloqueado = 1 WHERE usuario = ?");
                        $stmt_block->bind_param("s", $input_username);
                        $stmt_block->execute();

                        $error = "Has superado el número máximo de intentos. El usuario ha sido bloqueado.";
                    } else {
                        $error = "Credenciales incorrectas. Intento " . $_SESSION['intentos'][$input_username] . " de 3.";
                    }
                }
            }
        } else {
            $error = "Credenciales incorrectas.";
        }

        $stmt->close();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
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

    .modal-overlay {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .modal {
        background: white;
        padding: 2rem;
        border-radius: 8px;
        text-align: center;
        box-shadow: var(--sombra);
        max-width: 400px;
        width: 90%;
    }

    .modal h3 {
        margin-bottom: 1rem;
        color: var(--uta-rojo);
    }

    .modal button {
        background-color: var(--uta-rojo);
        color: white;
        border: none;
        padding: 0.6rem 1.5rem;
        font-size: 1rem;
        border-radius: 4px;
        cursor: pointer;
        transition: var(--transicion);
    }

    .modal button:hover {
        background-color: var(--uta-oscuro);
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

    <?php if (isset($_GET['timeout']) && $_GET['timeout'] == 1): ?>
    <div class="modal-overlay" id="sessionModal">
        <div class="modal">
            <h3>Sesión expirada</h3>
            <p>Su sesión ha expirado por inactividad. Por favor, inicie sesión nuevamente.</p>
            <button onclick="document.getElementById('sessionModal').style.display='none'">Aceptar</button>
        </div>
    </div>
    <script>
        // Mostrar modal automáticamente
        document.getElementById('sessionModal').style.display = 'flex';
    </script>
<?php endif; ?>


</body>
</html>
