<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Turno</title>
    <link rel="stylesheet" href="css/stilo.css">
    <script>
        // Función para redirigir a index2.php
        function redirigirManualmente() {
            window.location.href = 'index2.php';
        }

        // Agrega un script JavaScript para redireccionar después de un minuto
        setTimeout(function() {
            window.location.href = 'index2.php';
        }, 5000); // 60000 milisegundos = 1 minuto
    </script>
</head>
<body>
    <div id="contenedor">
        <img src="img/logo.png" alt="Logo" width="200">
        <h1>Turno Asignado</h1>
        <img id="imagenTurno" src="php/generar_img.php" alt="">
        <br>
        <button onclick="redirigirManualmente()">solicitar Turno</button>
    </div>
</body>
</html>
