<?php
include("../../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_pro = $_POST['provincia'];

    // Insertar en la base de datos
    $sql = "INSERT INTO provincia (nombre_pro) VALUES (:nombre_pro)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre_pro', $nombre_pro);
    $stmt->execute();

    // Redirigir de nuevo al index.php
    header("Location: index.php");
    exit();
}
?>
