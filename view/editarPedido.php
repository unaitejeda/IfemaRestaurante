<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?=url."?controller=producto&action=editProduct"?>" method="post">
        <input type="hidden" name="id" value="<?= $product->getId() ?>">
        <input name="nombre" value="<?= $product->getName() ?>">
        <input name="precio" value="<?= $product->getPrecio() ?>">
        <input type="hidden" name="categoria" value="<?= $product->getcategoria() ?>">
        <input name="foto" value="<?= $product->getFoto() ?>">
        <button class="bet-button w3-black w3-section" type="sumbit" name="edit">Editar</button>
    </form>
</body>

</html>