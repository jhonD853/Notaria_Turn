<?php
include_once('conexion.php');

// Consulta para obtener los turnos pasados desde la base de datos
$sql = "SELECT * FROM turnos_especiales WHERE estado = 1 AND turno IS NOT NULL ORDER BY id DESC LIMIT 6";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="turno-pasado">' . $row['turno'] . '</div>';
    }
} else {
    echo '';
}

$conexion->close();
?>
