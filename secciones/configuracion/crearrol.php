<?php
include("../../bd.php");
?>
<?php include("../../templates/header.php"); ?>

<a name="" id=""
        class="btn btn-secundary"
        href="index.php" role="button">
        volver
    </a>
<div class="card">
    <div class="card-header">Agregar rol</div>
    <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <input
            type="text" class="form-control"
            name="rol" id="rol"
            aria-describedby="helpId"
            placeholder="rol"/>
    </div>
    


    </form>
    <a name="" id="" class="btn btn-info"href="#" role="button">Crear</a>

    </div>
</div>
<br/>
<br/>
<div class="card">
    <div class="card-header">Agregar rol a usuario</div>
    <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <input
            type="text" class="form-control"
            name="rol" id="rol"
            aria-describedby="helpId"
            placeholder="rol"/>
    </div>
    <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input
            type="text" class="form-control"
            name="usuario" id="usuario"
            aria-describedby="helpId"
            placeholder="usuario"/>
    </div>


    </form>
    <a name="" id="" class="btn btn-info"href="#" role="button">Crear</a>

    </div>
</div>

<?php include("../../templates/footer.php"); ?>