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
        <input type="text" id="id_usuario" name="id_usuario" value="<?= $_SESSION['id'] ?>" hidden><br>

        <input type="text" id="id_pedido" value="<?= $id_pedido ?>" hidden><br>

        <label for="resenya">Resenya:</label><br>
        <input type="text" id="resenya" name="resenya" maxlength="255"><br>
        <label for="valoracion">Valoración:</label><br>
        <input type="number" id="valoracion" name="valoracion" min="1" max="5"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <script src="https://unpkg.com/notie"></script>
    <script src="javascript/crearResenya.js"></script>
</body>

</html>