<?php
session_start(); // Iniciar sesión

// Verificar si el usuario ha iniciado sesión y tiene el rol de 'funcionario'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'funcionario') {
    header('Location: login.php');
    exit();
}

include 'php/conexionBD.php';
$conexion = conectarBD();

$ci = $_SESSION['ci'];

// Consulta a la base de datos
$sql = "SELECT ci, nombres, aPaterno, aMaterno FROM Persona WHERE ci = '$ci'";
$resultado = $conexion->query($sql);

// Verificar si se obtuvieron resultados
if ($resultado && $resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
} else {
    $fila = null;
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
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
                <div class="container-fluid d-flex justify-content-center">
                    <?php if ($fila): ?>
                        <div class="card" style="width: 30rem;"> 
                            <div class="card-body">
                                <h5 class="card-title my-3 text-center">Información del Usuario</h5>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text"><strong>CI:</strong></p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text"><?php echo htmlspecialchars($fila['ci']); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text"><strong>Nombres:</strong></p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text"><?php echo htmlspecialchars($fila['nombres']); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text"><strong>Apellido Paterno:</strong></p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text"><?php echo htmlspecialchars($fila['aPaterno']); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text"><strong>Apellido Materno:</strong></p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text"><?php echo htmlspecialchars($fila['aMaterno']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                            No se encontró información del usuario.
                        </div>
                    <?php endif; ?>
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