
<?php
include 'conexionBD.php';
$conexion = conectarBD();

// Iniciar la sesión
session_start();

// Verificar si se enviaron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Consultar si el usuario existe en la base de datos y verificar la contraseña
    $sql = "SELECT b.id_persona, b.ci, a.rol, b.nombres, b.aPaterno, b.aMaterno
            FROM Usuario a 
            INNER JOIN Persona b ON a.ci = b.ci 
            WHERE a.ci = '$usuario' AND a.password = '$password'";

    $resultado = $conexion->query($sql);

    // Verificar si el usuario existe y la contraseña es correcta
    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();

        // Almacenar el rol, CI, y id_persona en variables de sesión
        $_SESSION['rol'] = $fila['rol'];
        $_SESSION['ci'] = $fila['ci'];
        $_SESSION['id_persona'] = $fila['id_persona'];
        $_SESSION['nombreCompleto'] = $fila['nombres'] . ' ' . $fila['aPaterno'] . ' ' . $fila['aMaterno'];

        // Inicio de sesión exitoso
        echo "<script>
                alert('¡Éxito! Inicio de sesión exitoso. Bienvenido " . $fila['nombres'] . " " . $fila['aPaterno'] . " " . $fila['aMaterno'] . ".' );
              </script>";

        // Verificar el rol del usuario y redireccionar
        if ($fila['rol'] === 'funcionario') {
            echo "<script>window.location.href = '../index.php';</script>";
        } elseif ($fila['rol'] === 'persona') {
            echo "<script>window.location.href = '../mostrarDatosPersona.php';</script>";
        } else {
            echo "<script>window.location.href = '../login.php';</script>"; // Redirigir a login si el rol no es válido
        }
    } else {
        // Usuario no encontrado o contraseña incorrecta
        echo "<script>
            alert('Error: Usuario o contraseña incorrecta.');
            window.location.href = '../login.php'; // Redireccionar a otra página
        </script>";
    }

    // Cerrar la conexión
    $conexion->close();
}
?>
