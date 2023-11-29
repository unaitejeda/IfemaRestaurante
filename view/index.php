<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ifema Restaurante</title>    
    <meta charset="UTF-8">
    <meta name="title" content="Ifema Restaurante">
    <meta name="description" content="Pagina Web del restaurante de IFEMA">    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
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
              <div class="carousel-item active" data-bs-interval="10">
                <div class="slidePrincipal" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(41, 33, 82, 1)) ,url(assets/images/3007283.jpg);">
                    <div class="container divContenidoCarousel">
                        <h1>IFEMA RESTAURANTE</h1>
                        <p class="pCarrousel">¿Qué te apetece comer hoy?</p>
                        <a href=<?=url.'?controller=producto&action=carta'?>>
                            <button class="botonCartaCarousel" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(230, 65, 0, 1));">Carta</button>
                        </a>
                    </div>
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="300">
                <!-- <img src="assets/images/pasteles.jpg" class="d-block w-100" alt="..."> -->
                <div class="slidePrincipal" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(41, 33, 82, 1)) ,url(assets/images/cocinero-de-tienda-de-alimentos.jpg);"></div>
              </div>
              <div class="carousel-item" data-bs-interval="300">
                <!-- <img src="assets/images/cocinero-de-tienda-de-alimentos.jpg" class="d-block w-100" alt="..."> -->
                <div class="slidePrincipal" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(41, 33, 82, 1)) ,url(assets/images/3007283s.jpg);"></div>
              </div>
            </div>
        </div>

        <!-- SECCION 1 -->
        <section class="section1">
            <div class="container container1"> 
                <p class="pSeccion1 text-center" >SIENTE EL SABOR EN TU PALADAR</p>
                <h2 class="text-center" >¿Qué quieres comer en IFEMA RESTAURANTE? </h2>
            </div>
        </section>

        <!-- SECCION 2 -->
        <section class="section2">
            <div class="container container2">
                <div class="row">
                    <div class="col-sm-6 col-xxl-3 div-botonesProductos ">
                        <a href=<?=url.'?controller=producto&action=carta&categoria=Menus'?> style="overflow: hidden;">
                            <div class="div-botonesProductos-hover">
                                <div class="divContenidoBotonesProductos1" style="float: left; width: 70%;">
                                    <div class="imagenesSeccionesProductos1"></div>
                                    <!-- <img src="assets/images/ICONOS/SECCION 1/menu.png" alt="productos menus" class="imagenesSeccionesProductos1"> -->
                                    <p class="pSeccion2">Menus a la carta</p>
                                </div>
                                <div class="divContenidoBotonesProductos2" style="float: right; width: 30%;">
                                    <img src="assets/images/ICONOS/SECCION1/flecha-correcta.png" alt="productos menus" class="imagenesSeccionesFlecha">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xxl-3 div-botonesProductos">
                        <a href=<?=url.'?controller=producto&action=carta&categoria=Platos'?> style="overflow: hidden;">
                            <div class="div-botonesProductos-hover">
                                <div class="divContenidoBotonesProductos1" style="float: left; width: 70%;">
                                    <div class="imagenesSeccionesProductos2"></div>
                                    <!-- <img src="assets/images/ICONOS/SECCION 1/feijoada.png" alt="productos menus" class="imagenesSeccionesProductos2"> -->
                                    <p class="pSeccion2">Platos únicos a escoger</p>
                                </div>
                                <div class="divContenidoBotonesProductos2" style="float: right; width: 30%;">
                                    <img src="assets/images/ICONOS/SECCION1/flecha-correcta.png" alt="productos menus" class="imagenesSeccionesFlecha">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xxl-3 div-botonesProductos">
                        <a href=<?=url.'?controller=producto&action=carta&categoria=Bebidas'?> style="overflow: hidden;">
                            <div class="div-botonesProductos-hover">
                                <div class="divContenidoBotonesProductos1" style="float: left; width: 70%;">
                                    <div class="imagenesSeccionesProductos3"></div>
                                    <!-- <img src="assets/images/ICONOS/SECCION 1/jugo.png" alt="productos menus" class="imagenesSeccionesProductos3"> -->
                                    <p class="pSeccion2">Bebidas de todo tipo</p>
                                </div>
                                <div class="divContenidoBotonesProductos2" style="float: right; width: 30%;">
                                    <img src="assets/images/ICONOS/SECCION1/flecha-correcta.png" alt="productos menus" class="imagenesSeccionesFlecha">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xxl-3 div-botonesProductos">
                        <a href=<?=url.'?controller=producto&action=carta&categoria=Postres'?> style="overflow: hidden;">
                            <div class="div-botonesProductos-hover">
                                <div class="divContenidoBotonesProductos1" style="float: left; width: 70%;">
                                    <div class="imagenesSeccionesProductos4"></div>
                                    <!-- <img src="assets/images/ICONOS/SECCION 1/pastel.png" alt="productos menus" class="imagenesSeccionesProductos4"> -->
                                    <p class="pSeccion2">Postres a tu gusto</p>
                                </div>
                                <div class="divContenidoBotonesProductos2" style="float: right; width: 30%;">
                                    <img src="assets/images/ICONOS/SECCION1/flecha-correcta.png" alt="productos menus" class="imagenesSeccionesFlecha">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCION 3 -->
        <section class="section2">
            <div class="container container2">
                <div class="row">
                    <div class="col-sm-6 col-xxl-3 div-botonesProductos ">
                        <a href="#" style="overflow: hidden;">
                            <div class="div-botonesProductos-hover">
                                <div">
                                    <img src="" alt="productos menus" class="">
                                </div>
                                <div>
                                    <div></div>
                                    <p class="pSeccion2">Menus a la carta</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCION 4 -->
        <section class="section4">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 col-xxl-6 dviContenidoSeccion4">
                        <img src="" alt="">
                        <p class="pSeccion4"><i class="bi bi-twitter"></i>En IFEMA Restaurante, nuestra pasión es ofrecer experiencias culinarias excepcionales a nuestros clientes. Nuestra cocina es una mexcla de creatividad y tradición, donde los ingredientes frescos y locales son la base de cada plato que servimos! Gracias por confiar en nosotros y esmepremos ofreceles la mejro experiencia.</p>
                        <button class="botonDescubrenos" style="background-image: linear-gradient( rgba(230, 65, 0, 1),rgba(255, 255, 255, 0));">Descubre más de nosotros</button>
                        
                    </div>
                    <div class="col-sm-12 col-xxl-6 imgSeccion3"></div>
                </div>
            </div>
        </section>
    </main>
</body>
<!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->
</html>