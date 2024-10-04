<?php
session_start(); // Iniciar sesión

// Verificar si el usuario ha iniciado sesión y tiene el rol de 'funcionario'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'funcionario') {
    header('Location: login.php');
    exit();
}

include 'php/conexionBD.php'; // Conexión a la base de datos
$conexion = conectarBD(); // Llamada a la función de conexión

// Consulta para obtener los datos de la tabla Persona
$sql = "SELECT a.* 
        FROM persona a 
        INNER JOIN usuario b ON a.ci = b.ci 
        WHERE b.rol != 'funcionario'";
$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">

        <!-- aside -->
        <?php include 'include/aside.php'; ?>

        <div class="main">
            <!-- nav -->
            <?php include 'include/nav.php'; ?>
            <main class="content px-3 py-5">
                <div class="container">
                    <h2 class="mb-4 text-center">Listar Personas</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">CI</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Paterno</th>
                                    <th scope="col">Materno</th>
                                    <th scope="col">Propiedad</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Mostrar los resultados de la base de datos -->
                                <?php
                                if (mysqli_num_rows($resultado) > 0) {
                                    // Recorrer los resultados y mostrarlos en la tabla
                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                        echo "<tr>";
                                        echo "<td>" . $fila['id_persona'] . "</td>";
                                        echo "<td>" . $fila['ci'] . "</td>";
                                        echo "<td>" . $fila['nombres'] . "</td>";
                                        echo "<td>" . $fila['aPaterno'] . "</td>";
                                        echo "<td>" . $fila['aMaterno'] . "</td>";
                                        echo "<td>";
                                        echo "<button class='btn btn-info btn-sm btnVerPropiedad' id='btnVerPropiedad' data-id='" . $fila['id_persona'] . "'>";
                                        echo "<i class='fas fa-eye'></i>";
                                        echo "</button>";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "<button class='btn btn-primary btn-sm btnEditar' data-id='" . $fila['id_persona'] . "' data-ci='" . $fila['ci'] . "' data-nombres='" . $fila['nombres'] . "' data-apaterno='" . $fila['aPaterno'] . "' data-amaterno='" . $fila['aMaterno'] . "'>";
                                        echo "<i class='fas fa-edit'></i>";
                                        echo "</button>";
                                        echo "<button class='btn btn-danger btn-sm btnEliminar' data-id='" . $fila['id_persona'] . "'>";
                                        echo "<i class='fas fa-trash'></i>";
                                        echo "</button>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='text-center'>No hay personas registradas</td></tr>";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- Modal para Editar Persona -->
                <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content p-4">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditarLabel">Editar Persona</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formEditarPersona" action="php/actualizarPersona.php" method="post">
                                    <input type="hidden" name="id_persona" id="id_persona">
                                    <div class="mb-3">
                                        <label for="ci" class="form-label">CI</label>
                                        <input type="text" class="form-control" id="ci" name="ci" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombres" class="form-label">Nombres</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="apaterno" class="form-label">Apellido Paterno</label>
                                        <input type="text" class="form-control" id="apaterno" name="apaterno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="amaterno" class="form-label">Apellido Materno</label>
                                        <input type="text" class="form-control" id="amaterno" name="amaterno" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- footer -->
            <?php include 'include/footer.php'; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/eliminarPersona.js"></script>
    <script src="js/actualizarPersona.js"></script>
    <script src="js/verPropiedad.js"></script>
    <script src="js/script.js"></script>

</body>

</html>

<?php
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>