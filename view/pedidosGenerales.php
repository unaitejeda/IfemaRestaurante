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

    <section class="seccionFiltros">
    <div class="container container4">
        <section class="category-filter">
            <label><input type="radio" name="orderFecha" value="fechaAsc"> Fecha Menor</label>
            <label><input type="radio" name="orderFecha" value="fechaDesc"> Fecha Mayor</label><br><br>
            <label><input type="radio" name="orderPrecio" value="precioAsc"> Menor Precio</label>
            <label><input type="radio" name="orderPrecio" value="precioDesc"> Mayor Precio</label>
            <button class="buttonReset" onclick="resetOrder()">Resetear Filtro</button>
        </section>
    </div>
</section>


    <div id="pedidosContainer">
        <?php if (!empty($pedidos)) : ?>
            <?php foreach ($pedidos as $pedido) : ?>
    <?php if (empty($pedido['estado'])) : ?>
        <div class="pedido" data-fecha="<?php echo $pedido['hora']; ?>" data-precio="<?php echo  $pedido['total']; ?>">
            <p>Id del pedido: <?php echo $pedido['id']; ?></p>
            <p>Nombre del usuario: <?php echo $pedido['id_usuario']; ?></p>
            <p>Hora del pedido: <?php echo $pedido['hora']; ?></p>
            
            <p>Total del pedido: <?php echo $pedido['total']; ?></p>
            <!-- Botones para ver detalles del pedido y para aceptar o rechazar -->
            <button class="ver-detalle" data-idPedido="<?php echo $pedido['id']; ?>">Ver Detalles</button>

            <form action="?controller=repartidor&action=aceptarPedido&id=<?php echo $pedido['id']; ?>" method="post">
                <button type="submit">Aceptar</button>
            </form>
            <form action="?controller=repartidor&action=rechazarPedido&id=<?php echo $pedido['id']; ?>" method="post">
                <button type="submit">Rechazar</button>
            </form>
        </div>
        <hr>
    <?php endif; ?>
<?php endforeach; ?>

        <?php else : ?>
            <p>No hay pedidos disponibles.</p>
        <?php endif; ?>
    </div>







    <h1>Mis Pedidos Aceptados</h1>
    <!-- Itera sobre $pedidos para mostrar solo los pedidos aceptados por el repartidor actual -->
    <?php foreach ($pedidos as $pedido) : ?>
        <?php if ($pedido['estado'] == 'aceptado' && $pedido['repartidor'] == $_SESSION['repartidor_id']) : ?>
            <p>Id del pedido: <?php echo $pedido['id']; ?></p>
            <p>Nombre del usuario: <?php echo $pedido['id_usuario']; ?></p>
            <p>Hora del pedido: <?php echo $pedido['hora']; ?></p>
            <button class="ver-detalle" data-idPedido="<?php echo $pedido['id']; ?>">Ver Detalles</button>


            <hr>
        <?php endif; ?>
    <?php endforeach; ?>



    <script src="https://unpkg.com/notie/dist/notie.min.js"></script>
    <script src="javascript/popupPedido.js"></script>
    <script src="javascript/filtroPedido.js"></script>

</body>

</html>