<?php
include("../../bd.php");
?>
<?php include("../../templates/header.php"); ?>

<link rel="stylesheet" href="index.css">

<a name="" id="addRolButton" class="btn btn-primary" href="#" role="button">
    Crear Rol
</a>

<div class="card">
    <div class="card-header">Roles</div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Rol</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    try {
                        // Ejecutar la consulta
                        $query = "SELECT DISTINCT Role AS role FROM mysql.roles_mapping;";
                        $stmt = $conexion->prepare($query);
                        $stmt->execute();

                        // Obtener los resultados y mostrarlos en la tabla
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                            echo "<td>
                                <a name='' id='' class='btn btn-info edit-rol' href='#' role='button' data-role='" . htmlspecialchars($row['role']) . "'>Editar</a> |
                                <a name='' id='' class='btn btn-danger delete-rol' href='#' role='button' data-role='" . htmlspecialchars($row['role']) . "'>Eliminar</a>
                                </td>";
                            echo "</tr>";
                        }
                    } catch(Exception $ex) {
                        echo "<tr><td colspan='2'>" . $ex->getMessage() . "</td></tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal para agregar rol -->
<div id="addRolModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Agregar Rol</h2>
        </div>
        <div class="modal-body">
            <form id="addRolForm" method="post" action="create_rol.php">
                <div class="form-group">
                    <label for="rolname">Nombre del rol</label>
                    <input type="text" id="rolname" name="rolname" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar rol -->
<div id="editRolModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Editar Rol</h2>
        </div>
        <div class="modal-body">
            <form id="editRolForm" method="post" action="editar.php">
                <input type="hidden" id="editRolId" name="originalRole" required>
                <div class="form-group">
                    <label for="newRolname">Nuevo nombre del rol</label>
                    <input type="text" id="newRolname" name="newRolname" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>
</div>


<!-- Modal para confirmar eliminación -->
<div id="deleteRolModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Eliminar Rol</h2>
        </div>
        <div class="modal-body">
            <p>¿Está seguro de que desea eliminar este rol?</p>
            <form id="deleteRolForm" method="post" action="eliminar.php">
                <input type="hidden" id="deleteRolId" name="rolname" required>
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <button type="button" class="btn btn-secondary" id="cancelDelete">Cancelar</button>
            </form>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>

<script>
// Modal de agregar
var addModal = document.getElementById("addRolModal");
var addBtn = document.getElementById("addRolButton");
var addSpan = document.getElementsByClassName("close")[0];

addBtn.onclick = function() {
    addModal.style.display = "block";
}

addSpan.onclick = function() {
    addModal.style.display = "none";
}

// Modal de editar
var editModal = document.getElementById("editRolModal");
var editSpan = document.getElementsByClassName("close")[1];

document.querySelectorAll('.edit-rol').forEach(function(button) {
    button.onclick = function() {
        var role = this.getAttribute('data-role');
        document.getElementById('editRolId').value = role;
        document.getElementById('newRolname').value = role;
        editModal.style.display = "block";
    }
});

editSpan.onclick = function() {
    editModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == editModal) {
        editModal.style.display = "none";
    }
}


// Modal de eliminar
var deleteModal = document.getElementById("deleteRolModal");
var deleteSpan = document.getElementsByClassName("close")[2];
var cancelDelete = document.getElementById("cancelDelete");

document.querySelectorAll('.delete-rol').forEach(function(button) {
    button.onclick = function() {
        var role = this.getAttribute('data-role');
        document.getElementById('deleteRolId').value = role;
        deleteModal.style.display = "block";
    }
});

deleteSpan.onclick = function() {
    deleteModal.style.display = "none";
}

cancelDelete.onclick = function() {
    deleteModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == addModal) {
        addModal.style.display = "none";
    } else if (event.target == editModal) {
        editModal.style.display = "none";
    } else if (event.target == deleteModal) {
        deleteModal.style.display = "none";
    }
}
</script>
