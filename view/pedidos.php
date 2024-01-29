<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/full_estil.css">
    <title>Pedidos</title>
</head>

<body>

    <?php
    // Supongo que $resultado contiene los pedidos obtenidos
    if (is_array($resultado) && count($resultado) > 0) {
        foreach ($resultado as $pedido) {
    ?>
            <div>
                <h3>Pedido ID: <?php echo $pedido['id']; ?></h3>
                <p>Producto: <?php echo $pedido['hora']; ?></p>
                <p>Cantidad: <?php echo $pedido['total']; ?></p>

                <!-- Botón para ir al formulario de reseñas -->
                <form action="?controller=reseñas&action=crearReseña" method="post">
                    <input type="hidden" name="pedido_id" value="<?php echo $pedido['id']; ?>">
                    <button type="submit" class="boton-resenya" data-pedido-id="<?php echo $pedido['id']; ?>">Dejar Reseña</button>
                </form>

                <!-- Otros detalles del pedido que desees mostrar -->
            </div>
    <?php
        }
    } else {
        echo '<p>No hay pedidos disponibles.</p>';
    }
    ?>
    
    <script src="javascript/resenya.js"></script>
    <script src="javascript/botonResenya.js"></script>
</body>

</html>
