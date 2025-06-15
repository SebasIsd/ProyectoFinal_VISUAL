<?php 
    include_once "conexion.php";  

    $sql = "SELECT * FROM estudiantes";
    $respuesta = pg_query($conn, $sql);  
    $resultado = array();

    if (pg_num_rows($respuesta) > 0) {
        while ($row = pg_fetch_assoc($respuesta)) {
            array_push($resultado, $row);
        }
    } else {
        $resultado = "No hay Estudiantes!!";
    }

    echo json_encode($resultado);
?>
