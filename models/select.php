<?php 
    include_once "conexion.php";
    $sql = "SELECT * FROM ESTUDIANTES";
    $respuesta = $conn -> query($sql);
    $resultado = array();
    if ($respuesta -> num_rows > 0) {
        while ($row = $respuesta -> fetch_assoc()) {
            array_push($resultado, $row);
        }
    }else{
        $resultado = "No hay Estudiantes!!";
    }
    echo json_encode($resultado);

?>