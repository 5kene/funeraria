<?php
include("../../bd.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Consulta para eliminar el registro
        $stmt = $conexion->prepare("DELETE FROM auditoria WHERE ID = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $_SESSION['message'] = "¡Registro eliminado exitosamente!";
        } else {
            $_SESSION['error'] = "Error al eliminar el registro.";
        }
    } catch (Exception $ex) {
        $_SESSION['error'] = "Error: " . $ex->getMessage();
    }
}

header("Location: index.php");
exit();
?>
