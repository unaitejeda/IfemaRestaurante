<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos Asignados</title>
</head>
<body>
    <h1>Pedidos Asignados al Repartidor</h1>
    <!-- Aquí puedes iterar sobre $pedidos_asignados para mostrar cada pedido asignado -->
    <?php foreach ($pedidos_asignados as $pedido): ?>
        <p>Id del pedido: <?php echo $pedido['id']; ?></p>
        <!-- Muestra más detalles del pedido según tus necesidades -->
    <?php endforeach; ?>
</body>
</html>
