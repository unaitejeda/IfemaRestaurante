<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poryecto IfemaRestaurante</title>
</head>

<body>
    <!-- TITULO PAGINA -->
    <section class="seccionProducto">
        <div class="container">
            <h2 class="h2SeccionProducto">¿Qué quieres comer en IFEMA RESTAURANTE? </h2>
        </div>
    </section>
    <!-- UBICACION -->
    <section class="seccionUbicación">
        <div class="container container4">
            <a href=<?= url . '?controller=producto' ?> style="text-decoration:none">
                <p class="pProductos subrayado">Inicio</p>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
            </svg>
            <a href=<?= url . '?controller=producto&action=carta' ?> style="text-decoration:none">
                <p class="pProductos subrayado">Carta</p>
            </a>
        </div>
    </section>
    <!-- SUBMENU -->
    <section class="SubMenu">
        <div class="container">
            <p class="pContadorCarta"> <span><?= count($allProducts) ?></span> Productos encontrados</p>
            <a href=<?= url . '?controller=producto&action=carta' ?> style="text-decoration:none">
                <p class="botonSubMenu">Todos los productos</p>
            </a>
            <a href=<?= url . '?controller=producto&action=carta&categoria=Menus' ?> style="text-decoration:none">
                <p class="botonSubMenu">Menús</p>
            </a>
            <a href=<?= url . '?controller=producto&action=carta&categoria=Platos' ?> style="text-decoration:none">
                <p class="botonSubMenu">Platos</p>
            </a>
            <a href=<?= url . '?controller=producto&action=carta&categoria=Bebidas' ?> style="text-decoration:none">
                <p class="botonSubMenu">Bebidas</p>
            </a>
            <a href=<?= url . '?controller=producto&action=carta&categoria=Postres' ?> style="text-decoration:none">
                <p class="botonSubMenu">Postres</p>
            </a>
        </div>
    </section>
    <!-- PRODUCTOS -->
    <div class="seccionCarta">
        <div class="container container3">
            <div class="row ">
                <?php foreach ($allProducts as $product) { 
                    $clase = $product->getCategoria();
                    ?>
                    <article class="col-12 col-md-6 col-lg-3 <?php echo $clase ?>">
                        <div class="mx-16 mb-12 mb-lg-0 mx-6 mx-lg-0">
                            <img class="imgProductos" src=<?= $product->getFoto() ?>  alt="Producto">
                            <div class="contenidoProductos">
                                <p class="nombreProducto"><?= $product->getName() ?></p>
                                <p class="precioProducto"><?= $product->getPrecio() ?> €</p>
                                <p class="categoriaProducto"><?= $product->getCategoria() ?><?php if ($product instanceof Bebidas) : ?>
                                    <?php if ($product->getMayor()) : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="biMayor1" viewBox="0 0 16 16">
                                            <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="biMayor8" viewBox="0 0 16 16">
                                            <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-5.03 1.803c0 1.394-1.218 2.355-2.988 2.355-1.763 0-2.953-.955-2.953-2.344 0-1.271.95-1.851 1.647-2.003v-.065c-.621-.193-1.33-.738-1.33-1.781 0-1.225 1.09-2.121 2.66-2.121s2.654.896 2.654 2.12c0 1.061-.738 1.595-1.336 1.782v.065c.703.152 1.647.744 1.647 1.992Zm-4.347-3.71c0 .739.586 1.255 1.383 1.255s1.377-.516 1.377-1.254c0-.733-.58-1.23-1.377-1.23s-1.383.497-1.383 1.23Zm-.281 3.645c0 .838.72 1.412 1.664 1.412.943 0 1.658-.574 1.658-1.412 0-.843-.715-1.424-1.658-1.424-.944 0-1.664.58-1.664 1.424" />
                                        </svg>
                                    <?php endif; ?>
                                <?php endif; ?>
                                </p>

                                <form action=<?= url . '?controller=producto&action=selecciones&pagina=carta' ?> method='post'>
                                    <input type="hidden" name="id" value=<?= $product->getId() ?>>
                                    <input type="hidden" name="categoria" value=<?= $product->getCategoria() ?>>
                                    <button class="botonAñadir" type="sumbit" name="add">Añadir al carrito</button>
                                </form>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>