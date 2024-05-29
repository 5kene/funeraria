<?php
include("../../bd.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Construir y ejecutar la consulta SQL para crear el usuario
        $query = "CREATE USER :username@'localhost' IDENTIFIED BY :password";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Redirigir a la página principal después de agregar el usuario
        header("Location: index.php");
        exit();
    } catch(Exception $ex) {
        echo "Error al crear el usuario: " . $ex->getMessage();
    }
}
?>