<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>

<body>
    <section class="seccionProducto">
        <div class="container">
            <h2 class="h2SeccionProducto">Unete a nuestra gran família</h2>
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
            <a href="<?= url . '?controller=producto&action=login' ?>"  style="text-decoration:none">
                <p class="pProductos subrayado">Login</p>
            </a>
        </div>
    </section>
    <section class="seccionLogin">
        <div class="container">
            <div class="row">
                <div class="col-sm12 col-xxl-6">
                    <!-- LOGEAR -->
                    <p class="pContadorCarta text-center">Inicia sesión con tu cuenta</p>
                    <form class="formRegistro" action='?controller=producto&action=login' method='post'>
                        <input class="inputRegistro" placeholder="Usuario" type="text" id="username" name="username" required>

                        <input class="inputRegistro" placeholder="Password" type="password" id="password" name="password" required>

                        <button class="botonFinalizaCompra" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(230, 65, 0, 1));" type="submimt">Iniciar sesión</button>
                    </form>
                    <p class="pContadorCarta text-center">Cierra tu sesión</p>
                    <form class="formRegistro" action='?controller=producto&action=cerrar' method='post'>
                        <button class="botonFinalizaCompra" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(230, 65, 0, 1));" type="submit">Cerrar Sesión</button>
                    </form>
                </div>
                <div class="col-sm-12 col-xxl-6">
                    <!-- REGISTRAR -->
                    <p class="pContadorCarta text-center">Crea tu propia cuenta</p>
                    <form class="formRegistro" action='?controller=producto&action=register' method='post'>
                        <input class="inputRegistro" placeholder="Nombre" type="text" name="nombre" required>

                        <input class="inputRegistro" placeholder="Apellido" type="text" name="apellido" required>

                        <input class="inputRegistro" placeholder="Usuario" type="text" name="username" required>

                        <input class="inputRegistro" placeholder="Mail" type="text" name="mail" required>

                        <input class="inputRegistro" placeholder="Password" type="password" name="password" required>

                        <input class="inputRegistro" placeholder="Telefono" type="number" name="telefono" required>

                        <button class="botonFinalizaCompra" style="background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(230, 65, 0, 1));" type="submit">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</body>

</html>