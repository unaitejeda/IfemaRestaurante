<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos Generales</title>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">


</head>
<body>
    <!-- Botón para ir al perfil del repartidor -->
    <a href="?controller=repartidor&action=perfil">Perfil</a>

    <h1>Pedidos Generales</h1>

    <?php if (!empty($pedidos)) : ?>
    <?php foreach ($pedidos as $pedido) : ?>
        <?php if (empty($pedido['estado'])): ?>
            <p>Id del pedido: <?php echo $pedido['id']; ?></p>
            <p>Nombre del usuario: <?php echo $pedido['id_usuario']; ?></p>
            <p>Hora del pedido: <?php echo $pedido['hora']; ?></p>
            <!-- Botones para ver detalles del pedido y para aceptar o rechazar -->
            <button class="ver-detalle" data-idPedido="<?php echo $pedido['id']; ?>">Ver Detalles</button>

            <form action="?controller=repartidor&action=aceptarPedido&id=<?php echo $pedido['id']; ?>" method="post">
                <button type="submit">Aceptar</button>
            </form>
            <form action="?controller=repartidor&action=rechazarPedido&id=<?php echo $pedido['id']; ?>" method="post">
                <button type="submit">Rechazar</button>
            </form>
            <hr>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php else : ?>
        <p>No hay pedidos disponibles.</p>
    <?php endif; ?>


    




    <h1>Mis Pedidos Aceptados</h1>
    <!-- Itera sobre $pedidos para mostrar solo los pedidos aceptados por el repartidor actual -->
    <?php foreach ($pedidos as $pedido) : ?>
        <?php if ($pedido['estado'] == 'aceptado' && $pedido['repartidor'] == $_SESSION['repartidor_id']): ?>
            <p>Id del pedido: <?php echo $pedido['id']; ?></p>
            <p>Nombre del usuario: <?php echo $pedido['id_usuario']; ?></p>
            <p>Hora del pedido: <?php echo $pedido['hora']; ?></p>
            <button class="ver-detalle" data-idPedido="<?php echo $pedido['id']; ?>">Ver Detalles</button>


            <hr>
        <?php endif; ?>
    <?php endforeach; ?>



    <script src="https://unpkg.com/notie/dist/notie.min.js"></script>
    <script src="javascript/popupPedido.js"></script>

</body>
</html>
