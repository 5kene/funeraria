<?php
include("../../bd.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $originalRole = $_POST['originalRole'];
    $newRolname = $_POST['newRolname'];

    try {
        $conexion->beginTransaction();

        // Eliminar el rol antiguo
        $dropRoleQuery = "DROP ROLE $originalRole;";
        $stmt = $conexion->prepare($dropRoleQuery);
        $stmt->execute();

        // Crear el rol nuevo
        $createRoleQuery = "CREATE ROLE $newRolname;";
        $stmt = $conexion->prepare($createRoleQuery);
        $stmt->execute();

        $conexion->commit();

        header("Location: index.php");
        exit();
    } catch(Exception $ex) {
        header("Location: index.php");
    }
}
?>
