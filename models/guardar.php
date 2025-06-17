<?php
include_once 'conexion.php';

session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['cargo']) || $_SESSION['cargo'] !== 'admin') {
    echo json_encode(['errorMsg' => 'Acceso denegado. No tienes permisos suficientes.']);
    exit();
}

$cedula   = $_POST['id_ced']   ?? '';
$nombre   = $_POST['nom_est']  ?? '';
$apellido = $_POST['ape_est']  ?? '';
$telefono = $_POST['tel_est']  ?? '';
$correo   = $_POST['cor_est']  ?? '';

// Validar que todos los campos estén llenos
if (empty($cedula) || empty($nombre) || empty($apellido) || empty($telefono) || empty($correo)) {
    echo json_encode(['errorMsg' => 'Todos los campos son obligatorios.']);
    exit;
}

$sqlInsert = "INSERT INTO estudiantes (id_ced, nom_est, ape_est, tel_est, cor_est) 
              VALUES ($1, $2, $3, $4, $5)";

// Usar pg_query_params para prevenir SQL Injection
$result = pg_query_params($conn, $sqlInsert, array($cedula, $nombre, $apellido, $telefono, $correo));

if ($result) {
    echo json_encode("ok");
} else {
    echo json_encode("Error en la preparación de la consulta: " . pg_last_error($conn));
}

pg_close($conn);
?>
