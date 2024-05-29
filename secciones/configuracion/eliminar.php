<?php
include("../../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    try {
        $stmt = $conexion->prepare("DELETE FROM mysql.user WHERE User = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: index.php");
        exit();
    } catch(Exception $ex) {
        echo "Error al Eliminar Usuario: " . $ex->getMessage();
    }
}
?>
