<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="contenedor-login">
        <h2>Iniciar Sesión</h2>
        <form action="php/procesar_login.php" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
