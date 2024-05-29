<?php
include("../../bd.php");
include("../../templates/header.php");

// Obtener todas las tablas de la base de datos
$query = $conexion->prepare("SHOW TABLES");
$query->execute();
$tables = $query->fetchAll(PDO::FETCH_COLUMN);
?>

<link rel="stylesheet" href="index.css">
<a
    name=""
    id=""
    class="btn btn-primary"
    href="index.php"
    role="button"
    >Volver</a
>
<br/>
<div class="container mt-4">
    <form action="generate_dynamic_report.php" method="post">
        <div class="form-group">
            <label for="tableSelect">Seleccionar Tabla:</label>
            <select id="tableSelect" name="table" class="form-control" onchange="loadFields(this.value)">
                <option value="">Seleccione una tabla</option>
                <?php foreach ($tables as $table): ?>
                    <option value="<?php echo $table; ?>"><?php echo $table; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="fieldsSelect">Seleccionar Campos:</label>
            <select id="fieldsSelect" name="fields[]" class="form-control" multiple>
                <!-- Los campos se llenarán dinámicamente con JavaScript -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Generar PDF</button>
    </form>
</div>

<script>
function loadFields(table) {
    if (table === "") {
        document.getElementById("fieldsSelect").innerHTML = "";
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_fields.php?table=" + table, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("fieldsSelect").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
</script>

<?php include("../../templates/footer.php"); ?>
