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
            echo '<div>';
            echo '<h3>Pedido ID: ' . $pedido['id'] . '</h3>';
            echo '<p>Producto: ' . $pedido['hora'] . '</p>';
            echo '<p>Cantidad: ' . $pedido['total'] . '</p>';

            // Botón para ir al formulario de reseñas
            echo '<a>';
            echo '<form>';
            echo '<input type="hidden" name="pedido_id" value="' . $pedido['id'] . '">';
            echo '<button type="submit">Dejar Reseña</button>';
            echo '</form>';
            echo '</a>';
            // Otros detalles del pedido que desees mostrar
            echo '</div>';
        }
    } else {
        echo '<p>No hay pedidos disponibles.</p>';
    }
    ?>
</body>

</html>