<?php
include 'conexionBD.php'; 
$conexion = conectarBD(); // Conexión a la base de datos

// Recoger datos del formulario
$ci = $_POST['ci'];
$nombres = $_POST['nombres'];
$apaterno = $_POST['aPaterno']; // Asegúrate de que el nombre del campo coincida
$amaterno = $_POST['aMaterno']; // Asegúrate de que el nombre del campo coincida

// Insertar datos en la tabla 'persona'
$sql = "INSERT INTO persona (ci, nombres, apaterno, amaterno) VALUES ('$ci', '$nombres', '$apaterno', '$amaterno')";

if (mysqli_query($conexion, $sql)) {
    // Si el registro fue exitoso, enviar mensaje a JavaScript
    echo "<script>console.log('Registro exitoso');</script>";
} else {
    // Si hubo un error, enviar el error a JavaScript
    echo "<script>console.log('Error: " . mysqli_error($conexion) . "');</script>";
}

// Cerrar la conexión
mysqli_close($conexion);

// Redirigir a la página principal después de registrar
header("Location: ../index.php");
exit();
?>
