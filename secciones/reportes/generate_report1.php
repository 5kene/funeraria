<?php
require('../../bd.php');
require('../../libs/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Pagos', 0, 1, 'C');
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Tabla
    function CreateTable($header, $data)
    {
        $this->SetFont('Arial', 'B', 12);
        foreach ($header as $col) {
            $this->Cell(60, 7, $col, 1);
        }
        $this->Ln();

        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            foreach ($row as $col) {
                $this->Cell(60, 6, $col, 1);
            }
            $this->Ln();
        }
    }
}

// Crear el PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Encabezados de la tabla
$header = array('Fecha', 'Tipo de Trámite', 'Pago');

// Datos de la tabla
$sql = "SELECT 
            EXTRACT(YEAR FROM pago.fecha_pago) AS fecha, 
            ti.nombre_tipo_tramite AS tipo_tramite, 
            SUM(pago.cantidad_pago) AS pago
        FROM 
            pago 
        JOIN 
            tramite AS t ON t.id_tramite = pago.id_tramite
        JOIN 
            tipo_tramite AS ti ON ti.id_tipo_tramite = t.id_tipo_tramite
        GROUP BY 
            EXTRACT(YEAR FROM pago.fecha_pago), ti.nombre_tipo_tramite
        ORDER BY 
            fecha ASC";
        
$result = $conexion->query($sql);
$data = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $data[] = array($row['fecha'], $row['tipo_tramite'], $row['pago']);
}

$pdf->CreateTable($header, $data);
$pdf->Output();
?>
