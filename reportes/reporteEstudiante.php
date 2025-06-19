<?php
date_default_timezone_set('America/Guayaquil');
require('../fpdf/fpdf.php');

// Conexión a MySQL
    $host = "yamanote.proxy.rlwy.net";
    $port = 49129;
    $dbname = "railway";
    $username = "root";
    $password = "CJVVXyfisbdkDCbXALbnrghJQVJpEYCw";

    $conn = new mysqli($host, $username, $password, $dbname, $port);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

// Consulta
$query = "SELECT * FROM estudiantes";
$resultado = $conn->query($query);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('../images/logo.png', 10, 10, 20);
$pdf->SetTitle("Listado de Estudiantes");

// Colores UTA
$colorRojo = [139, 0, 0];        // --uta-rojo
$colorOscuro = [107, 0, 0];      // --uta-oscuro
$colorClaro = [249, 249, 249];   // --uta-claro

// Título
$pdf->SetFont('Helvetica', 'B', 18);
$pdf->SetTextColor(...$colorRojo);
$pdf->Cell(0, 15, utf8_decode("LISTADO DE ESTUDIANTES"), 0, 1, 'C');
$pdf->Ln(5);

// Encabezados
$pdf->SetFont('Helvetica', 'B', 11);
$pdf->SetFillColor(...$colorOscuro);
$pdf->SetTextColor(255, 255, 255);

$pdf->Cell(35, 10, utf8_decode("CÉDULA"), 1, 0, 'C', true);
$pdf->Cell(35, 10, "NOMBRE", 1, 0, 'C', true);
$pdf->Cell(35, 10, "APELLIDO", 1, 0, 'C', true);
$pdf->Cell(30, 10, utf8_decode("TELÉFONO"), 1, 0, 'C', true);
$pdf->Cell(50, 10, "CORREO", 1, 1, 'C', true);

// Filas
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0);
$alternar = false;

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $cedula = $fila['id_ced'];
        $nombre = utf8_decode($fila['nom_est']);
        $apellido = utf8_decode($fila['ape_est']);
        $telefono = $fila['tel_est'];
        $correo = utf8_decode($fila['cor_est']);

        $pdf->SetFillColor(...($alternar ? [255, 255, 255] : $colorClaro));
        $alternar = !$alternar;

        $pdf->Cell(35, 10, $cedula, 1, 0, 'C', true);
        $pdf->Cell(35, 10, $nombre, 1, 0, 'C', true);
        $pdf->Cell(35, 10, $apellido, 1, 0, 'C', true);
        $pdf->Cell(30, 10, $telefono, 1, 0, 'C', true);
        $pdf->Cell(50, 10, $correo, 1, 1, 'L', true);
    }
} else {
    $pdf->SetFillColor(...$colorClaro);
    $pdf->Cell(0, 10, utf8_decode("No hay estudiantes para mostrar."), 1, 1, 'C', true);
}

// Línea estética
$pdf->Ln(8);
$pdf->SetDrawColor(...$colorRojo);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->Ln(4);

// Pie de página
$pdf->SetFont('Arial', 'I', 10);
$pdf->SetTextColor(80, 80, 80);
$pdf->Cell(0, 10, utf8_decode("Generado el ") . date('d/m/Y') . " a las " . date('H:i'), 0, 1, 'C');

$pdf->Output();

$conn->close();
?>

