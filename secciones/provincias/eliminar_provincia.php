<?php
include("../../bd.php");

if (isset($_GET['id'])) {
    $id_pro = $_GET['id'];

    // Eliminar de la base de datos
    $sql = "DELETE FROM provincia WHERE id_pro = :id_pro";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id_pro', $id_pro);
    $stmt->execute();

    // Redirigir de nuevo al index.php
    header("Location: index.php");
    exit();
}
?>
