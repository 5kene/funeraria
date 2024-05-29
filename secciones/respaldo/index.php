<?php 
session_start();
include("../../templates/header.php"); 
?>

<link rel="stylesheet" href="index.css">

<!-- Cuadro de mensaje -->
<div id="message-box" class="message-box alert alert-success" style="<?php if(isset($_SESSION['message']) || isset($_SESSION['error'])) { echo "display: block;"; } ?>">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        echo '<script>document.getElementById("message-box").classList.replace("alert-success", "alert-danger");</script>';
    }
    ?>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <!-- Formulario para respaldar la base de datos -->
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Respaldar Base de Datos</h2>
                    <form action="backup_process.php" method="post">
                        <button type="submit" name="backup" class="btn btn-primary">Respaldar Base de Datos</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Formulario para restaurar la base de datos -->
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Restaurar Base de Datos</h2>
                    <form action="restore_process.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="backup_file" accept=".sql" required>
                        <button type="submit" name="restore" class="btn btn-primary">Restaurar Base de Datos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
