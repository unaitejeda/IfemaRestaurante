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
    <section class="seccionUbicación">
        <div class="container container4">
            <a href=<?=url.'?controller=producto'?>  style="text-decoration:none">
                <p class="pProductos subrayado">Inicio</p>
            </a> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
            </svg>
            <a href=<?=url.'?controller=producto&action=compra'?>  style="text-decoration:none">
                <p class="pProductos subrayado">Carrito</p>
            </a>
        </div>
    </section>
    <div class="w3-container w3-padding-32">
        <table id="costumers">
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>precio</th>
                <th>cantidad</th>
                <th>precio total</th>
            </tr>

            <?php
            $pos = 0;
            foreach($_SESSION['selecciones'] as $pedido){?>
            <tr>
                <td><?=$pedido->getProducto()->getId()?></td>
                <td><?=$pedido->getProducto()->getName()?></td>
                <td><?=$pedido->getProducto()->getPrecio()?> €</td>
                <td><?=$pedido->getCantidad()?></td>
                <td><?=$pedido->devuelvePrecio()?> €</td>



                <form action=<?=url.'?controller=producto&action=compra'?> method='post'>
                    <td><button class="bet-button w3-black w3-section" type="submit" name='Add' value=<?=$pos?>> + </button></td>
                    <td><button class="bet-button w3-black w3-section" type="submit" name='Del' value=<?=$pos?>> - </button></td>
                </form>
            </tr>
            <?php
            $pos++;
            }?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Precio Final</td>
                <td><?=$precioTotal?></td>
                <form action=<?=url.'?controller=producto&action=confirmar'?> method='post'>
                    <input type = "hidden" name="cantidadFinal" value=<?=$precioTotal?>>
                    <td><button class="bet-button w3-black w3-section" type="submit">Confirmar</button></td>
                </form>
                <td></td>
            </tr>
        </table>
    </div>
</body>