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
        <form action="php/inmediato.php" method="post">
            <label for="documento">Número de Documento:</label>
            <input type="text" name="cedula" required>


            <button type="submit">Solicitar Turno</button>
        </form>
    </div>
</body>
</html>