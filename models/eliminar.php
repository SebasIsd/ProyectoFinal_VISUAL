<?php
include_once 'conexion.php';

session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['cargo']) || $_SESSION['cargo'] !== 'admin') {
    echo json_encode(['errorMsg' => 'Acceso denegado. No tienes permisos suficientes.']);
    exit();
}
if (!isset($_POST['id_ced']) || empty($_POST['id_ced'])) {
    echo json_encode(['errorMsg' => 'ID_CED no recibido.']);
    exit;
}

$cedula = $_POST['id_ced']; // Recibe desde JS

$sqlBorrar = "DELETE FROM estudiantes WHERE id_ced = $1";
$result = pg_query_params($conn, $sqlBorrar, array($cedula));

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['errorMsg' => 'Error al eliminar: ' . pg_last_error($conn)]);
}
?>
