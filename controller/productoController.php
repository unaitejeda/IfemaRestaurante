<?php
//Creamos el controlador de la web
include_once 'model/menus.php';
include_once 'model/platos.php';
include_once 'model/postres.php';
include_once 'model/bebidas.php';
include_once 'model/producto.php';
include_once 'model/productoDAO.php';
include_once 'model/pedido.php';
include_once 'model/usuarioDAO.php';
include_once 'utils/CalculadoraPrecios.php';

// Definimos el controlador del producto
class productoController
{

    // Función principal para la página de inicio
    public function index()
    {
        // Inicializamos el array de sesiones
        session_start();

        if (!isset($_SESSION['selecciones'])) {
            $_SESSION['selecciones'] = array();
        } else {
            if (isset($_POST['add'])) {
                $productoSel = ProductoDAO::getProductoById($_POST['id'], $_POST['categoria']);
                array_push($_SESSION['selecciones'], $productoSel);
            }
        }
        // Obtenemos todos los productos seleccionados

        //Llamo al modelo para obtener los datos
        if (isset($_COOKIE['UltimoPedido'])) {
            $msg_cookie = 'Tu ultimo pedido fue de ' . $_COOKIE['UltimoPedido'] . '€';
        } else {
            $msg_cookie = "Ningun pedido realizado";
        }
        $allProducts = ProductoDAO::getAllByTipe('Menus');

        // Ponemos la cabecera según el tipo de usuario
        //cabecera
        if (isset($_SESSION['username']) && $_SESSION['username'] == 'Admin') {

            include_once 'view/cabeceraadmin.php';
        } else {
            include_once 'view/cabecera.php';
        }

        //coockie
        include_once 'view/coockie.php';

        //panel
        include_once 'view/index.php';

        //footer
        include_once 'view/footer.php';
    }

    // Función para gestionar la compra (añadir o quitar productos)
    public function compra()
    {
        session_start();
        // Actualizamos la cantidad de productos en la selección
        // Calculamos el precio total de la selección
        // Incluimos la cabecera según el tipo de usuario
        // Incluimos la vista del panel de compra y el footer
        if (isset($_SESSION['username'])) {
            if (isset($_POST['Add'])) {
                $pedido = $_SESSION['selecciones'][$_POST['Add']];
                $pedido->setCantidad($pedido->getCantidad() + 1);
            } else if (isset($_POST['Del'])) {
                $pedido = $_SESSION['selecciones'][$_POST['Del']];
                if ($pedido->getCantidad() == 1) {
                    unset($_SESSION['selecciones'][$_POST['Del']]);

                    $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
                } else {
                    $pedido->setCantidad($pedido->getCantidad() - 1);
                }
            }
            $precioTotal = CalculadoraPrecios::calculadorPrecioPedido($_SESSION['selecciones']);

            if (isset($_SESSION['username']) && $_SESSION['username'] == 'Admin') {

                include_once 'view/cabeceraadmin.php';
            } else {
                include_once 'view/cabecera.php';
            }
            include_once 'view/panelCompra.php';
            include_once 'view/footer.php';
        } else {
            header("Location:" . url . '?controller=producto');
        }
    }

    // Función para mostrar la carta de productos
    public function carta()
    {
        // Obtenemos la categoría de productos o todos los productos
        // Obtenemos los productos según la categoría
        // Ponemos la cabecera según el tipo de usuario
        // Ponemos la vista del panel de pedido y el footer
        session_start();
        if (isset($_SESSION['username'])) {
            if (!isset($_GET['categoria'])) {
                $allProducts = ProductoDAO::getAllProduct();
                $categoria = 'Todos los Productos';
            } else {
                if (isset($_GET['categoria'])) {
                    $categoria = $_GET['categoria'];
                    if ($categoria == 'TodosProductos') {
                        $allProducts = ProductoDAO::getAllProduct();
                    } else {
                        $allProducts = ProductoDAO::getAllByTipe($categoria);
                    }
                }
            }

            if (isset($_SESSION['username']) && $_SESSION['username'] == 'Admin') {

                include_once 'view/cabeceraadmin.php';
            } else {
                include_once 'view/cabecera.php';
            }
            include_once 'view/panelPedido.php';
            include_once 'view/footer.php';
        } else {
            header("Location:" . url . '?controller=producto');
        }
    }

    // Función para agregar productos a la selección
    public function selecciones()
    {
        //Creamos e iniciamos una session
        session_start();
        // Añadimos un producto a la selección y redirecciona a la página adecuada
        if (isset($_POST['id'])) {
            $productoSel = ProductoDAO::getProductoById($_POST['id'], $_POST['categoria']);
            $pedido = new Pedido($productoSel);
            array_push($_SESSION['selecciones'], $pedido);
            // Redirección después de manejar la lógica del carrito
            if (isset($_GET['pagina'])) {
                $redireccion = $_GET['pagina'];
                if ($redireccion == "index") {
                    header("Location:" . url . '?controller=producto&action=index');
                } else {
                    header("Location:" . url . '?controller=producto&action=carta');
                }
            }
        }
    }

    // Función para eliminar un producto (solo para el admin)
    public function eliminar()
    {
        // Elimina un producto según su ID y redirecciona al panel de admin
        if (isset($_POST["id"])) {
            $id_product = $_POST["id"];
            ProductoDAO::deleteProduct($id_product);
        }

        header("Location:" . url . '?controller=producto&action=panelAdmin');
    }

    // Función para editar un producto (solo para admin)
    public function edit()
    {
        session_start();

        // Obtenemos y mostramos la vista de edición de un producto
        if (isset($_POST["id"])) {
            $id_product = $_POST["id"];
            $categoria_producto = $_POST['categoria'];
            $product = ProductoDAO::getProductoById($id_product, $categoria_producto);
            if (isset($_SESSION['username']) && $_SESSION['username'] == 'Admin') {

                include_once 'view/cabeceraadmin.php';
            } else {
                include_once 'view/cabecera.php';
            }
            include_once 'view/editarPedido.php';
            include_once 'view/footer.php';
        } else {
            echo 'ERROR DE ID';
        }
    }

    // Función para aplicar cambios en la edición de un producto (solo para admin)
    public function editProduct()
    {
        // Actualiza la información del producto editado y redirecciona al panel de admin
        $uploads_dir = "";
        $name = "";
        if (isset($_FILES["foto"])) {
            $tmp_name = $_FILES["foto"]["tmp_name"];

            $uploads_dir = "assets/images/PPRODUCTOS";
            $name = "producto_" . $_POST["id"] . ".jpg";
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
        }

        if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['categoria']) && isset($_FILES['foto'])) {
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $categoria = $_POST["categoria"];
            $foto = $uploads_dir . "/" . $name;
            ProductoDAO::updateProduct($id, $nombre, $precio, $categoria, $foto);
        }


        header("Location:" . url . '?controller=producto&action=panelAdmin');
    }

    // Función para crear un nuevo producto (solo para admin)
    public function crear()
    {
        // Creamos un nuevo producto y redirecciona al panel de admin
        $uploads_dir = "";
        $name = "";
        if (isset($_FILES["foto"])) {
            $tmp_name = $_FILES["foto"]["tmp_name"];

            $uploads_dir = "assets/images/PPRODUCTOS";
            $name = "producto_" . $_POST["id"] . ".jpg";
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
        }

        if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['categoria']) && isset($_FILES['foto'])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $foto = $uploads_dir . "/" . $name;
            $resultado = ProductoDAO::crearProducto($nombre, $precio, $categoria, $foto);

            header("Location:" . url . '?controller=producto&action=panelAdmin');
        }
    }

    // Función para mostrar el panel de administración (solo para admin)
    public function panelAdmin()
    {
        session_start();

        // Obtenemos todos los productos y mostramos el panel de admin
        $allProducts = ProductoDAO::getAllProduct();
        if (isset($_SESSION['username']) && $_SESSION['username'] == 'Admin') {

            include_once 'view/cabeceraadmin.php';
        } else {
            include_once 'view/cabecera.php';
        }
        include_once 'view/panelAdmin.php';
        include_once 'view/footer.php';
    }



    // Función para confirmar y finalizar la compra
    public function confirmar()
    {
        // Limpia la selección de productos y guarda el último pedido en una cookie
        // Redireccionamos a la página principal
        session_start();
        $id_usuario = $_SESSION['id']; // Obtenemos el ID del usuario de la sesión

        // Guardamos el último pedido en una cookie

        // Calculamos el precio total del pedido
        $fechaBD = date('Y-m-d');
        $precioTotal = CalculadoraPrecios::calculadorPrecioPedido($_SESSION['selecciones']);
        $usarPuntos = isset($_POST['usarPuntos']) ? true : false;

        // Obtén el porcentaje de propina del formulario
        $propina = isset($_POST['cantidadPuntos']) ? $_POST['cantidadPuntos'] : 0; // El valor predeterminado es 0 si no se especifica propina

        if ($usarPuntos) {
            // Obtén los puntos disponibles del cliente
            $puntosDisponibles = UsuarioDAO::mostrarPuntosFidelidad($id_usuario);

            // Calcula el descuento en función de los puntos disponibles
            $descuento = $puntosDisponibles;

            // Resta el descuento al total del pedido
            $precioTotal -= $descuento  * 0.1;

            // Actualiza los puntos del cliente restando los puntos utilizados
            usuarioDAO::actualizarPuntosFidelidad($id_usuario, $puntosDisponibles - $descuento);
        }

        // Creamos el pedido y guardamos el porcentaje de propina en la base de datos
        $pedido = ProductoDAO::crearPedido($id_usuario, $fechaBD, $precioTotal, $_SESSION['selecciones'], $propina);

        $puntosAcumulados = usuarioDAO::acumularPuntosPorCompra($id_usuario, $precioTotal);

        if (isset($_POST['cantidadFinal'])) {
            setcookie('UltimoPedido', $precioTotal, time() + 3600, "/");
        }
        // Limpiamos la selección de productos
        unset($_SESSION['selecciones']);

        // Redireccionamos a la página principal
        header("Location:" . url . '?controller=producto');
    }




    // Función para manejar el inicio de sesión
    public function login()
    {
        session_start();

        // Verificamos las credenciales de inicio de sesión
        // Mostramos la vista de inicio de sesión
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            // $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM usuarios WHERE username= ? AND password= ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                header("Location:" . url . '?controller=producto');
                $_SESSION["username"] = $username;
                $row =  $result->fetch_assoc();
                $id = $row['id'];
                $_SESSION["id"] = $id;
                return true;
            } else {
                header("Location:" . url . '?controller=producto&action=login');
                return false;
            }
        }
        if (isset($_SESSION['username']) && $_SESSION['username'] == 'Admin') {

            include_once 'view/cabeceraadmin.php';
        } else {
            include_once 'view/cabecera.php';
        }
        include_once 'view/login.php';
        include_once 'view/footer.php';
    }

    // Función para registrar un nuevo usuario
    public function register()
    {
        session_start();
        // Primero, verifica si el formulario se ha enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $username = $_POST["username"];
            $mail = $_POST["mail"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $telefono = $_POST["telefono"];
            $con = DataBase::connect();
            // Registra un nuevo usuario y redirecciona al inicio de sesión
            if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["username"]) && !empty($_POST["mail"]) && !empty($_POST["password"]) && !empty($_POST["telefono"])) {
                $con->query("INSERT INTO usuarios ( nombre, apellido, username, mail, password, telefono) VALUES ('$nombre', '$apellido', '$username', '$mail', '$password', '$telefono')");
                header("Location:" . url . '?controller=producto&action=login');
            } else {
                echo "Por favor, completa todos los campos requeridos.";
            }
        }
    }

    // Función para cerrar sesión
    public function cerrar()
    {
        session_start();

        // Cerramos la sesión y redirecciona a la página principal
        if (isset($_SESSION["username"])) {
            unset($_SESSION["username"]);
            session_destroy();
            header("Location:" . url . '?controller=producto');
        }
    }
}
