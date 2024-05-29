<?php
include("../../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioId = $_POST['id'];
    $nuevoNombre = $_POST['username'];
    $password = $_POST['password'];
    $rol = $_POST['role'];  // Rol actual del usuario

    try {
        // Inicia la transacción
        $conexion->beginTransaction();

        // Prepara la sentencia SQL para actualizar el usuario
        $sql = "RENAME USER ?@'localhost' TO ?@'localhost'";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$usuarioId, $nuevoNombre]);

        // Si se proporcionó una nueva contraseña, actualízala
        if (!empty($password)) {
            $sql = "SET PASSWORD FOR ?@'localhost' = PASSWORD(?)";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$nuevoNombre, $password]);
        }

        // Asigna de nuevo el rol al nuevo nombre de usuario
        $sql = "GRANT ? TO ?@'localhost'";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$rol, $nuevoNombre]);

        // Confirma la transacción
        $conexion->commit();

        header("Location: index.php");
        exit();
    } catch(Exception $ex) {
        header("Location: index.php");
    }
}
?>
