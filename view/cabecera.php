<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Document</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/full_estil.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary header1">
      <div class="container-fluid">
        <div class="container">
          <div class="navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <a href=<?= url . '?controller=producto' ?>>
                <li class="nav-item">
                  <img src="assets/images/ifma.png" alt="logoifema" class="logoifema">
                </li>
              </a>
            </ul>
            <form class="d-flex" role="search">

              <a class="botonCarta d-flex" href="<?= url . '?controller=producto&action=login' ?>" style="text-decoration:none">
                <svg class="imgCarta" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
                <p class="pCartaHeader"><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Login' ?></p>
              </a>

              <a class="botonCarta d-flex" href="<?= url . '?controller=producto&action=carta' ?>" style="text-decoration:none">
                <svg class="imgCarta" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pass" viewBox="0 0 16 16">
                  <path d="M5.5 5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1z" />
                  <path d="M8 2a2 2 0 0 0 2-2h2.5A1.5 1.5 0 0 1 14 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-13A1.5 1.5 0 0 1 3.5 0H6a2 2 0 0 0 2 2m0 1a3.001 3.001 0 0 1-2.83-2H3.5a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5h-1.67A3.001 3.001 0 0 1 8 3" />
                </svg>
                <p class="pCartaHeader">Carta</p>
              </a>
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            <a class="botonCarrito" href="<?= url . '?controller=reseñas&action=mostrarPedidos' ?>" style="text-decoration:none">
              <div class="imgPedidos" type="submit"> </div>
            </a>
            <a class="botonCarrito" href="<?= url . '?controller=producto&action=compra' ?>" style="text-decoration:none">
              <span class="contador"><?= count($_SESSION['selecciones']) ?></span>
              <div class="imgCarrito" type="submit"> </div>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </header>
</body>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>