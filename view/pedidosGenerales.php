<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pedidos Generales</title>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
    <style>
        .column {
            float: left;
            width: 33.33%;
            padding: 10px;
            box-sizing: border-box;
        }

        .clear {
            clear: both;
        }
    </style>
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
    <h2>Pedidos Pendientes</h2>
    <div class="column pendiente">
        <?php if (!empty($pedidos)) : ?>
            <?php foreach ($pedidos as $pedido) : ?>
                <?php if ($pedido['estado'] == 'pendiente') : ?>
                    <?php
                        $gananciaRepartidor = $pedido['total'] * 0.20; // Supongamos que el repartidor gana un 20%
                    ?>
                    <div class="pedido" data-fecha="<?php echo $pedido['hora']; ?>" data-precio="<?php echo $pedido['total']; ?>">
                        <h3>Id del pedido: <?php echo $pedido['id']; ?></h3>
                        <p>Dia del pedido: <?php echo $pedido['hora']; ?></p>
                        <p>Ganancia del repartidor: <?php echo number_format($gananciaRepartidor, 2); ?></p>
                        <!-- Botones para ver detalles del pedido y para aceptar o rechazar -->
                        <button class="ver-detalle" data-idPedido="<?php echo $pedido['id']; ?>">Ver Detalles</button>

                        <form action="?controller=repartidor&action=aceptarPedido&id=<?php echo $pedido['id']; ?>" method="post">
                            <button type="submit">Aceptar</button>
                        </form>
                        <form action="?controller=repartidor&action=rechazarPedido&id=<?php echo $pedido['id']; ?>" method="post">
                            <button type="submit">Rechazar</button>
                        </form>
                        <hr>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No hay pedidos pendientes.</p>
        <?php endif; ?>
    </div>

    <div class="column">
        <h2>Mis Pedidos Aceptados</h2>
        <?php foreach ($pedidos as $pedido) : ?>
            <?php if ($pedido['estado'] == 'aceptado' && $pedido['repartidor'] == $_SESSION['repartidor_id']) : ?>
                <div class="pedido" data-fecha="<?php echo $pedido['hora']; ?>" data-precio="<?php echo $pedido['total']; ?>">
                    <h3>Id del pedido: <?php echo $pedido['id']; ?></h3>
                    <p>Dia del pedido: <?php echo $pedido['hora']; ?></p>
                    <p>Ganancia del repartidor: <?php echo number_format($gananciaRepartidor, 2); ?></p>
                    <button class="ver-detalle" data-idPedido="<?php echo $pedido['id']; ?>">Ver Detalles</button>
                    <hr>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="column">
        <h2>Pedidos Rechazados por Repartidores</h2>
        <?php if (!empty($pedidos)) : ?>
            <?php foreach ($pedidos as $pedido) : ?>
                <?php if ($pedido['estado'] == 'rechazado') : ?>
                    <div class="pedido" data-fecha="<?php echo $pedido['hora']; ?>" data-precio="<?php echo $pedido['total']; ?>">
                        <h3>Id del pedido: <?php echo $pedido['id']; ?></h3>
                        <p>Dia del pedido: <?php echo $pedido['hora']; ?></p>
                        <p>Total del pedido: <?php echo $pedido['total']; ?></p>
                        <p>Ganancia del repartidor: <?php echo number_format($gananciaRepartidor, 2); ?></p>
                        <button class="ver-detalle" data-idPedido="<?php echo $pedido['id']; ?>">Ver Detalles</button>
                    </div>
                    <hr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No hay pedidos rechazados.</p>
        <?php endif; ?>
    </div>

    

    <script src="https://unpkg.com/notie/dist/notie.min.js"></script>
    <script src="javascript/popupPedido.js"></script>
    <script src="javascript/filtroPedido.js"></script>
</body>

</html>
