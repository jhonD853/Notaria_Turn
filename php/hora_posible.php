<?php
include_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener la fecha enviada desde el frontend
    $fechaSeleccionada = $_POST['fecha'];

    // Consulta para obtener los IDs de las horas disponibles para la fecha seleccionada
    $sql = "SELECT hd.id
            FROM horas_disponibles hd
            LEFT JOIN turnos t ON hd.id = t.id_hora_disponible AND t.fecha_turno = '$fechaSeleccionada'
            WHERE t.id_hora_disponible IS NULL";

    $result = $conexion->query($sql);

    $idsHorasDisponibles = array();
    while ($row = $result->fetch_assoc()) {
        $idsHorasDisponibles[] = $row['id'];
    }

    // Convertir los IDs a una cadena separada por comas para la siguiente consulta
    $idsString = implode(',', $idsHorasDisponibles);

    // Realizar una segunda consulta para obtener toda la información relacionada al ID
    $sqlDetalle = "SELECT id, hora, otra_columna
                   FROM horas_disponibles
                   WHERE id IN ($idsString)
                   AND id NOT IN (SELECT id_hora_disponible FROM turnos WHERE fecha_turno = '$fechaSeleccionada')";

    $resultDetalle = $conexion->query($sqlDetalle);

    $horasDisponibles = array();
    while ($rowDetalle = $resultDetalle->fetch_assoc()) {
        $horasDisponibles[] = $rowDetalle;
    }

    // Enviar la información al AJAX en formato JSON
    echo json_encode($horasDisponibles);
}

$conexion->close();
?>

