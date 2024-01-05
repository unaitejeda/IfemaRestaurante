<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ifema Restaurante</title>
    <meta charset="UTF-8">
    <meta name="title" content="Ifema Restaurante">
    <meta name="description" content="Pagina Web del restaurante de IFEMA">
</head>

<body>
    <main>
        <!-- CARRUSEL -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <div class="slidePrincipal" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(41, 33, 82, 1)) ,url(assets/images/3007283.jpg);">
                        <div class="container divContenidoCarousel">
                            <h1>IFEMA RESTAURANTE</h1>
                            <p class="pCarrousel">¿Qué te apetece comer hoy?</p>
                            <a href="<?= url . '?controller=producto&action=carta' ?>">
                                <button class="botonCartaCarousel" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(230, 65, 0, 1));">Carta</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item active" data-bs-interval="3000">
                    <div class="slidePrincipal" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(41, 33, 82, 1)) ,url(assets/images/pasteles.jpg);">
                        <div class="container divContenidoCarousel">
                            <h1>IFEMA RESTAURANTE</h1>
                            <p class="pCarrousel">Te gusta el dulce? Por que a nosotros si</p>
                            <a href="<?= url . '?controller=producto&action=carta&categoria=Postres' ?>">
                                <button class="botonCartaCarousel" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(230, 65, 0, 1));">Postres</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item active" data-bs-interval="3000">
                    <div class="slidePrincipal" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(41, 33, 82, 1)) ,url(assets/images/fotografia-gastronomica-1.jpg);">
                        <div class="container divContenidoCarousel">
                            <h1>IFEMA RESTAURANTE</h1>
                            <p class="pCarrousel">Únete a nuestra família</p>
                            <a href="<?= url . '?controller=producto&action=login' ?>">
                                <button class="botonCartaCarousel" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(230, 65, 0, 1));">Login</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECCION 1 -->
        <section class="section1">
            <div class="container container1">
                <p class="pSeccion1 text-center">SIENTE EL SABOR EN TU PALADAR</p>
                <h2 class="text-center">¿Qué quieres comer en IFEMA RESTAURANTE? </h2>
            </div>
        </section>

        <!-- SECCION 2 -->
        <section class="section2">
            <div class="container container2">
                <div class="row">
                    <div class="col-sm-6 col-xxl-3 div-botonesProductos ">
                        <a href="<?= url . '?controller=producto&action=carta&categoria=Menus' ?>" style="overflow: hidden;">
                            <div class="mb-4 mb-lg-0  mx-2 mx-lg-0 div-botonesProductos-hover">
                                <div class="divContenidoBotonesProductos1" style="float: left; width: 70%;">
                                    <div class="imagenesSeccionesProductos1"></div>
                                    <p class="pSeccion2">Menus a la carta</p>
                                </div>
                                <div class="divContenidoBotonesProductos2" style="float: right; width: 30%;">
                                    <img src="assets/images/ICONOS/SECCION1/flecha-correcta.png" alt="productosMenus" class="imagenesSeccionesFlecha">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xxl-3 div-botonesProductos">
                        <a href="<?= url . '?controller=producto&action=carta&categoria=Platos' ?>" style="overflow: hidden;">
                            <div class="mb-4 mb-lg-0  mx-2 mx-lg-0 div-botonesProductos-hover">
                                <div class="divContenidoBotonesProductos1" style="float: left; width: 70%;">
                                    <div class="imagenesSeccionesProductos2"></div>
                                    <p class="pSeccion2">Platos únicos a escoger</p>
                                </div>
                                <div class="divContenidoBotonesProductos2" style="float: right; width: 30%;">
                                    <img src="assets/images/ICONOS/SECCION1/flecha-correcta.png" alt="productosPlatos" class="imagenesSeccionesFlecha">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xxl-3 div-botonesProductos">
                        <a href="<?= url . '?controller=producto&action=carta&categoria=Bebidas' ?>" style="overflow: hidden;">
                            <div class="mb-4 mb-lg-0  mx-2 mx-lg-0 div-botonesProductos-hover">
                                <div class="divContenidoBotonesProductos1" style="float: left; width: 70%;">
                                    <div class="imagenesSeccionesProductos3"></div>
                                    <p class="pSeccion2">Bebidas de todo tipo</p>
                                </div>
                                <div class="divContenidoBotonesProductos2" style="float: right; width: 30%;">
                                    <img src="assets/images/ICONOS/SECCION1/flecha-correcta.png" alt="productosBebidas" class="imagenesSeccionesFlecha">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xxl-3 div-botonesProductos">
                        <a href="<?= url . '?controller=producto&action=carta&categoria=Postres' ?>" style="overflow: hidden;">
                            <div class="mb-4 mb-lg-0  mx-2 mx-lg-0 div-botonesProductos-hover">
                                <div class="divContenidoBotonesProductos1" style="float: left; width: 70%;">
                                    <div class="imagenesSeccionesProductos4"></div>
                                    <p class="pSeccion2">Postres a tu gusto</p>
                                </div>
                                <div class="divContenidoBotonesProductos2" style="float: right; width: 30%;">
                                    <img src="assets/images/ICONOS/SECCION1/flecha-correcta.png" alt="productosPostres" class="imagenesSeccionesFlecha">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCION 3 -->
        <section class="section2">
            <div class="seccionCarta">
                <div class="container container3">
                    <h2 class="h2ContenidoSeccion3">Los menús del día</h2>
                    <div class="row ">
                        <?php foreach ($allProducts as $product) { ?>
                            <article class="col-12 col-md-6 col-lg-3 ">
                                <div class="mx-16 mb-12 mb-lg-0 mx-6 mx-lg-0" style="overflow: hidden;">
                                    <img class="imgProductos" src=<?= $product->getFoto() ?> alt="Producto">
                                    <div class="contenidoProductos">
                                        <p class="nombreProducto"><?= $product->getName() ?></p>
                                        <p class="precioProducto"><?= $product->getPrecio() ?> €</p>
                                        <p class="categoriaProducto"><?= $product->getCategoria() ?></p>
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
        </section>

        <!-- SECCION 4 -->
        <section class="section4">
            <div class="container">
                <div class="row">
                    <div class=" col-xxl-6" style="padding-right:0px;  ">
                        <div class="divContenidoSeccion4" >
                            <h2 class="h2Seccion4">Descubre quienes somos en IFEMA RESTAURANTE</h2>
                            <p class="pSeccion4">En IFEMA Restaurante, nuestra pasión es ofrecer experiencias culinarias excepcionales a nuestros clientes. Nuestra cocina es una mexcla de creatividad y tradición, donde los ingredientes frescos y locales son la base de cada plato que servimos! Gracias por confiar en nosotros y esmepremos ofreceles la mejro experiencia.</p>
                            <button class="botonDescubrenos" style="background-image: linear-gradient( rgba(230, 65, 0, 1),rgba(255, 255, 255, 0));">Descubre más de nosotros</button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xxl-6" style="padding-left: 0px; ">
                        <div class="imgSeccion3"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>