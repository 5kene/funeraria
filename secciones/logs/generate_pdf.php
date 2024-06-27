<?php
// Incluir archivo de conexión a la base de datos
include("../../bd.php");
require('../../libs/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Auditoria', 0, 1, 'C');
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Función para mostrar datos en formato etiqueta-valor
    function ShowData($data)
    {
        $this->SetFont('Arial', '', 12);
        foreach ($data as $key => $value) {
            // Manejar el campo Argumento con MultiCell para manejar textos largos
            if ($key === 'argument') {
                $this->MultiCell(0, 10, "$key: $value", 0, 'L');
            } else {
                $this->Cell(0, 10, "$key: $value", 0, 1);
            }
        }
    }
}

// Obtener parámetros del filtro del URL
$filter_field = isset($_GET['filter_field']) ? $_GET['filter_field'] : '';
$filter_value = isset($_GET['filter_value']) ? $_GET['filter_value'] : '';
$results_limit = isset($_GET['results_limit']) ? intval($_GET['results_limit']) : 25;

// Construir consulta SQL base
$sql_base = "SELECT * FROM mysql.general_log WHERE 1 = 1";

// Inicializar parámetros y cláusula WHERE
$params = array();
$where_clause = "";

// Procesar filtro si se proporciona
if (!empty($filter_field) && !empty($filter_value)) {
    // Manejar caso especial para event_time si es un rango de fechas
    if ($filter_field === 'event_time') {
        // Suponemos que el usuario ingresa fechas separadas por comas (ej. '2024-06-01,2024-06-30')
        $dates = explode(',', $filter_value);
        if (count($dates) === 2) {
            $where_clause .= " AND event_time >= :start_date AND event_time <= :end_date";
            $params[':start_date'] = trim($dates[0]);
            $params[':end_date'] = trim($dates[1]);
        }
    } else {
        $where_clause .= " AND $filter_field LIKE :filter_value";
        $params[':filter_value'] = '%' . $filter_value . '%';
    }
}

// Agregar WHERE a la consulta base si hay condiciones de filtro
if (!empty($where_clause)) {
    $sql = $sql_base . $where_clause;
} else {
    $sql = $sql_base;
}

// Ordenar por event_time DESC y no aplicar LIMIT aún
$sql .= " ORDER BY event_time DESC";

// Ejecutar consulta sin límite para contar todos los resultados
$stmt_count = $conexion->prepare($sql);
$stmt_count->execute($params);
$total_results = $stmt_count->rowCount();

// Limitar la consulta final al número específico de resultados a mostrar
$sql .= " LIMIT :limit";

// Preparar la consulta con los parámetros
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':limit', $results_limit, PDO::PARAM_INT);

// Asignar los parámetros condicionales
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}

$stmt->execute();

// Obtener resultados para mostrar en el PDF
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear el PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Mostrar los datos en el PDF
foreach ($results as $row) {
    $pdf->ShowData($row);
    $pdf->Ln(10); // Salto de línea entre cada conjunto de datos
}

$pdf->Output();
?>

