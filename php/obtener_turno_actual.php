<?php
include_once('conexion.php');

// Consulta para obtener el último turno no asignado desde la base de datos
$sql = "SELECT turno FROM turnos_especiales WHERE estado = 1 AND turno IS NOT NULL ORDER BY id DESC LIMIT 1";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ultimoTurno = $row['turno'];
    echo $ultimoTurno;
} else {
    echo '';
}

$conexion->close();
?>
