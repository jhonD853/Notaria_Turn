<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Turno</title>
    <link rel="stylesheet" href="css/stilo.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/scri.js">
</script>
</head>
<body>
    <div id="contenedor">
        <img src="img/logo.png" alt="Logo" width="200">
        <h1>Solicitud de Turno</h1>
        <form action="php/procesar_turno.php" method="post">
            <label for="documento">Número de Documento:</label>
            <input type="text" name="documento" required>

            <label for="fecha">Fecha:</label>
            <input type="text" name="fecha" id="datepicker" readonly required>

            <label for="hora">Hora:</label>
            <select name="hora" id="hora" required onchange="handleHoraChange()">
                <!-- Las opciones de hora se llenarán dinámicamente mediante JavaScript -->
            </select>

            <button type="submit">Solicitar Turno</button>
        </form>
    </div>
</body>
</html>