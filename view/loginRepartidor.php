<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión como Repartidor</title>
</head>
<body>
    <h1>Iniciar sesión como Repartidor</h1>
    <form action="?controller=repartidor&action=login" method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br><br>
    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="contraseña" required><br><br>
    <button type="submit">Iniciar sesión</button>
</form>
</body>
</html>