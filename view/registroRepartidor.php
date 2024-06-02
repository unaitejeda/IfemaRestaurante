<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Repartidores</title>
</head>
<body>
    <h1>Registro de Repartidores</h1>
    <form action="?controller=repartidor&action=registrar" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="metodo_transporte">Método de Transporte:</label>
        <input type="text" id="metodo_transporte" name="metodo_transporte" required><br><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
