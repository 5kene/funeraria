<?php
include("../../bd.php");
?>
<?php include("../../templates/header.php"); ?>
<br/>

<div class="card">
    <div class="card-header">
    
    <a name="" id=""
        class="btn btn-primary"
        href="crear.php" role="button">
        Agregar usuario
    </a>
    <a name="" id=""
        class="btn btn-primary"
        href="crearrol.php" role="button">
        Agregar Roles
    </a>

    </div>

    <div class="card-body">

    <div
        class="table-responsive-sm"
    >
        <table
            class="table"
        >
            <thead>
                <tr>
                    <th scope="col">Nombre </th>
                    <th scope="col">FOTO</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    try {
                        // Ejecutar la consulta
                        $query = "SELECT User AS user, Role AS role FROM mysql.roles_mapping;";
                        $stmt = $conexion->prepare($query);
                        $stmt->execute();

                        // Obtener los resultados y mostrarlos en la tabla
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['user']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                            echo "<td>
                                <a name='' id='' class='btn btn-info' href='#' role='button'>Editar</a> |
                                <a name='' id='' class='btn btn-danger' href='#' role='button'>Eliminar</a>
                                </td>";
                            echo "</tr>";
                        }
                    } catch(Exception $ex) {
                        echo "<tr><td colspan='3'>" . $ex->getMessage() . "</td></tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
    
    </div>



<?php include("../../templates/footer.php"); ?>