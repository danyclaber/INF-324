<?php
include 'conexionBD.php'; // Incluir el archivo de conexión a la base de datos
$conn = conectarBD(); // Establecer la conexión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $id_propiedad = $_POST['id']; // ID de la propiedad que se va a actualizar
    $codCatastral = $_POST['codCatastral'];
    $direccion = $_POST['direccion'];
    $distrito = $_POST['distrito'];
    $zona = $_POST['zona'];
    $superficie = $_POST['superficie'];
    $xIni = $_POST['xIni'];
    $yIni = $_POST['yIni'];
    $xFin = $_POST['xFin'];
    $yFin = $_POST['yFin'];
    $tipoPropiedad = $_POST['tipoPropiedad'];
    $valor = $_POST['valor'];
    $idPersona = $_POST['idPersona'];

    // Consulta SQL para actualizar la propiedad
    $sql_update = "UPDATE propiedad SET 
        codCatastral='$codCatastral', 
        direccion='$direccion', 
        distrito='$distrito', 
        zona='$zona', 
        superficie='$superficie', 
        xIni='$xIni', 
        yIni='$yIni', 
        xFin='$xFin', 
        yFin='$yFin', 
        tipoPropiedad='$tipoPropiedad', 
        valor='$valor' 
        WHERE id='$id_propiedad'"; // Usar el ID de la propiedad para la actualización

    // Ejecutar la consulta y manejar el resultado
    if (mysqli_query($conn, $sql_update)) {
        echo "<script>alert('Datos actualizados correctamente.'); window.location.href='../verPropiedad.php?id=$idPersona';</script>";
    } else {
        echo "<script>alert('Error al actualizar los datos: " . mysqli_error($conn) . "'); window.location.href='../listar.php';</script>";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
