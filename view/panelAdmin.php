<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- UBICACION -->
    <section class="seccionUbicación">
        <div class="container container4">
            <a href="<?= url . '?controller=producto' ?>" style="text-decoration:none">
                <p class="pProductos subrayado">Inicio</p>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
            </svg>
            <a href="<?= url . '?controller=producto&action=panelAdmin' ?>" style="text-decoration:none">
                <p class="pProductos subrayado">Panel Administrador</p>
            </a>
        </div>
    </section>
    <!-- PRODUCTOS -->
    <section class="section2">
        <div class="seccionCarta">
            <div class="container container3">
                <h2 class="h2ContenidoSeccion3">Panel Administrador</h2>
                <div class="row ">
                    <?php foreach ($allProducts as $product) { ?>
                        <article class="col-12 col-md-6 col-lg-3">
                            <div class="mx-16 mb-12 mb-lg-0 mx-6 mx-lg-0 producto" style="overflow: hidden;">
                                <img class="imgProductos" src=<?= $product->getFoto() ?>>
                                <div class="contenidoProductos">
                                    <p class="nombreProducto"><?= $product->getName() ?></p>
                                    <p class="precioProducto"><?= $product->getPrecio() ?> €</p>
                                    <p class="categoriaProducto"><?= $product->getCategoria() ?></p>
                                    <form action="<?= url . '?controller=producto&action=edit' ?>" method='post' style='margin-bottom: 5px;'>
                                        <input type="hidden" name="id" value=<?= $product->getId() ?>>
                                        <input type="hidden" name="categoria" value=<?= $product->getCategoria() ?>>
                                        <button class="botonAñadir" type="sumbit" name="add">Editra Producto</button>
                                    </form>
                                    <form action="<?= url . '?controller=producto&action=eliminar' ?>" method='post'>
                                        <input type="hidden" name="id" value=<?= $product->getId() ?>>
                                        <input type="hidden" name="categoria" value=<?= $product->getCategoria() ?>>
                                        <button class="botonAñadir" type="sumbit" name="add">Eliminar Producto</button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    <?php } ?>
                </div>
                <div class="row">
                    <article class="col-12">
                        <div class="text-center">
                            <form action="<?= "?controller=producto&action=crear" ?>" method="post" enctype="multipart/form-data">
                                <input class="inputCrear" type="text" name="nombre" placeholder="Nombre">
                                <input class="inputCrear" type="float" name="precio" placeholder="Precio">
                                <select class="inputCrear" name="categoria">
                                    <option value="Menus">Menus</option>
                                    <option value="Platos">Platos</option>
                                    <option value="Postres">Postres</option>
                                    <option value="Bebidas">Bebidas</option>
                                </select>
                                <input class="inputCrear" type="file" name="foto">
                                <button class="botonCrear" type="sumbit" name="crear">Crear</button>
                            </form>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</body>

</html>