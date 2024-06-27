<?php include("../../bd.php"); ?>
<?php include("../../templates/header.php"); ?>

<link rel="stylesheet" href="index.css">
<div class="card">
    <div class="card-header">Provincias</div>
    <div class="card-body">
        <form action="asignar_provincia.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="provincia" class="form-label">Provincia</label>
                    <input type="text" class="form-control" name="provincia" id="provincia" placeholder="provincia" required />
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary">Asignar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">Provincias</div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Obtener todas las provincias de la base de datos
                    $sql = "SELECT * FROM provincia";
                    $stmt = $conexion->prepare($sql);
                    $stmt->execute();
                    $provincias = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($provincias as $provincia) { ?>
                        <tr>
                            <td><?php echo $provincia['id_pro']; ?></td>
                            <td><?php echo $provincia['nombre_pro']; ?></td>
                            <td>
                                <a class='btn btn-info edit-user' href='#' role='button' data-id='<?php echo $provincia['id_pro']; ?>' data-nombre='<?php echo $provincia['nombre_pro']; ?>'>Editar</a> |
                                <a class='btn btn-danger delete-user' href='eliminar_provincia.php?id=<?php echo $provincia['id_pro']; ?>' role='button' onclick="return confirm('¿Estás seguro de que quieres eliminar esta provincia?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal para editar provincia -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="editar_provincia.php" method="post">
            <h5>Editar Provincia</h5>
            <input type="hidden" name="id_pro" id="editId">
            <div class="mb-3">
                <label for="editNombre" class="form-label">Provincia</label>
                <input type="text" class="form-control" name="nombre_pro" id="editNombre" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger close-modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>

<!-- Scripts para el modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('editModal');
        var span = document.getElementsByClassName('close')[0];
        var closeButtons = document.getElementsByClassName('close-modal');

        var editButtons = document.querySelectorAll('.edit-user');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = button.getAttribute('data-id');
                var nombre = button.getAttribute('data-nombre');
                document.getElementById('editId').value = id;
                document.getElementById('editNombre').value = nombre;
                modal.style.display = 'block';
            });
        });

        span.onclick = function() {
            modal.style.display = 'none';
        }

        Array.from(closeButtons).forEach(function(button) {
            button.onclick = function() {
                modal.style.display = 'none';
            }
        });

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    });
</script>
