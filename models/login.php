<?php
include_once "conexion.php"; 

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$result = pg_query($conn, $sql);


if (pg_num_rows($result) > 0) {
    $datos = pg_fetch_assoc($result);
    

    session_start();
    $_SESSION['usuario'] = $datos['usuario'];
    $_SESSION['cargo'] = $datos['cargo'];

    echo json_encode([
        "status" => "ok",
        "mensaje" => "Login exitoso",
        "cargo" => $datos['cargo']
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "mensaje" => "Usuario o contraseña incorrectos"
    ]);
}
?>
