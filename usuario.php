<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Turno</title>
    <link rel="stylesheet" href="css/stilo.css">
</head>
<body>
    <div id="contenedor">
        <a href="php/close.php"><img src="img/logo.png" alt="Logo" width="200"></a>

        <?php
        include_once('php/conexion.php');

        // Obtener el turno con el ID más bajo y que no tenga el estado con el número 1
        $sql = "SELECT * FROM turnos_especiales WHERE estado IS NULL ORDER BY id ASC LIMIT 1";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $turnoActual = $row['turno'];
            $idTurnoActual = $row['id'];

            // Mostrar el turno actual y el nombre de usuario
            echo '<h1>Siguiente turno </h1>';
            echo '<img id="imagenTurno" src="php/generar_img.php?idTurno=' . $idTurnoActual . '" alt="' . $turnoActual . '">';
            echo '<br>';
            echo '<button onclick="pasarSiguienteTurno(' . $idTurnoActual . ')">llamar este turno</button>';
        } else {
            echo '<h1>Sin turnos disponibles</h1>';
        }

        $conexion->close();
        ?>

        <script>
            // Función para redirigir a index2.php

            // Función para pasar al siguiente turno
            function pasarSiguienteTurno(idTurno) {
                // Realizar una solicitud AJAX para marcar el turno como atendido
                $.ajax({
                    url: 'php/marcar_turno_atendido.php',
                    type: 'POST',
                    data: { idTurno: idTurno },
                    error: function() {
                        // Manejar errores de la solicitud AJAX
                        console.error('Error al marcar el turno como atendido.');
                    }
                });
            }
        </script>
    </div>
</body>
</html>
