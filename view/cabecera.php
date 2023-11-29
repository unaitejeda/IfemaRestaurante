<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/full_estil.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary header1">
            <div class="container-fluid">
              <div class="collapse navbar-collapse container" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <a href=<?=url.'?controller=producto'?>>
                    <li class="nav-item">
                      <img src="assets/images/ifma.png" alt="logoifema" class="logoifema">
                    </li>
                  </a>
                </ul>
                <form class="d-flex" role="search">
                  <a class="botonCarta d-flex" href=<?=url.'?controller=producto&action=carta'?> style="text-decoration:none">
                      <div class="imgCarta"></div>
                      <p class="pCartaHeader">Carta</p>
                  </a>
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                <a class="botonCarrito" href=<?=url.'?controller=producto&action=compra'?> style="text-decoration:none">
                  <span class="contador"><?=count($_SESSION['selecciones'])?></span>
                  <div class="imgCarrito" type="submit"> </div>
                </a>
              </div>
            </div>
          </nav>
    </header>
</body>
</html>