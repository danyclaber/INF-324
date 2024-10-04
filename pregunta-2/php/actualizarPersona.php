<?php
include 'conexionBD.php';
$conn = conectarBD();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_persona = $_POST['id_persona'];
    $ci = $_POST['ci'];
    $nombres = $_POST['nombres'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];

    $sql_update = "UPDATE persona SET ci='$ci', nombres='$nombres', apaterno='$apaterno', amaterno='$amaterno' WHERE id_persona='$id_persona'";

    if (mysqli_query($conn, $sql_update)) {
        echo "<script>alert('Datos actualizados correctamente.'); window.location.href='../listar.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar los datos: " . mysqli_error($conn) . "'); window.location.href='../listar.php';</script>";
    }
}

mysqli_close($conn);
?>