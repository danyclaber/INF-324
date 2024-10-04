<?php
$host = 'localhost';
$usuario = 'usuario';
$contrasena = '123456';
$bd = 'BDChristian';

// Crear conexión
$conexion = new mysqli($host, $usuario, $contrasena, $bd);

// Verificar si hay errores
if ($conexion->connect_error) {
    echo "<script>console.log('Error de conexión: " . $conexion->connect_error . "');</script>";
    die();
} else {
    echo "<script>console.log('Conexión exitosa a la base de datos.');</script>";
}

// Ejecutar la consulta
$query = "
    SELECT 
        a.id_persona,
        a.ci,
        a.nombres,
        a.aPaterno,
        a.aMaterno,
        MAX(CASE WHEN RIGHT(b.codCatastral, 1) = '1' THEN 1 ELSE 0 END) AS Alto,
        MAX(CASE WHEN RIGHT(b.codCatastral, 1) = '2' THEN 1 ELSE 0 END) AS Medio,
        MAX(CASE WHEN RIGHT(b.codCatastral, 1) = '3' THEN 1 ELSE 0 END) AS Bajo
    FROM 
        persona a
    LEFT JOIN 
        propiedad b ON a.id_persona = b.id_persona
    GROUP BY 
        a.id_persona, a.ci, a.nombres, a.aPaterno, a.aMaterno;
";

$result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pivote de Impuestos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container mt-5">
    <h1 class="text-center mb-4">Pivote de Impuestos</h1>
    
    <!-- Tabla para mostrar el resultado -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Resultados de la Consulta</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID Persona</th>
                        <th>CI</th>
                        <th>Nombres</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Alto</th>
                        <th>Medio</th>
                        <th>Bajo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Comprobar si hay resultados y mostrarlos
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['id_persona'] . "</td>
                                    <td>" . $row['ci'] . "</td>
                                    <td>" . $row['nombres'] . "</td>
                                    <td>" . $row['aPaterno'] . "</td>
                                    <td>" . $row['aMaterno'] . "</td>
                                    <td>" . $row['Alto'] . "</td>
                                    <td>" . $row['Medio'] . "</td>
                                    <td>" . $row['Bajo'] . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No se encontraron resultados.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
