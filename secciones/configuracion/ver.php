<?php
include("../../bd.php");
?>
<?php include("../../templates/header.php"); ?>
<br/>
<link rel="stylesheet" href="index.css">
<!-- Botón para abrir el modal -->
<a name="" id="addUserButton"
       class="btn btn-primary"
       href="#"
       role="button">
       Crear usuario
   </a>
<br/>
<br/>
<div class="card">
    <div class="card-header">Asignación de roles</div>
    <div class="card-body">
        <!-- El action debe apuntar a tu script PHP que maneja la inserción -->
        <form action="asignar_rol.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Maria"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <input type="text" class="something" class="form-control" name="rol" id="rol" placeholder="gerente"/>
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
   <div class="card-header">
   Usuarios 
   </div>

   <div class="card-body">
       <div class="table-responsive-sm">
           <table class="table">
               <thead>
                   <tr>
                       <th scope="col">Usuario</th>
                       <th scope="col">Host</th>
                       <th scope="col">Rol</th>
                       <th scope="col">Acciones</th>
                   </tr>
               </thead>
               <tbody>
               <?php
                   try {
                       // Ejecutar la consulta
                       $query = "SELECT u.User, u.Host, COALESCE(r.Role, 'sin rol') AS role
                                 FROM mysql.user u
                                 LEFT JOIN mysql.roles_mapping r ON u.User = r.User AND u.Host = r.Host
                                 ORDER BY u.User, u.Host;";
                       $stmt = $conexion->prepare($query);
                       $stmt->execute();

                       // Obtener los resultados y mostrarlos en la tabla
                       while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                           echo "<tr>";
                           echo "<td>" . htmlspecialchars($row['User']) . "</td>";
                           echo "<td>" . htmlspecialchars($row['Host']) . "</td>";
                           echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                           echo "<td>
                           <a name='' id='' class='btn btn-info edit-user' href='#' role='button'
                           data-id='" . htmlspecialchars($row['User']) . "' 
                           data-host='" . htmlspecialchars($row['Host']) . "' 
                           data-role='" . htmlspecialchars($row['role']) . "'>Editar</a> |
                           <a name='' id='' class='btn btn-danger delete-user' href='#' role='button'
                           data-id='" . htmlspecialchars($row['User']) . "' 
                           data-host='" . htmlspecialchars($row['Host']) . "'>Eliminar</a>
                               </td>";
                           echo "</tr>";
                       }
                   } catch(Exception $ex) {
                       echo "<tr><td colspan='4'>" . $ex->getMessage() . "</td></tr>";
                   }
               ?>
               </tbody>
           </table>
       </div>
   </div>
</div>

<!-- Modal para agregar usuario -->
<div id="addUserModal" class="modal">
   <div class="modal-content">
       <div class="modal-header">
           <span class="close">&times;</span>
           <h2>Agregar Usuario</h2>
       </div>
       <div class="modal-body">
           <form id="addUserForm" method="post" action="create_user.php">
               <div class="form-group">
                   <label for="username">Nombre de Usuario</label>
                   <input type="text" id="username" name="username" required>
               </div>
               <div class="form-group">
                   <label for="password">Contraseña</label>
                   <input type="password" id="password" name="password" required>
               </div>
               <button type="submit" class="btn btn-primary">Agregar</button>
           </form>
       </div>
   </div>
</div>

<!-- Modal para editar usuario -->
<div id="editUserModal" class="modal">
   <div class="modal-content">
       <div class="modal-header">
           <span class="close" id="closeEditModal">&times;</span>
           <h2>Editar Usuario</h2>
       </div>
       <div class="modal-body">
           <form id="editUserForm" method="post" action="editar.php">
               <input type="hidden" id="editUserId" name="id" required>
               <div class="form-group">
                   <label for="editUsername">Nombre de Usuario</label>
                   <input type="text" id="editUsername" name="username" required>
               </div>
               <div class="form-group">
                   <label for="editPassword">Contraseña</label>
                   <input type="password" id="editPassword" name="password">
               </div>
               <button type="submit" class="btn btn-primary">Guardar cambios</button>
           </form>
       </div>
   </div>
</div>

<!-- Modal para confirmar eliminación -->
<div id="deleteUserModal" class="modal">
   <div class="modal-content">
       <div class="modal-header">
           <span class="close" id="closeDeleteModal">&times;</span>
           <h2>Eliminar Usuario</h2>
       </div>
       <div class="modal-body">
           <p>¿Está seguro de que desea eliminar este usuario?</p>
           <form id="deleteUserForm" method="post" action="eliminar.php">
               <input type="hidden" id="deleteUserId" name="id" required>
               <button type="submit" class="btn btn-danger">Eliminar</button>
               <button type="button" class="btn btn-secondary" id="cancelDelete">Cancelar</button>
           </form>
       </div>
   </div>
</div>

<?php include("../../templates/footer.php"); ?>

<script>
// Obtener el modal
var modal = document.getElementById("addUserModal");

// Obtener el botón que abre el modal
var btn = document.getElementById("addUserButton");

// Obtener el <span> que cierra el modal
var span = document.getElementsByClassName("close")[0];

// Cuando el usuario hace clic en el botón, se abre el modal
btn.onclick = function() {
  modal.style.display = "block";
}

// Cuando el usuario hace clic en <span> (x), se cierra el modal
span.onclick = function() {
  modal.style.display = "none";
}

// Cuando el usuario hace clic en cualquier parte fuera del modal, se cierra el modal
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//modal para editar
// Obtener el modal de edición
var editModal = document.getElementById("editUserModal");

// Obtener el botón que cierra el modal de edición
var closeEditModal = document.getElementById("closeEditModal");

// Cuando el usuario hace clic en el botón "Editar", se abre el modal de edición
document.querySelectorAll('.edit-user').forEach(function(button) {
    button.onclick = function() {
        var userId = this.getAttribute('data-id');
        var userName = this.getAttribute('data-host');
        var userRole = this.getAttribute('data-role');

        document.getElementById('editUserId').value = userId;
        document.getElementById('editUsername').value = userName;
        document.getElementById('editPassword').value = '';

        editModal.style.display = "block";
    }
});

// Cuando el usuario hace clic en <span> (x), se cierra el modal de edición
closeEditModal.onclick = function() {
  editModal.style.display = "none";
}

// Cuando el usuario hace clic en cualquier parte fuera del modal, se cierra el modal
window.onclick = function(event) {
  if (event.target == editModal) {
    editModal.style.display = "none";
  }
}

// Obtener el modal de eliminación
var deleteModal = document.getElementById("deleteUserModal");
var closeDeleteModal = document.getElementById("closeDeleteModal");
var cancelDelete = document.getElementById("cancelDelete");

document.querySelectorAll('.delete-user').forEach(function(button) {
    button.onclick = function() {
        var userId = this.getAttribute('data-id');

        document.getElementById('deleteUserId').value = userId;

        deleteModal.style.display = "block";
    }
});

closeDeleteModal.onclick = function() {
  deleteModal.style.display = "none";
}

cancelDelete.onclick = function() {
  deleteModal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == deleteModal) {
    deleteModal.style.display = "none";
  }
}
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybG4qXHcp3yE7BvQbg64lZG0LHmQG9S1scrPtkwpGLf9gffvM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-qgHwzdDBgqCCPG6o/Ow7eZNBwXQhoYc3vHmjLWBHd6zxOi7UwSQQpFS63YVwTu6m" crossorigin="anonymous"></script>
