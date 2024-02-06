<?php
include('php/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $documento = $_POST['documento'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Combina fecha y hora en un formato adecuado para MySQL DATETIME
    $fechaHora = $fecha . ' ' . $hora;

    $sql = "INSERT INTO turnos (nombre_cliente, fecha_turno, hora_turno) VALUES ('$documento', NOW(), '$fechaHora')";

    if ($conexion->query($sql) === TRUE) {
        echo 'Turno solicitado correctamente.';
    } else {
        echo 'Error al solicitar el turno: ' . $conexion->error;
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Turno</title>
    <link rel="stylesheet" href="css/stilo.css">
</head>
<body>
<div id="contenedor">
    <img src="img/logo.png" alt="Logo" width="200">
    <h1>Solicitud de Turno</h1>
    <form action="procesar_turno.php" method="post">
        <label for="documento">Número de Documento:</label>
        <input type="text" name="documento" required>

        <label for="fecha">Fecha:</label>
        <select name="fecha" required>
            <?php
            include('php/conexion.php');

            // Función para obtener las fechas disponibles desde la base de datos
            function obtenerFechasDisponibles() {
                global $conexion;

                $sql = "SELECT DISTINCT fecha_turno FROM turnos";
                $result = $conexion->query($sql);

                $fechasOcupadas = array();
                while ($row = $result->fetch_assoc()) {
                    $fechasOcupadas[] = $row['fecha_turno'];
                }

                return $fechasOcupadas;
            }

            // Generar lista de fechas disponibles (máximo 4 días a partir de la fecha actual)
            $fechasOcupadas = obtenerFechasDisponibles();
            $fechaActual = date('Y-m-d');
            $fechaMaxima = date('Y-m-d', strtotime($fechaActual . ' + 4 days'));

            for ($fecha = strtotime($fechaActual); $fecha <= strtotime($fechaMaxima); $fecha += 24 * 60 * 60) {
                $fechaActual = date('Y-m-d', $fecha);
                if (!in_array($fechaActual, $fechasOcupadas)) {
                    echo '<option value="' . $fechaActual . '">' . $fechaActual . '</option>';
                }
            }

            $conexion->close();
            ?>
        </select>

        <label for="hora">Hora:</label>
        <select name="hora" required>
            <?php
            include('php/conexion.php');

            // Función para obtener las horas disponibles desde la base de datos
            function obtenerHorasDisponibles($fecha) {
                global $conexion;

                $sql = "SELECT hora_turno FROM turnos WHERE fecha_turno = '$fecha'";
                $result = $conexion->query($sql);

                $horasOcupadas = array();
                while ($row = $result->fetch_assoc()) {
                    $horasOcupadas[] = $row['hora_turno'];
                }

                return $horasOcupadas;
            }

            // Generar lista de horas disponibles
            $fechaSeleccionada = isset($_POST['fecha']) ? $_POST['fecha'] : date('Y-m-d');
            $horasOcupadas = obtenerHorasDisponibles($fechaSeleccionada);

            $horaInicio = strtotime('08:00');
            $horaFin = strtotime('16:40');
            $intervalo = 10 * 60;

            for ($hora = $horaInicio; $hora <= $horaFin; $hora += $intervalo) {
                $horaActual = date('H:i', $hora);
                if (!in_array($horaActual, $horasOcupadas)) {
                    echo '<option value="' . $horaActual . '">' . $horaActual . '</option>';
                }
            }

            $conexion->close();
            ?>
        </select>

        <button type="submit">Solicitar Turno</button>
    </form>
    </div>
</body>
</html>
