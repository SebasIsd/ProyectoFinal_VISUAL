<?php
include_once 'conexion.php';
$cedula = $_POST['ID_EST'];
$nombre = $_POST['NOM_EST'];
$apellido = $_POST['APE_EST'];
$telefono = $_POST['TEL_EST'];
$correo = $_POST['COR_EST'];

$sqlInsert = "INSERT INTO ESTUDIANTES VALUES('$cedula','$nombre','$apellido','$telefono','$correo')";

if($conn -> query($sqlInsert)){
    echo json_encode("ok");
}else{
    echo json_encode("Error en la preparación de la consulta: " . $conn->error);
}
$conn -> close();
?>