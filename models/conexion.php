<?php
    $servername = "localhost";    // servidor, generalmente localhost
    $username = "root";     // tu usuario de la base de datos
    $password = "";  // tu contraseña
    $dbname = "cuarto"; // nombre de la base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
?>
