<?php
include("../../bd.php");

if (isset($_GET['table'])) {
    $table = $_GET['table'];

    // Obtener los campos de la tabla seleccionada
    $query = $conexion->prepare("DESCRIBE $table");
    $query->execute();
    $fields = $query->fetchAll(PDO::FETCH_COLUMN);

    foreach ($fields as $field) {
        echo "<option value='$field'>$field</option>";
    }
}
?>
