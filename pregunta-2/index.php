<?php
session_start(); // Iniciar sesión

// Verificar si el usuario ha iniciado sesión y tiene el rol de 'funcionario'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'funcionario') {
    header('Location: login.php');
    exit();
}

include 'php/conexionBD.php';
$conexion = conectarBD();

// Inicializar variables
$fila = null; // Para almacenar los datos de la persona

// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ci'])) {
    $ci = $_GET['ci'];
    // Consulta para buscar la persona
    $sql = "SELECT * FROM persona WHERE ci = '$ci'";
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si se obtuvieron resultados
    if ($resultado) {
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            // echo "<script>alert('Persona Encontrada');</script>";
        } else {
            echo "<script>alert('No se encontró a la Persona');</script>";
        }
    } else {
        echo "<script>alert('Error en la consulta: " . mysqli_error($conexion) . "');</script>";
    }

    // Cerrar conexión
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">

        <!-- aside -->
        <?php include 'include/aside.php'; ?>

        <div class="main">
            <!-- nav -->
            <?php include 'include/nav.php'; ?>

            <main class="content py-2">
                <div class="container p-3">
                    <div class="row justify-content-center"> <!-- Centra las columnas dentro de la fila -->
                        <div class="col-md-5">
                            <!-- Mostrar de Persona -->
                            <div class="card my-4 px-3">
                                <div class="card-body">
                                    <h5 class="card-title my-3 pb-2 text-center">Información de Persona</h5>
                                    <?php if ($fila): ?>
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-text"><strong>CI:</strong></p>
                                            </div>
                                            <div class="col">
                                                <p class="card-text"><?= htmlspecialchars($fila['ci']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-text"><strong>Nombres:</strong></p>
                                            </div>
                                            <div class="col">
                                                <p class="card-text"><?= htmlspecialchars($fila['nombres']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-text"><strong>Apellido Paterno:</strong></p>
                                            </div>
                                            <div class="col">
                                                <p class="card-text"><?= htmlspecialchars($fila['aPaterno']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-text"><strong>Apellido Materno:</strong></p>
                                            </div>
                                            <div class="col">
                                                <p class="card-text"><?= htmlspecialchars($fila['aMaterno']) ?></p>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <p class="text-danger">No se encontraron datos.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Campo de Búsqueda con ícono -->
                            <form id="search-form" action="" method="get" class="">
                                <div class="input-group mb-4 search-input">
                                    <input type="text" class="form-control" id="search-carnet" name="ci" placeholder="Buscar persona...." aria-label="Buscar persona" required>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-search p-2"></i>
                                    </button>
                                </div>
                            </form>

                        </div>

                        <div class="col-md-5">
                            <!-- Formulario de Registro de Persona -->
                            <div class="card shadow-sm card-form p-4 my-4">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-4">Registrar Persona</h5>
                                    <form action="php/insertarPersona.php" method="POST">
                                        <div class="mb-3 input-group">
                                            <span class="input-group-text" id="ci-icon">
                                                <i class="bi bi-card-text"></i>
                                            </span>
                                            <input type="text" class="form-control" id="ci" name="ci" placeholder="CI" required aria-describedby="ci-icon">
                                        </div>
                                        <div class="mb-3 input-group">
                                            <span class="input-group-text" id="nombres-icon">
                                                <i class="bi bi-person"></i>
                                            </span>
                                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required aria-describedby="nombres-icon">
                                        </div>
                                        <div class="mb-3 input-group">
                                            <span class="input-group-text" id="apaterno-icon">
                                                <i class="bi bi-person-fill"></i>
                                            </span>
                                            <input type="text" class="form-control" id="aPaterno" name="aPaterno" placeholder="Apellido Paterno" required aria-describedby="apaterno-icon">
                                        </div>
                                        <div class="mb-3 input-group">
                                            <span class="input-group-text" id="amaterno-icon">
                                                <i class="bi bi-person-fill"></i>
                                            </span>
                                            <input type="text" class="form-control" id="aMaterno" name="aMaterno" placeholder="Apellido Materno" required aria-describedby="amaterno-icon">
                                        </div>
                                        <button type="submit" class="btn btn-success w-100 mt-3 py-2">Registrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <!-- Registrar propiedad -->
                            <div class="card shadow-sm card-form p-4">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-3 pb-3">Registrar Propiedad</h5>
                                    <form action="php/insertarPropiedad.php" method="POST">
                                        <!-- Código Catastral y Distrito -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="codCatastral-icon">
                                                        <i class="bi bi-file-earmark"></i>
                                                    </span>
                                                    <select class="form-control" id="codCatastral" name="codCatastral" required aria-describedby="codCatastral-icon">
                                                        <option value="">Seleccione un Codigo</option>
                                                        <option value="CP001">CP001</option>
                                                        <option value="CP002">CP002</option>
                                                        <option value="CP003">CP003</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="distrito-icon">
                                                        <i class="bi bi-signpost-split"></i>
                                                    </span>
                                                    <select class="form-control" id="distrito" name="distrito" required aria-describedby="distrito-icon">
                                                        <option value="">Seleccione Distrito</option>
                                                        <option value="1">Distrito 1</option>
                                                        <option value="2">Distrito 2</option>
                                                        <option value="3">Distrito 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Dirección y Zona -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="direccion-icon">
                                                        <i class="bi bi-geo-alt"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required maxlength="255" aria-describedby="direccion-icon">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="zona-icon">
                                                        <i class="bi bi-map"></i>
                                                    </span>
                                                    <select class="form-control" id="zona" name="zona" required aria-describedby="zona-icon">
                                                        <option value="">Seleccione Zona</option>
                                                        <option value="Zona 1">Zona 1</option>
                                                        <option value="Zona 2">Zona 2</option>
                                                        <option value="Zona 3">Zona 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Superficie y Tipo de Propiedad -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="superficie-icon">
                                                        <i class="bi bi-fullscreen"></i>
                                                    </span>
                                                    <input type="number" step="0.01" class="form-control" id="superficie" name="superficie" placeholder="Superficie (m²)" required aria-describedby="superficie-icon">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="tipoPropiedad-icon">
                                                        <i class="bi bi-house-door"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="tipoPropiedad" name="tipoPropiedad" placeholder="Tipo de Propiedad" required maxlength="50" aria-describedby="tipoPropiedad-icon">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Coordenadas Inicio -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="xIni-icon">
                                                        <i class="bi bi-arrows-angle-contract"></i>
                                                    </span>
                                                    <input type="number" step="0.01" class="form-control" id="xIni" name="xIni" placeholder="Coordenada X Inicio" required aria-describedby="xIni-icon">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="yIni-icon">
                                                        <i class="bi bi-arrow-up-circle"></i>
                                                    </span>
                                                    <input type="number" step="0.01" class="form-control" id="yIni" name="yIni" placeholder="Coordenada Y Inicio" required aria-describedby="yIni-icon">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Coordenadas Fin -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="xFin-icon">
                                                        <i class="bi bi-arrow-right-circle"></i>
                                                    </span>
                                                    <input type="number" step="0.01" class="form-control" id="xFin" name="xFin" placeholder="Coordenada X Fin" required aria-describedby="xFin-icon">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="yFin-icon">
                                                        <i class="bi bi-arrow-down-circle"></i>
                                                    </span>
                                                    <input type="number" step="0.01" class="form-control" id="yFin" name="yFin" placeholder="Coordenada Y Fin" required aria-describedby="yFin-icon">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Propietario y Valor -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="idPersona-icon">
                                                        <i class="bi bi-person"></i>
                                                    </span>

                                                    <input type="hidden" id="ci_usuario" name="ci_usuario" value="<?= htmlspecialchars(!empty($fila['ci']) ? $fila['ci'] : '') ?>" required>

                                                    <input type="hidden" id="id_persona" name="id_persona" value="<?= htmlspecialchars($fila['id_persona']) ?>">
                                                    <input type="text" class="form-control" id="propietario" placeholder="Propietario" required aria-describedby="propietario-icon"
                                                        value="<?= htmlspecialchars(!empty($fila['nombres']) && !empty($fila['aPaterno']) && !empty($fila['ci']) ? $fila['nombres'] . ' ' . $fila['aPaterno'] . ' - ' . $fila['ci'] : '') ?>"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 input-group">
                                                    <span class="input-group-text" id="valor-icon">
                                                        <i class="bi bi-currency-dollar"></i>
                                                    </span>
                                                    <input type="number" step="0.01" class="form-control" id="valor" name="valor" placeholder="Valor" required aria-describedby="valor-icon">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success w-100 mt-3 py-2">Registrar Propiedad</button>
                                    </form>
                                </div>
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
    <script src="js/script.js"></script>
</body>

</html>