<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/full_estil.css">
    <title>Reseñas</title>
</head>

<body>
    <!-- UBICACION -->
    <section class="seccionUbicación">
        <div class="container container4">
            <a href=<?= url . '?controller=producto' ?> style="text-decoration:none">
                <p class="pProductos subrayado">Inicio</p>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
            </svg>
            <a href="<?= url . '?controller=reseñas&action=reseñas' ?>" style="text-decoration:none">
                <p class="pProductos subrayado">Reseñas</p>
            </a>
        </div>
    </section>

    <!-- FILTRO -->
    <div id="categories-filter">
        <label><input type="checkbox" value="1" class="category-checkbox"> Categoria 1</label>
        <label><input type="checkbox" value="2" class="category-checkbox"> Categoria 2</label>
        <label><input type="checkbox" value="3" class="category-checkbox"> Categoria 3</label>
        <label><input type="checkbox" value="4" class="category-checkbox"> Categoria 4</label>
        <label><input type="checkbox" value="5" class="category-checkbox"> Categoria 5</label>
    </div>
    <div id="orden-selector">
        <label for="orden">Orden:</label>
        <select id="orden">
            <option value="ascendente">Ascendente</option>
            <option value="descendente">Descendente</option>
        </select>
    </div>


    <!-- RESEÑAS -->
    <section class="secReseñas">
        <div class="container">
            <div class="row" id="container">

            </div>
        </div>
    </section>

    <form id="comentarioForm">
        <input type="text" id="id_usuario" name="id_usuario" value="<?= $_SESSION['id'] ?>" hidden><br>

        <label for="resenya">Resenya:</label><br>
        <input type="text" id="resenya" name="resenya" maxlength="255"><br>
        <label for="valoracion">Valoración:</label><br>
        <input type="number" id="valoracion" name="valoracion" min="1" max="5"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <script src="javascript/reseñas.js"></script>
</body>

</html>