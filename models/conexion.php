<?php
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
?>
