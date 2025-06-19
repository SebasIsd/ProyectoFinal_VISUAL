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

$sqlUpdate = "UPDATE estudiantes SET nom_est = ?, ape_est = ?, tel_est = ?, cor_est = ? WHERE id_ced = ?";

$stmt = $conn->prepare($sqlUpdate);

if (!$stmt) {
    echo json_encode(['errorMsg' => 'Error al preparar la consulta: ' . $conn->error]);
    exit;
}

$stmt->bind_param("sssss", $nombre, $apellido, $telefono, $correo, $cedula);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['errorMsg' => 'Error al actualizar: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
