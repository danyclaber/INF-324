<?php
include 'conexionBD.php';
$conexion = conectarBD(); // Conexión a la base de datos

// Recoger datos del formulario
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
$id_persona = $_POST['id_persona']; // ID de la persona (propietario)
$ci = $_POST['ci_usuario'];
$password = $_POST['ci_usuario'];
$rol = 'persona'; // Rol fijo como "persona"

// Insertar datos en la tabla 'Propiedad'
$sql_propiedad = "
    INSERT INTO Propiedad 
    (codCatastral, direccion, distrito, zona, superficie, xIni, yIni, xFin, yFin, tipoPropiedad, valor, id_persona) 
    VALUES 
    ('$codCatastral', '$direccion', '$distrito', '$zona', '$superficie', '$xIni', '$yIni', '$xFin', '$yFin', '$tipoPropiedad', '$valor', '$id_persona')
";

if (mysqli_query($conexion, $sql_propiedad)) {
    // Si el registro en Propiedad fue exitoso
    echo "<script>console.log('Registro en Propiedad exitoso');</script>";

    // Verificar si el usuario ya existe en la tabla 'Usuario'
    $sql_verificar = "SELECT * FROM Usuario WHERE ci = '$ci'";
    $resultado_verificar = mysqli_query($conexion, $sql_verificar);

    if (mysqli_num_rows($resultado_verificar) > 0) {
        echo "<script>alert('El usuario ya cuenta con una clave de acceso.');</script>";
    } else {
        // Insertar en la tabla 'Usuario'
        $sql_usuario = "
            INSERT INTO Usuario (ci, password, rol) 
            VALUES ('$ci', '$password', '$rol')
        ";
        if (mysqli_query($conexion, $sql_usuario)) {
            echo "<script>alert('Clave de acceso generada');</script>";
        } else {
            echo "<script>console.log('Error al registrar Usuario: " . mysqli_error($conexion) . "');</script>";
        }
    }

} else {
    // Si hubo un error al insertar en Propiedad
    echo "<script>console.log('Error en Propiedad: " . mysqli_error($conexion) . "');</script>";
}

mysqli_close($conexion);

// Redirigir a la página principal después de registrar
header("Location: ../listar.php");
exit();
?>