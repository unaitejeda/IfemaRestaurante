<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto IfemaRestaurante</title>
</head>

<body>
    <section class="seccionUbicación">
        <div class="container container4">
            <a href=<?= url . '?controller=producto' ?> style="text-decoration:none">
                <p class="pProductos subrayado">Inicio</p>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
            </svg>
            <a href=<?= url . '?controller=producto&action=compra' ?> style="text-decoration:none">
                <p class="pProductos subrayado">Carrito</p>
            </a>
        </div>
    </section>
    <!-- SUBMENU -->
    <section class="SubMenu">
        <div class="container">
            <p class="pContadorCarrito"> <span><?= count($_SESSION['selecciones']) ?></span> Productos encontrados</p>
        </div>
    </section>

    <section class="carrito">
        <div class="container containerCarrito">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-9">
                    <?php
                    $pos = 0;
                    foreach ($_SESSION['selecciones'] as $pedido) {
                    ?>
                        <article class="productosCarrito d-flex">
                            <img class="imgProductosCarrito" alt="productos" src=<?= $pedido->getProducto()->getFoto() ?>>
                            <div class="contenidoCarrito" style="width: 300px">
                                <p class="pMargenCarrito p1Carrito pCarrito"><?= $pedido->getProducto()->getName() ?></p>
                                <p class="pMargenCarrito p2Carrito pCarrito"><?= $pedido->getProducto()->getPrecio() ?> €</p>
                                <p class="pMargenCarrito p3Carrito pCarrito"><?= $pedido->getProducto()->getCategoria() ?></p>
                            </div>
                            <div class="d-flex align-items-center justify-content-end botonesCantidad">
                                <form class="pCarrito formCarrito " action=<?= url . '?controller=producto&action=compra' ?> method='post' style="display: inline-flex; ">
                                    <button class="botonMas" type="submit" name='Add' value=<?= $pos ?>> + </button>
                                    <p class="text-center pCantidad"><?= $pedido->getCantidad() ?></p>
                                    <button class="botonMenos" type="submit" name='Del' value=<?= $pos ?>> - </button>
                                </form>
                            </div>
                        </article>
                    <?php
                        $pos++;
                    } ?>
                </div>
                <div class="col-12 col-md-2 col-lg-3">
                    <article class="finalizarCompra">
                        <div id="mostrarPuntos"></div>
                        <p class="pCarrito p4Carrito">PRODUCTOS</p>
                        <?php
                        $pos = 0;
                        foreach ($_SESSION['selecciones'] as $pedido) {
                        ?>
                            <p class="pCarrito p5Carrito"><?= $pedido->getCantidad() ?> x <?= $pedido->getProducto()->getName() ?> - <?= $pedido->devuelvePrecio() ?> €</p>
                        <?php
                            $pos++;
                        } ?>
                        <p class="pCarrito p4Carrito" id="precioSinActualizar">SUBTOTAL: <?= $precioTotal ?> €</p>




                        <form id="qr" action="<?= url . '?controller=producto&action=confirmar' ?>" method="post">
                            <input type="hidden" id="id_usuario" name="id_usuario" value="<?= $id_usuario ?>"><br>
                            <input type="hidden" name="cantidadFinal" value=<?= $precioTotal ?>>

                            <div id="descuentoSection">
                                <label for="cantidadPropina">Porcentaje de propina:</label>
                                <input type="number" id="cantidadPropina" name="cantidadPropina" min="0" max="100" value="3">
                            </div>

                            <label for="usarPuntos">Utilizar puntos</label>
                            <input type="checkbox" id="usarPuntos" name="usarPuntos"><br>

                            <input class="botonFinalizaCompra" id="botonConfirmar" type="submit" value="Confirmar">

                            <div>
                                <?php
                                $puntosGanados = UsuarioDAO::calcularPuntosAcumulados($precioTotal, $_SESSION['id']);
                                ?>
                                <p>Acumulados: <?= $puntosGanados ?></p>
                            </div>

                        </form>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <script src="javascript/pedido.js"></script>
    <script src="javascript/qr.js"></script>
    <script src="javascript/qrcode.min.js"></script>
</body>

</html>