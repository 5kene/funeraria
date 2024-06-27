<?php
include("../../bd.php");
?>
<?php include("../../templates/header.php"); ?>

<link rel="stylesheet" href="index.css">
<br/>
<div id="message-box" class="message-box alert alert-success" style="<?php if(isset($_SESSION['message']) || isset($_SESSION['error'])) { echo "display: block;"; } ?>">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message']; // Muestra el mensaje de la sesión
        unset($_SESSION['message']); // Elimina el mensaje de la sesión después de mostrarlo
    }
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error']; // Muestra el mensaje de error de la sesión
        unset($_SESSION['error']); // Elimina el mensaje de error de la sesión después de mostrarlo
        echo '<script>document.getElementById("message-box").classList.replace("alert-success", "alert-danger");</script>';
    }
    ?>
</div>

<a name="" id="addRolButton" class="btn btn-primary" href="generar_trigger.php" role="button">
    Generar Triggers
</a>

<div class="card">
    <div class="card-header">Auditoria</div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre_Tabla</th>
                        <th scope="col">Fecha y Hora</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Accion generada</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        // Obtener el número total de registros
                        $stmt = $conexion->query("SELECT COUNT(*) FROM auditoria");
                        $total_rows = $stmt->fetchColumn();

                        // Configuración de la paginación
                        $rows_per_page = 10;
                        $total_pages = ceil($total_rows / $rows_per_page);
                        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        if ($current_page < 1) {
                            $current_page = 1;
                        } elseif ($current_page > $total_pages) {
                            $current_page = $total_pages;
                        }
                        $offset = ($current_page - 1) * $rows_per_page;

                        // Consulta a la base de datos para obtener los datos de la tabla auditoria con límite y desplazamiento
                        $stmt = $conexion->prepare("SELECT * FROM auditoria LIMIT :limit OFFSET :offset");
                        $stmt->bindParam(':limit', $rows_per_page, PDO::PARAM_INT);
                        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $row['ID']; ?></td>
                                <td><?php echo $row['nombre_tabla']; ?></td>
                                <td><?php echo $row['fecha_hora']; ?></td>
                                <td><?php echo $row['usuario']; ?></td>
                                <td><?php echo $row['detalle_accion']; ?></td>
                                <td>
                                    <a class='btn btn-danger' href='eliminar_auditoria.php?id=<?php echo $row['ID']; ?>' role='button' onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php }
                    } catch (Exception $ex) {
                        echo "Error: " . $ex->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($current_page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Anterior">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <?php if ($current_page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Siguiente">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>

<script>
    window.onload = function() {
        setTimeout(function() {
            var messageBox = document.getElementById('message-box');
            if (messageBox.style.display === 'block' || messageBox.style.display === '') {
                messageBox.style.display = 'none';
            }
        }, 5000); // 5000 milisegundos = 5 segundos
    };
</script>

<?php include("../../templates/footer.php"); ?>
