<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
  <style>
    /* override styles here */
    .notie-container {
      box-shadow: none;
    }
  </style>
</head>

<body>
  <form id="comentarioForm">
    <?php if ($resultado !== null) : ?>
      <div class="pedido row">
        <p>
          Pedido ID: <?= $resultado['id'] ?><br>
          FECHA: <?= $resultado['hora'] ?><br>
          ID CLIENTE: <?= $resultado['id_usuario'] ?><br>
          ID PLATO: <?= $resultado['id_producto'] ?><br>
          TOTAL: <?= $resultado['total'] ?> €<br>
          PUNTOS: <?= $resultado['puntos'] ?><br>
          Propina aplicada: <?= $resultado['propina'] ?> %


        </p>
      </div>
    <?php else : ?>
      <p>No se encontró información del pedido.</p>
    <?php endif; ?>
  </form>

  <script src="javascript/qr.js"></script>
</body>

</html>