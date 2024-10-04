<?php
include 'conexionBD.php'; // Incluir el archivo de conexión a la base de datos
$conexion = conectarBD(); // Llamar a la función de conexión

// Verificar si se ha recibido el CI
if (isset($_GET['id_persona'])) {
    $id = $_GET['id_persona'];

    // Eliminar registro
    $sql = "DELETE FROM persona WHERE id_persona = '$id'";

    if (mysqli_query($conexion, $sql)) {
        header("Location: ../listar.php");  // Redireccionar después de eliminar
        exit();
    } else {
        echo "Error al eliminar: " . mysqli_error($conexion);
    }
} else {
    echo "No se ha especificado el id_persona para eliminar.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
