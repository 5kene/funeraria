<?php 
session_start();
include("../../templates/header.php"); 
?>

<link rel="stylesheet" href="index.css">

<!-- Cuadro de mensaje -->
<div id="message-box" class="message-box" style="<?php if(isset($_SESSION['message']) || isset($_SESSION['error'])) { echo "display: block;"; } ?>">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        echo '<script>document.getElementById("message-box").classList.add("error-box");</script>';
    }
    ?>
</div>

<!-- Formulario para respaldar la base de datos -->
<h2>Respaldar Base de Datos</h2>
<form action="backup_process.php" method="post">
    <button type="submit" name="backup">Respaldar Base de Datos</button>
</form>

<hr>

<!-- Formulario para restaurar la base de datos -->
<h2>Restaurar Base de Datos</h2>
<form action="restore_process.php" method="post" enctype="multipart/formdata">
    <input type="file" name="backup_file" accept=".sql" required>
    <button type="submit" name="restore">Restaurar Base de Datos</button>
</form>

<?php include("../../templates/footer.php"); ?>
<!-- Script para ocultar el cuadro de mensaje después de 5 segundos -->
<script>
    window.onload = function() {
        setTimeout(function() {
            var messageBox = document.getElementById('message-box');
            if (messageBox.style.display === 'block') {
                messageBox.style.display = 'none';
            }
        }, 5000); // 5000 milisegundos = 5 segundos
    };
</script>