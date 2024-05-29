<?php
include("../../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rolname = $_POST['rolname'];

    try {
        $stmt = $conexion->prepare("DROP ROLE :rolname;");
        $stmt->bindParam(':rolname', $rolname);
        $stmt->execute();

        header("Location: index.php");
        exit();
    } catch(Exception $ex) {
        echo "Error al eliminar el rol: " . $ex->getMessage();
    }
}
?>
