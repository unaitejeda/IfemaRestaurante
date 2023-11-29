<form action=<?= url ."?controller=producto&action=editProduct"?>method="post">
    <input type = "hidden" name="id" value=<?=$product->getId()?>/>
    <input name="idDis"  disabel value= <?=$product->getId()?>>
    <input name="nombre" value=<?=$product->getNombre()?>>
    <button class="bet-button w3-black w3-section" type="sumbit" name="edit">Editar</button>
</form>
