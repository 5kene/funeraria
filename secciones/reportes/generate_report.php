<?php
require('../../bd.php');
require('../../libs/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Muertes', 0, 1, 'C');
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
            $this->Cell(95, 7, $col, 1);
        }
        $this->Ln();

        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            foreach ($row as $col) {
                $this->Cell(95, 6, $col, 1);
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
$header = array('Causa de Muerte', 'Cantidad');

// Datos de la tabla
$sql = "SELECT 
            cm.nombre_causa_muerte as causa,
            COUNT(difunto.id_causa_muerte) as cantidad
        FROM 
            difunto 
        JOIN 
            causa_muerte AS cm 
        ON 
            cm.id_causa_muerte = difunto.id_causa_muerte
        GROUP BY 
            cm.nombre_causa_muerte";
        
$result = $conexion->query($sql);
$data = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $data[] = array($row['causa'], $row['cantidad']);
}

$pdf->CreateTable($header, $data);
$pdf->Output();
?>
