<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil del Repartidor</title>
</head>
<body>
    <h1>Perfil del Repartidor</h1>
    <form action="?controller=repartidor&action=actualizarPerfil" method="post">
        <p>Nombre: <input type="text" name="nombre" value="<?php echo $repartidor['nombre']; ?>"></p>
        <p>Método de transporte: <input type="text" name="metodo_transporte" value="<?php echo $repartidor['metodo_transporte']; ?>"></p>
        <p>Usuario: <input type="text" name="usuario" value="<?php echo $repartidor['usuario']; ?>" readonly></p>
        <p>Disponibilidad: <?php echo isset($repartidor['disponibilidad']) ? ($repartidor['disponibilidad'] ? 'Disponible' : 'No Disponible') : 'No Disponible'; ?></p>
        <!-- Formulario para actualizar la disponibilidad -->
        <label for="disponibilidad">Marcar como disponible</label>
        <input type="checkbox" id="disponibilidad" name="disponibilidad" <?php echo $repartidor['disponibilidad'] ? 'checked' : ''; ?>>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
