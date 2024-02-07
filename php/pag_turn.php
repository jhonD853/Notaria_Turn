<?php
// Obtener el último turno generado
include('conexion.php');

$sqlUltimoTurno = "SELECT * FROM turnos ORDER BY id DESC LIMIT 1";
$resultadoUltimoTurno = $conexion->query($sqlUltimoTurno);

if ($resultadoUltimoTurno->num_rows > 0) {
    $ultimoTurno = $resultadoUltimoTurno->fetch_assoc();
    $numeroTurno = $ultimoTurno['turno'];
    $fechaTurno = date('d/m/y', strtotime($ultimoTurno['fecha_turno']));
    $horaTurno = date('H:i', strtotime($ultimoTurno['hora_turno']));
} else {
    // Manejar el caso en el que no hay ningún turno generado
    $numeroTurno = "N/A";
    $fechaTurno = "N/A";
    $horaTurno = "N/A";
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Turno</title>
    <link rel="stylesheet" href="css/stilo_confirmacion.css">
</head>
<body>
    <div id="contenedor-confirmacion">
        <img src="../img/logo.png" alt="Logo Confirmación" width="200" style="margin-top: 20px;">

        <h1>Confirmación de Turno</h1>

        <div class="confirmacion-recuadro">
            <img src="../img/turno.jpg" alt="Imagen de Turno" width="150" style="margin-bottom: 20px;">

            <h2>Número de Turno:</h2>
            <p><?php echo $numeroTurno; ?></p>

            <h2>Fecha del Turno:</h2>
            <p><?php echo $fechaTurno; ?></p>

            <h2>Hora del Turno:</h2>
            <p><?php echo $horaTurno; ?></p>
        </div>
    </div>
</body>
</html>

