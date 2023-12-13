<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poryecto IfemaRestaurante</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/full_estil.css">
</head>
<body>
    <!-- TITULO PAGINA -->
    <section class="seccionProducto">
        <div class="container"> 
            <h2 class="h2SeccionProducto" >¿Qué quieres comer en IFEMA RESTAURANTE? </h2>
        </div>
    </section>
    <!-- UBICACION -->
    <section class="seccionUbicación">
        <div class="container container4">
            <a href=<?=url.'?controller=producto'?>  style="text-decoration:none">
                <p class="pProductos subrayado">Inicio</p>
            </a> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
            </svg>
            <a href=<?=url.'?controller=producto&action=carta'?>  style="text-decoration:none">
                <p class="pProductos subrayado">Carta</p>
            </a>
        </div>
    </section>
    <!-- SUBMENU -->
    <section class="SubMenu">
        <div class="container">
            <p class="pContadorCarta"> <span><?=count($allProducts)?></span> Productos encontrados</p>
            <a href=<?=url.'?controller=producto&action=carta'?>><p class="botonSubMenu">Todos los productos</p></a>
            <a href=<?=url.'?controller=producto&action=carta&categoria=Menus'?>><p class="botonSubMenu">Menús</p></a>
            <a href=<?=url.'?controller=producto&action=carta&categoria=Platos'?>><p class="botonSubMenu">Platos</p></a>
            <a href=<?=url.'?controller=producto&action=carta&categoria=Bebidas'?>><p class="botonSubMenu">Bebidas</p></a>
            <a href=<?=url.'?controller=producto&action=carta&categoria=Postres'?>><p class="botonSubMenu">Postres</p></a>    
        </div>
    </section>
    <!-- PRODUCTOS -->
    <div class="seccionCarta">
        <div class="container container3">
            <div class="row ">
                <?php foreach($allProducts as $product) {?>
                    <article class="col-12 col-md-6 col-lg-3">
                        <div style="overflow: hidden;">
                            <!-- <div class="" > -->
                                <img class="imgProductos" src=<?=$product->getFoto()?>>
                            <!-- </div> -->
                            <div class="contenidoProductos">
                                <p class="nombreProducto"><?=$product->getName()?></p>
                                <p class="precioProducto"><?=$product->getPrecio()?> €</p>
                                <p class="categoriaProducto"><?=$product->getCategoria()?></p>
                                <form action=<?=url.'?controller=producto&action=selecciones&pagina=carta'?> method='post'>
                                    <input type = "hidden" name="id" value=<?=$product->getId()?>>
                                    <input type = "hidden" name="categoria" value=<?=$product->getCategoria()?>>
                                    <button class="botonAñadir" type="sumbit" name="add">Añadir al carrito</button>
                                </form>
                            </div>
                        </div>
                    </article>
                <?php }?>
            </div>   
        </div>
    </div>
</body>
</html>