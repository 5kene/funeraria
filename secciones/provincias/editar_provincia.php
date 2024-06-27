<?php
include("../../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pro = $_POST['id_pro'];
    $nombre_pro = $_POST['nombre_pro'];

    // Actualizar en la base de datos
    $sql = "UPDATE provincia SET nombre_pro = :nombre_pro WHERE id_pro = :id_pro";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre_pro', $nombre_pro);
    $stmt->bindParam(':id_pro', $id_pro);
    $stmt->execute();

    // Redirigir de nuevo al index.php
    header("Location: index.php");
    exit();
}
?>
