<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <!-- LOGEAR -->
                    <form class="formRegistro" action='?controller=producto&action=login' method='post'>
                        <input class="inputRegistro" placeholder="Usuario" type="text" id="username" name="username" required>

                        <input class="inputRegistro" placeholder="Password" type="password" id="password" name="password" required>

                        <button type="submit">Registrarse</button>
                    </form>
                    <form class="formRegistro" action='?controller=producto&action=cerrar' method='post'>
                        <button type="submit">Cerrar Sesión</button>
                    </form>
                </div>
                <div class="col-2">
                    <div class="separator"></div>
                </div>
                <div class="col-5">
                    <!-- REGISTRAR -->
                    <form class="formRegistro" action='?controller=producto&action=register' method='post'>
                        <input class="inputRegistro" placeholder="Nombre" type="text" name="nombre" required>

                        <input class="inputRegistro" placeholder="Apellido" type="text" name="apellido" required>

                        <input class="inputRegistro" placeholder="Usuario" type="text" name="username" required>

                        <input class="inputRegistro" placeholder="Mail" type="text" name="mail" required>

                        <input class="inputRegistro" placeholder="Password" type="password" name="password" required>

                        <input class="inputRegistro" placeholder="Telefono" type="number" name="telefono" required>

                        <button type="submit">Registrarse</button>
                    </form>
                </div>
            </div> 
        </div>

    </section>
</body>

</html>