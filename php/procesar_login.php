<?php
include_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = md5($_POST['contrasena']); // Encriptar la contraseña con MD5

    // Consultar la base de datos para validar las credenciales
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena_hash = '$contrasena'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        session_start();
        $_SESSION['usuario'] = $usuario;

        // Redirigir a usuario.php
        header('Location: ../usuario.php');
        exit();
    } else {
        // Credenciales incorrectas
        echo 'Usuario o contraseña incorrectos. Vuelve a intentarlo.';
    }
}

$conexion->close();
?>
