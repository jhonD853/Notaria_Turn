<?php
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $documento = $_POST['documento'];
    $fecha = $_POST['fecha'];
    $idHora = $_POST['hora'];  // Modificado para recibir el ID de la hora en lugar de la hora

    // Combina fecha y hora en un formato adecuado para MySQL DATETIME
    $fechaHora = $fecha . ' ' . date('H:i:s'); // Utiliza la hora actual del servidor

    // Inserta el turno con el ID de la hora
    $sql = "INSERT INTO turnos (nombre_cliente, fecha_turno, id_hora_disponible) VALUES ('$documento', '$fechaHora', $idHora)";

    if ($conexion->query($sql) === TRUE) {
        echo 'Turno solicitado correctamente.';
    } else {
        echo 'Error al solicitar el turno: ' . $conexion->error;
    }
}
    // Redirige a otra página después de la operación
    header('Location: pag_turn.php');
    exit;
$conexion->close();
?>

