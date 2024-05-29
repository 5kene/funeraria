<?php
session_start(); // Asegúrate de iniciar la sesión en la parte superior del archivo
include("../../bd.php");

// Nombre del archivo de respaldo
$backup_file = 'backup_' . date('Ymd_His') . '.sql';

// Ruta completa al binario de mysqldump
$mysqldump_path = 'C:\\xampp\\mysql\\bin\\mysqldump'; // Asegúrate de usar dobles barras invertidas en Windows

// Comando de respaldo de la base de datos
$command = "\"$mysqldump_path\" --host=$servidor --user=$usuario --password=$contraseña $basededato > \"$backup_file\" 2>&1";

// Ejecutar el comando de respaldo
exec($command, $output, $return_var);

// Verificar si el respaldo fue exitoso
if ($return_var === 0) {
    $_SESSION['message'] = "¡Respaldo de la base de datos exitoso! El archivo de respaldo se ha guardado como: $backup_file";
    header("Location: index.php");
    exit();
} else {
    $_SESSION['error'] = "¡Error al respaldar la base de datos! Código de error: $return betweenar<br>Salida del comando: " . implode("\n", $output);
    header("Location: index.php");
    exit();
}
?>
