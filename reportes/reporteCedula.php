<?php
date_default_timezone_set('America/Guayaquil');
require('../fpdf/fpdf.php');
require('../models/conexion.php'); // Ya tiene conexión con pg_connect()

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['cedula'])) {
    $cedula = $_GET['cedula'];

    $sqlSelect = "SELECT * FROM estudiantes WHERE ID_CED = $1";
    $result = pg_query_params($conn, $sqlSelect, array($cedula));

    // Colores UTA
    $colorRojo = [139, 0, 0];        // --uta-rojo
    $colorOscuro = [107, 0, 0];      // --uta-oscuro
    $colorClaro = [249, 249, 249];   // --uta-claro

    // Crear PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->Image('../images/logo.png', 10, 10, 20);  // 50 mm = 5 cm
    $pdf->SetTitle(utf8_decode("Reporte por Cédula"));

    // Título
    $pdf->SetFont('Helvetica', 'B', 18);
    $pdf->SetTextColor(...$colorRojo);
    $pdf->Cell(0, 15, utf8_decode("Reporte Individual de Estudiante"), 0, 1, 'C');
    $pdf->Ln(5);

    // Encabezados
    $pdf->SetFont('Helvetica', 'B', 11);
    $pdf->SetFillColor(...$colorOscuro);
    $pdf->SetTextColor(255, 255, 255);

    $pdf->Cell(30, 10, utf8_decode("CÉDULA"), 1, 0, 'C', true);
    $pdf->Cell(35, 10, "NOMBRE", 1, 0, 'C', true);
    $pdf->Cell(35, 10, "APELLIDO", 1, 0, 'C', true);
    $pdf->Cell(50, 10, "CORREO", 1, 0, 'C', true);
    $pdf->Cell(40, 10, utf8_decode("TELÉFONO"), 1, 1, 'C', true);

    // Contenido
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0);

    if ($row = pg_fetch_assoc($result)) {
        $pdf->SetFillColor(...$colorClaro);

        $pdf->Cell(30, 10, $row['id_ced'], 1, 0, 'C', true);
        $pdf->Cell(35, 10, utf8_decode($row['nom_est']), 1, 0, 'C', true);
        $pdf->Cell(35, 10, utf8_decode($row['ape_est']), 1, 0, 'C', true);
        $pdf->Cell(50, 10, utf8_decode($row['cor_est']), 1, 0, 'C', true);
        $pdf->Cell(40, 10, $row['tel_est'], 1, 1, 'C', true);
    } else {
        $pdf->SetTextColor(...$colorRojo);
        $pdf->Cell(0, 10, utf8_decode("No se encontraron resultados para la cédula especificada."), 1, 1, 'C');
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
} else {
    echo "Cédula no proporcionada correctamente.";
}
?>
