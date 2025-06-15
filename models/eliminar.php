<?php
include_once 'conexion.php';

if (!isset($_POST['ID_CED'])) {
    echo json_encode(['errorMsg' => 'ID_CED no recibido.']);
    exit;
}

$cedula = $_POST['ID_CED']; // Recibe desde JS

$sqlBorrar = "DELETE FROM ESTUDIANTES WHERE ID_CED = $1";
$result = pg_query_params($conn, $sqlBorrar, array($cedula));

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['errorMsg' => 'Error al eliminar: ' . pg_last_error($conn)]);
}
?>
