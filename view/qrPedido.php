<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle del Pedido</title>
</head>
<body>
  <?php if ($resultado !== null) : ?>
    <div class="pedido row">
      <p>
        Pedido ID: <?= $resultado['id'] ?><br>
        Fecha: <?= $resultado['hora'] ?><br>
        ID Cliente: <?= $resultado['id_usuario'] ?><br>
        ID Plato: <?= $resultado['id_producto'] ?><br>
        Total: <?= $resultado['total'] ?> €<br>
        Puntos: <?= isset($resultado['puntos']) ? $resultado['puntos'] : 'N/A' ?><br>
        Propina aplicada: <?= isset($resultado['propina']) ? $resultado['propina'] . '%' : 'N/A' ?>
      </p>
    </div>
  <?php else : ?>
    <p>No se encontró información del pedido.</p>
  <?php endif; ?>

  <script src="javascript/qr.js"></script>

</body>
</html>


