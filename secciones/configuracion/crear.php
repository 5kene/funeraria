<?php
include("../../bd.php");
?>v
<?php include("../../templates/header.php"); ?>

<a name="" id=""
        class="btn btn-secundary"
        href="index.php" role="button">
        volver
    </a>
<div class="card">
    <div class="card-header">Datos del usuario</div>
    <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input
            type="text" class="form-control"
            name="usuario" id="usuario"
            aria-describedby="helpId"
            placeholder="usuario"/>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input
            type="password" class="form-control"
            name="password" id="password"
            aria-describedby="helpId"
            placeholder="password"/>
    </div>
    
    </form>
    <a name="" id="" class="btn btn-info"href="#" role="button">Crear</a>
    </div>
</div>


<?php include("../../templates/footer.php"); ?>