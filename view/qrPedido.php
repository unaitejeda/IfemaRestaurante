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
    <div class="pedido row">

      <h1 class="h1Pedido">Detalle del pedido</h1>
      <p>Pedido ID: <?= $primerPedidoID ?></p>

      <p>Fecha: <?= $primerPedidoFecha ?></p>
      <p>Nombre Usuario: <?= $nombreUsuario?></p>
      <?php foreach ($productos as $resultado) {
      ?>
        <h5>Producto</h5>
        <p>

          ID Plato: <?= $resultado->getProducto()->getId() ?><br>
          Nombre Plato: <?= $resultado->getProducto()->getName() ?><br>
          Precio Plato: <?= $resultado->getProducto()->getPrecio() ?><br>
        </p>

      <?php } ?>

      <p>Total: <?= $resultado->getTotal() ?> €</p>
      <p>Propina aplicada: <?= $resultado->getPropina() ?> %</p>
    </div>
  </section>


  <script src="javascript/qr.js"></script>

</body>

</html>