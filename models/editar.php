<?php
include_once 'conexion.php';

session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['cargo']) || $_SESSION['cargo'] !== 'admin') {
    echo json_encode(['errorMsg' => 'Acceso denegado. No tienes permisos suficientes.']);
    exit();
}

$id        = $_GET['id'] ?? '';
$cedula    = $_POST['id_ced'] ?? '';
$nombre    = $_POST['nom_est'] ?? '';
$apellido  = $_POST['ape_est'] ?? '';
$telefono  = $_POST['tel_est'] ?? '';
$correo    = $_POST['cor_est'] ?? '';

if (empty($cedula) || empty($nombre) || empty($apellido) || empty($telefono) || empty($correo)) {
    echo json_encode(['errorMsg' => 'Todos los campos son obligatorios.']);
    exit;
}

$sqlUpdate = "UPDATE estudiantes SET nom_est = $1, ape_est = $2, tel_est = $3, cor_est = $4 WHERE id_ced = $5";

$result = pg_query_params($conn, $sqlUpdate, array($nombre, $apellido, $telefono, $correo, $cedula));

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['errorMsg' => 'Error al actualizar: ' . pg_last_error($conn)]);
}

pg_close($conn);
?>
