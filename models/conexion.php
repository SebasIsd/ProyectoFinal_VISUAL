<?php
    $host = "hopper.proxy.rlwy.net";
    $dbname = "railway"; // Reemplaza con el nombre de tu base de datos
    $username = "postgres"; // Reemplaza con tu usuario de base de datos
    $password = "IgZDClUlvpPPkYlUmcoAdeWZnrglBBHO"; // Reemplaza con tu contraseña de base de datos
    $port = "24880";

    // Corregir el nombre de la variable a $username
    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$username password=$password");
?>
