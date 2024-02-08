<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización de Turnos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/turnos.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h2>Turnos Pasados</h2>
                <div id="turnosPasados" class="lista-turnos"></div>
            </div>
            <div class="col-md-8">
                <h2>Turno Actual</h2>
                <div id="turnoActual" class="turno-actual">Cargando turno...</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/turnos.js"></script>
    <img src="img/logo.png" alt="">
</body>
</html>
