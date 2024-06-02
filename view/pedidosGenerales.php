<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pedidos Generales</title>
    <script>
        function verDetallePedido(idPedido) {
            // Abrir el popup con los detalles del pedido
            // Puedes implementar esto usando JavaScript y HTML/CSS o utilizando alguna librería de modales como Bootstrap
        }
    </script>
</head>

<body>
    <!-- Botón para ir al perfil del repartidor -->
    <a href="?controller=repartidor&action=perfil">Perfil</a>

    <h1>Pedidos Generales</h1>
    <!-- Itera sobre $pedidos para mostrar cada pedido -->
    <?php foreach ($pedidos as $pedido) : ?>
        <p>Id del pedido: <?php echo $pedido['id']; ?></p>
        <p>Nombre del usuario: <?php echo $pedido['id_usuario']; ?></p>
        <p>Hora del pedido: <?php echo $pedido['hora']; ?></p>
        <!-- Botones para ver detalles del pedido y para aceptar o rechazar -->
        <button onclick="verDetallePedido(<?php echo $pedido['id']; ?>)">Ver Detalles</button>
        <form action="?controller=repartidor&action=aceptarPedido&pedido_id=<?php echo $pedido['id']; ?>" method="get">
            <button type="submit">Aceptar</button>
        </form>
        <form action="?controller=repartidor&action=rechazarPedido&pedido_id=<?php echo $pedido['id']; ?>" method="get">
            <button type="submit">Rechazar</button>
        </form>


        <hr>
    <?php endforeach; ?>
</body>

</html>