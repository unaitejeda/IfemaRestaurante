<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle del Pedido</title>
</head>

<body>
  <!--  SECCION GRACIAS -->
  <section class="seccionProducto">
        <div class="container">
            <h3 class="h2SeccionQR">GRACIAS POR SU COMPRA ! :)</h3>
        </div>
    </section>
  <section class="containerPedido">
    <?php if ($resultado !== null) : ?>
      <div class="pedido row">
        <h1 class="h1Pedido">Detalle del pedido</h1>
        <p>
          Pedido ID: <?= $resultado['id'] ?><br>
          Fecha: <?= $resultado['hora'] ?><br>
          ID Cliente: <?= $resultado['id_usuario'] ?><br>
          ID Plato: <?= $resultado['id_producto'] ?><br>
          Total: <?= $resultado['total'] ?> €<br>
          Puntos: <?= $resultado['puntos'] ?><br>
          Propina aplicada: <?= isset($resultado['propina']) ? $resultado['propina'] . '%' : 'N/A' ?>
        </p>
      </div>
    <?php else : ?>
      <p>No se encontró información del pedido.</p>
    <?php endif; ?>
  </section>


  <script src="javascript/qr.js"></script>

</body>

</html>