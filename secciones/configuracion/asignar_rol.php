<?php
include("../../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];
    
    try {
        // Conecta a la base de datos
        $conexion->beginTransaction();

        // Prepara la sentencia SQL para asignar el rol
        $sql = "GRANT ? TO ?@'localhost'";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $rol);
        $stmt->bindParam(2, $usuario);
        $stmt->execute();

        header("Location: index.php");
        exit();
    } catch(Exception $ex) {
        echo "Error al Asignar el rol: " . $ex->getMessage();
    }
}
?>
