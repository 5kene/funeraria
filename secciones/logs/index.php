<?php
// Incluir archivo de conexión a la base de datos
include("../../bd.php");

// Definir cantidad de registros por página (valor por defecto)
$results_limit = isset($_GET['results_limit']) ? intval($_GET['results_limit']) : 25;

// Definir consulta base
$sql_base = "SELECT * FROM mysql.general_log WHERE 1 = 1";

// Inicializar parámetros y cláusula WHERE
$params = array();
$where_clause = "";

// Procesar filtro si se envió
if (!empty($_GET['filter_field']) && !empty($_GET['filter_value'])) {
    $filter_field = $_GET['filter_field'];
    $filter_value = $_GET['filter_value'];

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

// Calcular cuántos resultados se deben mostrar
$results_to_show = min($results_limit, $total_results);

// Limitar la consulta final al número específico de resultados a mostrar
$sql .= " LIMIT :limit";

// Preparar la consulta con los parámetros
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':limit', $results_to_show, PDO::PARAM_INT);

// Asignar los parámetros condicionales
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}

$stmt->execute();

// Obtener resultados para mostrar en la tabla HTML
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../../templates/header.php"); ?>

<link rel="stylesheet" href="index.css">

<div class="card">
    <div class="card-header">Filtros</div>
    <div class="card-body">
        <form id="filterForm" action="" method="GET" class="form-inline mb-3">
            <label for="filter_select" class="mr-2">Filtrar por:</label>
            <select id="filter_select" name="filter_field" class="form-control mr-2">
                <option value="user_host">User Host</option>
                <option value="command_type">Command Type</option>
                <option value="event_time">Event Time</option>
                <option value="server_id">Server ID</option>
            </select>

            <label for="filter_value" class="mr-2">Valor:</label>
            <input type="text" id="filter_value" name="filter_value" class="form-control mr-2" value="<?php echo isset($_GET['filter_value']) ? $_GET['filter_value'] : ''; ?>">

            <label for="results_limit" class="mr-2">Resultados a mostrar:</label>
            <input type="number" id="results_limit" name="results_limit" class="form-control mr-2" value="<?php echo isset($_GET['results_limit']) ? $_GET['results_limit'] : ''; ?>">

            <button type="submit" class="btn btn-primary" id="applyFilters">Aplicar Filtros</button>
        </form>

        <a class="btn btn-secondary ml-2" href="generate_pdf.php?<?php echo http_build_query($_GET); ?>" target="_blank">Generar PDF</a>
    </div>
</div>

<div class="card">
    <div class="card-header">Auditoría</div>
    <div class="card-body">
        <!-- Tabla de resultados -->
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Event_Time</th>
                        <th scope="col">User_Host</th>
                        <th scope="col">Thread_ID</th>
                        <th scope="col">Server_ID</th>
                        <th scope="col">Command_Type</th>
                        <th scope="col">Argument</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row) { ?>
                        <tr>
                            <td><?php echo $row['event_time']; ?></td>
                            <td><?php echo $row['user_host']; ?></td>
                            <td><?php echo $row['thread_id']; ?></td>
                            <td><?php echo $row['server_id']; ?></td>
                            <td><?php echo $row['command_type']; ?></td>
                            <td><?php echo $row['argument']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
