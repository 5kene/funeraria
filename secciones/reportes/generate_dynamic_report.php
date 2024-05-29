<?php
require('../../bd.php');
require('../../libs/fpdf.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = $_POST['table'];
    $fields = $_POST['fields'];

    if (!empty($table) && !empty($fields)) {
        $fields_list = implode(", ", $fields);
        
        // Consulta para obtener los datos seleccionados
        $query = $conexion->prepare("SELECT $fields_list FROM $table");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        // Crear el PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // Encabezado de la tabla
        foreach ($fields as $field) {
            $pdf->Cell(40, 10, $field, 1);
        }
        $pdf->Ln();

        // Datos de la tabla
        foreach ($data as $row) {
            foreach ($fields as $field) {
                $pdf->Cell(40, 10, $row[$field], 1);
            }
            $pdf->Ln();
        }

        $pdf->Output();
        exit();
    } else {
        echo "No se ha seleccionado ninguna tabla o campos.";
    }
}
?>
