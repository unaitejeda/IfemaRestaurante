<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- PRODUCTOS -->
    <section class="section2">
        <div class="seccionCarta">
            <div class="container container3">
                <h2 class="h2ContenidoSeccion3">Los menús del día</h2>
                <div class="row ">
                    <?php foreach ($allProducts as $product) { ?>
                        <article class="col-12 col-md-6 col-lg-3 ">
                            <div class="producto" style="overflow: hidden;">
                                <img class="imgProductos" src=<?= $product->getFoto() ?>>
                                <div class="contenidoProductos">
                                    <p class="nombreProducto"><?= $product->getName() ?></p>
                                    <p class="precioProducto"><?= $product->getPrecio() ?> €</p>
                                    <p class="categoriaProducto"><?= $product->getCategoria() ?></p>
                                    <form action=<?= url . '?controller=producto&action=edit' ?> method='post' style='margin-bottom: 5px;'>
                                        <input type="hidden" name="id" value=<?= $product->getId() ?>>
                                        <input type="hidden" name="categoria" value=<?= $product->getCategoria() ?>>
                                        <button class="botonAñadir" type="sumbit" name="add">Editra Producto</button>
                                    </form>
                                    <form action=<?= url . '?controller=producto&action=eliminar' ?> method='post'>
                                        <input type="hidden" name="id" value=<?= $product->getId() ?>>
                                        <input type="hidden" name="categoria" value=<?= $product->getCategoria() ?>>
                                        <button class="botonAñadir" type="sumbit" name="add">Eliminar Producto</button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>