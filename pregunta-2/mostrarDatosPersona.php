<?php
session_start(); // Iniciar sesión

// Verificar si el usuario ha iniciado sesión y tiene el rol de 'persona'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'persona') {
    header('Location: login.php');
    exit();
}

include 'php/conexionBD.php';
$conexion = conectarBD();

// Realizar la consulta para obtener la información del propietario y de las propiedades
$id_persona = $_SESSION['id_persona']; // Obtener el id_persona de la sesión
$sql = "SELECT a.*, b.* FROM persona a 
        INNER JOIN propiedad b ON a.id_persona = b.id_persona 
        WHERE a.id_persona = '$id_persona'";
$resultado = $conexion->query($sql);

// Verificar si se obtuvo algún resultado
if ($resultado && $resultado->num_rows > 0) {
    $data = $resultado->fetch_all(MYSQLI_ASSOC); // Obtener todas las filas de resultados
} else {
    $data = []; // No hay resultados
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona</title>
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
            <main class="container">

                <div class="row m-5">
                    <!-- Tarjeta de Información del Propietario -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="pt-2">Información del Propietario</h5>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($data)): ?>
                                    <p><strong>Nombre:</strong> <?php echo $data[0]['nombres'] . ' ' . $data[0]['aPaterno'] . ' ' . $data[0]['aMaterno']; ?></p>
                                    <p><strong>CI:</strong> <?php echo $data[0]['ci']; ?></p>
                                <?php else: ?>
                                    <p>No se encontró información del propietario.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjetas de Información de las Propiedades -->
                    <?php if (!empty($data)): ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="pt-2">Información de las Propiedades</h5>
                                </div>
                                <div class="card-body">
                                    <?php foreach ($data as $propiedad): ?>
                                        <div class="mb-3">
                                            <p><strong>Código Catastral:</strong> <?php echo $propiedad['codCatastral']; ?></p>
                                            <p><strong>Tipo:</strong> <?php echo $propiedad['tipoPropiedad']; ?></p>
                                            <p><strong>Superficie:</strong> <?php echo $propiedad['superficie']; ?> m²</p>
                                            <p><strong>Valor:</strong> <?php echo $propiedad['valor']; ?> Bs</p>
                                            <p><strong>Ubicación:</strong> <?php echo $propiedad['direccion']; ?></p>
                                            <p><strong>Distrito:</strong> <?php echo $propiedad['distrito']; ?></p>
                                            <p><strong>Zona:</strong> <?php echo $propiedad['zona']; ?></p>
                                            <p><strong>X Inicial:</strong> <?php echo $propiedad['xIni']; ?></p>
                                            <p><strong>Y Inicial:</strong> <?php echo $propiedad['yIni']; ?></p>
                                            <p><strong>X Final:</strong> <?php echo $propiedad['xFin']; ?></p>
                                            <p><strong>Y Final:</strong> <?php echo $propiedad['yFin']; ?></p>
                                            <hr> <!-- Línea separadora -->
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Información de las Propiedades</h5>
                                </div>
                                <div class="card-body">
                                    <p>No se encontró información de las propiedades.</p>
                                </div>
                            </div>
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