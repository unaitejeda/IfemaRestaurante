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
            <td><?=$pedido->getProducto()->getPrecio()?></td>
            <td><?=$pedido->getCantidad()?></td>
            <td><?=$pedido->devuelvePrecio()?></td>


            <form action=<?url.'?controller=producto&action=compra'?> method="post">
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
            <td><?=CalculadoraPrecios::calculadorPrecioPedido($_SESSION['selecciones'])?></td>
            <form action=<?=url.'?controller=producto&action=confirmar'?> method='post'>
                <td><button class="bet-button w3-black w3-section" type="submit">Confirmar</button></td>
            </form>
            <td></td>
        </tr>
    </table>
</div>