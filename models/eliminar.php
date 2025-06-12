<?php
include_once 'conexion.php';

if (!isset($_GET['ID_CED'])) {
    echo json_encode(['errorMsg' => 'ID_CED no recibido.']);
    exit;
}

$cedula = $_GET['ID_CED']; // Se obtiene de la URL

$sqlBorrar = "DELETE FROM ESTUDIANTES WHERE ID_CED = ?";
$stmt = $conn->prepare($sqlBorrar);

if ($stmt) {
    $stmt->bind_param("s", $cedula);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['errorMsg' => 'Error al eliminar: ' . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(['errorMsg' => 'Error en la preparación de la consulta: ' . $conn->error]);
}

$conn->close();
?>
