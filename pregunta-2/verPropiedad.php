<?php
session_start(); // Iniciar sesión

// Verificar si el usuario ha iniciado sesión y tiene el rol de 'funcionario'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'funcionario') {
    header('Location: login.php');
    exit();
}

include 'php/conexionBD.php';
$conexion = conectarBD();

// Verificar si se ha pasado el parámetro 'id' en la URL
if (isset($_GET['id'])) {
    $idPersona = $_GET['id']; // Obtener el ID de la persona desde la URL

    // Consulta para obtener los datos de la tabla Propiedad
    $sql = "SELECT * FROM propiedad WHERE id_persona = '$idPersona'";
    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }
} else {
    // Manejo de error si el ID no está establecido
    echo "No se ha proporcionado el ID de la persona.";
}
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
                    <input type="hidden" class="form-control" id="idPersona-1" name="idPersona-1" value="<?php echo htmlspecialchars($idPersona); ?>" readonly>
                    <h2 class="mb-4 text-center">Lista de Propiedades</h2>
                    <a href="listar.php" class="btn btn-secondary my-2">Volver</a>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Código Catastral</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Distrito</th>
                                    <th scope="col">Zona</th>
                                    <th scope="col">Superficie</th>
                                    <!-- <th scope="col">X Inicio</th>
                                    <th scope="col">Y Inicio</th>
                                    <th scope="col">X Fin</th>
                                    <th scope="col">Y Fin</th> -->
                                    <th scope="col">Tipo de Propiedad</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Suponiendo que $resultado contiene los datos de la tabla Propiedad
                                if (mysqli_num_rows($resultado) > 0) {
                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                        echo "<tr>";
                                        echo "<td>" . $fila['id'] . "</td>";
                                        echo "<td>" . $fila['codCatastral'] . "</td>";
                                        echo "<td>" . $fila['direccion'] . "</td>";
                                        echo "<td>" . $fila['distrito'] . "</td>";
                                        echo "<td>" . $fila['zona'] . "</td>";
                                        echo "<td>" . $fila['superficie'] . "</td>";
                                        // echo "<td>" . $fila['xIni'] . "</td>";
                                        // echo "<td>" . $fila['yIni'] . "</td>";
                                        // echo "<td>" . $fila['xFin'] . "</td>";
                                        // echo "<td>" . $fila['yFin'] . "</td>";
                                        echo "<td>" . $fila['tipoPropiedad'] . "</td>";
                                        echo "<td>" . $fila['valor'] . "</td>";
                                        echo "<td>";
                                        echo "<button class='btn btn-primary btn-sm btnEditar' data-id='" . $fila['id'] . "' data-codCatastral='" . $fila['codCatastral'] . "' data-direccion='" . $fila['direccion'] . "' data-distrito='" . $fila['distrito'] . "' data-zona='" . $fila['zona'] . "' data-superficie='" . $fila['superficie'] . "' data-xIni='" . $fila['xIni'] . "' data-yIni='" . $fila['yIni'] . "' data-xFin='" . $fila['xFin'] . "' data-yFin='" . $fila['yFin'] . "' data-tipoPropiedad='" . $fila['tipoPropiedad'] . "' data-valor='" . $fila['valor'] . "'>";
                                        echo "<i class='fas fa-edit'></i>";
                                        echo "</button>";
                                        echo "<button class='btn btn-danger btn-sm btnEliminar' data-id='" . $fila['id'] . "'>";
                                        echo "<i class='fas fa-trash'></i>";
                                        echo "</button>";
                                        echo "<button class='btn btn-warning btn-sm btnImpuesto' data-id='" . $fila['codCatastral'] . "'>";
                                        echo "<i class='fas fa-calculator'></i>";
                                        echo "</button>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='13' class='text-center'>No hay propiedades registradas</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal para Editar Propiedad -->
                <div class="modal fade" id="modalEditarPropiedad" tabindex="-1" aria-labelledby="modalEditarPropiedadLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content p-4">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditarPropiedadLabel">Editar Propiedad</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formEditarPropiedad" action="php/actualizarPropiedad.php" method="post">
                                    <input type="hidden" name="id" id="id_propiedad">
                                    <input type="hidden" class="form-control" id="idPersona" name="idPersona" value="<?php echo htmlspecialchars($idPersona); ?>" readonly>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="codCatastral" class="form-label">Código Catastral</label>
                                            <select class="form-select" id="codCatastral" name="codCatastral" required>
                                                <option value="" disabled selected>Selecciona un código</option> <!-- Opción por defecto -->
                                                <option value="CP001">CP001</option>
                                                <option value="CP002">CP002</option>
                                                <option value="CP003">CP003</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="direccion" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="distrito" class="form-label">Distrito</label>
                                            <input type="number" class="form-control" id="distrito" name="distrito" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="zona" class="form-label">Zona</label>
                                            <input type="text" class="form-control" id="zona" name="zona" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="superficie" class="form-label">Superficie</label>
                                            <input type="number" step="0.01" class="form-control" id="superficie" name="superficie" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="xIni" class="form-label">X Inicio</label>
                                            <input type="number" step="0.01" class="form-control" id="xIni" name="xIni" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="yIni" class="form-label">Y Inicio</label>
                                            <input type="number" step="0.01" class="form-control" id="yIni" name="yIni" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="xFin" class="form-label">X Fin</label>
                                            <input type="number" step="0.01" class="form-control" id="xFin" name="xFin" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="yFin" class="form-label">Y Fin</label>
                                            <input type="number" step="0.01" class="form-control" id="yFin" name="yFin" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tipoPropiedad" class="form-label">Tipo de Propiedad</label>
                                            <input type="text" class="form-control" id="tipoPropiedad" name="tipoPropiedad" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="valor" class="form-label">Valor</label>
                                        <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
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
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="js/pasarParametroImpuesto.js"></script>
    <script src="js/actualizarPropiedad.js"></script>
    <script src="js/eliminarPropiedad.js"></script>
    <script src="js/script.js"></script>

</body>

</html>