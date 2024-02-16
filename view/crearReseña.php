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
  <section class="section2">
    <div class="seccionCarta">
      <div class="container container3">
        <h2 class="h2PanelAdmin text-center">Escribe Tu Reseña</h2>
        <div class="row">
          <article class="col-12">
            <div class="text-center">
              <form id="comentarioForm">
                <input type="text" id="id_usuario" name="id_usuario" value="<?= $_SESSION['id'] ?>" hidden><br>

                <input type="text" id="id_pedido" value="<?= $id_pedido ?>" hidden><br>

                <label class="nombreProducto" for="resenya">Resenya:</label><br>
                <input class="inputCrear" type="text" id="resenya" name="resenya" maxlength="255"><br>
                <label class="nombreProducto" for="valoracion">Valoración:</label><br>
                <input class="inputCrear" type="number" id="valoracion" name="valoracion" min="1" max="5"><br><br>
                <input class="botonCrear" type="submit" value="Enviar">
              </form>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
  <script src="https://unpkg.com/notie"></script>
  <script src="javascript/crearResenya.js"></script>
</body>

</html>