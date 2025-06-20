<?php
    $host = "sql100.infinityfree.com";
    $port = 3306;
    $dbname = "if0_39269077_railway";
    $username = "if0_39269077";
    $password = "UeUf6yUTW61";

    $conn = new mysqli($host, $username, $password, $dbname, $port);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
?>
