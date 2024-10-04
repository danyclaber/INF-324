<?php
function conectarBD()
{
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

    return $conexion;
}
?>