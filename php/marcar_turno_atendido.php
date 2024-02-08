<?php
include_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el ID del turno a marcar como atendido
    $idTurno = $_POST['idTurno'];

    // Actualizar el estado del turno a "atendido" en la base de datos
    $sqlUpdate = "UPDATE turnos_especiales SET estado = '1' WHERE id = $idTurno";
    
    if ($conexion->query($sqlUpdate) === TRUE) {
        echo 'Turno marcado como atendido correctamente';
    } else {
        echo 'Error al marcar el turno como atendido: ' . $conexion->error;
    }
}

$conexion->close();
?>
