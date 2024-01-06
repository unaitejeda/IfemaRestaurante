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
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
            </svg>
            <a href="<?= url . '?controller=producto&action=panelAdmin' ?>" style="text-decoration:none">
                <p class="pProductos subrayado">Edición</p>
            </a>
        </div>
    </section>
    <section class="section2">
        <div class="seccionCarta">
            <div class="container container3">
                <h2 class="h2PanelAdmin text-center">Editar Producto</h2>
                <div class="row">
                    <article class="col-12">
                        <div class="text-center">
                            <form action="<?= url . "?controller=producto&action=editProduct" ?>" method="post" enctype="multipart/form-data">
                                <input class="inputCrear" type="hidden" name="id" value="<?= $product->getId() ?>">
                                <input class="inputCrear" name="nombre" value="<?= $product->getName() ?>">
                                <input class="inputCrear" name="precio" value="<?= $product->getPrecio() ?>">
                                <input class="inputCrear" type="hidden" name="categoria" value="<?= $product->getcategoria() ?>">
                                <input class="inputCrear" type="file" name="foto" value="<?= $product->getFoto() ?>">
                                <button class="botonCrear" type="sumbit" name="edit">Editar</button>
                            </form>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</body>

</html>