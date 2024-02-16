<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/pedidos_estilos.css">
    <title>Pedidos</title>
</head>

<body>
 <!-- TITULO PAGINA -->
 <section class="seccionProducto">
        <div class="container">
            <h3 class="h2SeccionQR">MIS PEDIDOS</h3>
        </div>
    </section>
    <div id="pedidos-container">
        <?php
        if (is_array($resultado) && count($resultado) > 0) {
            foreach ($resultado as $pedido) {
                $reseña_hecha = isset($pedido['reseña_hecha']) ? $pedido['reseña_hecha'] : false;
        ?>
                <div class="pedido-container">
                    <h3>Pedido ID: <?php echo $pedido['id']; ?></h3>
                    <p>Producto: <?php echo $pedido['hora']; ?></p>
                    <p>Cantidad: <?php echo $pedido['total']; ?></p>

                    <!-- Botón para ir al formulario de reseñas -->
                    <form action="?controller=reseñas&action=crearReseña" method="post">
                        <input type="hidden" name="pedido_id" value="<?php echo $pedido['id']; ?>">
                        <?php
                            $disabled = ($reseña_hecha) ? 'disabled' : '';
                        ?>
                        <button type="submit" class="boton-resenya" data-pedido-id="<?php echo $pedido['id']; ?>" <?php echo $disabled; ?>>Dejar Reseña</button>
                    </form>

                </div>
        <?php
            }
        } else {
            echo '<p>No hay pedidos disponibles.</p>';
        }
        ?>
    </div>

    <script src="javascript/resenya.js"></script>
    <script src="javascript/botonResenya.js"></script>
</body>

</html>


