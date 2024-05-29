<?php
session_start();
include("../../bd.php");

// Verificar si se ha subido un archivo
if (isset($_FILES['backup_file']) && $_FILES['backup_file']['error'] === UPLOAD_ERR_OK) {
    // Ruta temporal del archivo subido
    $backup_file = $_FILES['backup_file']['tmp_name'];

    // Ruta completa al binario de mysql
    $mysql_path = 'C:\\xampp\\mysql\\bin\\mysql'; // Asegúrate de usar dobles barras invertidas en Windows

    // Comando para restaurar la base de datos desde el archivo de respaldo
    $command = "\"$mysql_path\" --host=$servidor --user=$usuario --password=$contraseña $basededato < \"$backup_file\" 2>&1";

    // Ejecutar el comando de restauración
    exec($command, $output, $return_var);

    // Verificar si la restauración fue exitosa
    if ($return_var === 0) {
        $_SESSION['message'] = "¡Restauración de la base de datos exitosa!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "¡Error al restaurar la base de datos! Código de error: $return_var<br>Salida del comando: " . implode("\n", $output);
        header("Location: index.php");
        exit();
    }
} else {
    $_SESSION['error'] = "¡Error al subir el archivo de respaldo!";
    header("Location: index.php");
    exit();
}
?>
