<?php
include 'conexionBD.php'; // Incluir el archivo de conexión a la base de datos
$conexion = conectarBD(); // Llamar a la función de conexión


if (isset($_GET['id_propiedad'])) {
    $id_propiedad = $_GET['id_propiedad'];
    $id_persona = $_GET['id_persona'];

    // Eliminar registro de la tabla propiedad
    $sql = "DELETE FROM propiedad WHERE id = '$id_propiedad'";

    if (mysqli_query($conexion, $sql)) {
        header("Location: ../verPropiedad.php?id=$id_persona");
        exit();
    } else {
        echo "Error al eliminar: " . mysqli_error($conexion);
    }
} else {
    echo "No se ha especificado el id_propiedad para eliminar.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
