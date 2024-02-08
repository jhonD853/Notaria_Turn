<?php
include_once('conexion.php');

// Función para obtener el próximo número de turno especial
function obtenerProximoTurnoEspecial() {
    global $conexion;

    $sql = "SELECT MAX(id) AS max_id FROM turnos_especiales";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();

    $proximoTurno = $row['max_id'] + 1;

    return $proximoTurno;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el próximo número de turno especial
    $proximoTurno = obtenerProximoTurnoEspecial();

    // Obtener la fecha actual del servidor
    $fechaGeneracion = date('Y-m-d');

    // Obtener la cédula del formulario (ajustar el nombre del campo según sea necesario)
    $cedula = $_POST['cedula'];

    // Insertar el turno especial en la tabla
    $sqlInsert = "INSERT INTO turnos_especiales (id, cedula, fecha_generacion, turno) VALUES ($proximoTurno, '$cedula', '$fechaGeneracion', 'S$proximoTurno')";
    
    if ($conexion->query($sqlInsert) === TRUE) {
        // Redirigir a la página deseada (ajustar la URL según sea necesario)
        header('Location: ../turno.php');
        exit();
    } else {
        echo 'Error al generar el turno especial: ' . $conexion->error;
    }
}

$conexion->close();
?>
