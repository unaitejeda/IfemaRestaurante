<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poryecto IfemaRestaurante</title>
</head>
<body>
<div>
    <table id='products'>
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Tipo</td>
        </tr>
        <?php
        foreach($allProducts as $product) {
            //contar cuantos productos tiene esta categoria
            ?>
            
            <tr>
                <td><?=$product->getId()?></td>
                <p><?=$product->getName()?></p>
                <td><?=$product->getPrecio()?></td>
                <td><?=$product->getCategoria()?></td>
                <td><?=$product->getFoto()?></td>

                <!-- Añadimos botones por fila -->
                <td>
                    <form action=<?=url.'?controller=producto&action=selecciones&pagina=carta'?> method='post'>
                        <input type = "hidden" name="id" value=<?=$product->getId()?>>
                        <input type = "hidden" name="categoria" value=<?=$product->getCategoria()?>>
                        <button class="bet-button w3-black w3-section" type="sumbit" name="add">Añadir</button>
                    </form>
                </td>
            </tr>
        <?php
        }?>
    </table>
</div>
</body>
</html>