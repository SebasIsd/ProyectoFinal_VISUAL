<?php 
include_once "conexion.php";

$sql = "SELECT * FROM estudiantes";
$result = $conn->query($sql);
$resultado = array();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($resultado, $row);
    }
} else {
    $resultado = "No hay Estudiantes!!";
}

echo json_encode($resultado);

$conn->close();
?>
