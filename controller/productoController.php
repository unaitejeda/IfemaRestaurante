<?php
//Creamos el controlador de pedidos
include_once 'model/menus.php';
include_once 'model/platos.php';
include_once 'model/postres.php';
include_once 'model/bebidas.php';
include_once 'model/productoDAO.php';
include_once 'model/pedido.php';
include_once 'utils/CalculadoraPrecios.php';


class productoController
{

    public function index()
    {
        // inicializamos el array de sesiones
        session_start();

        if (!isset($_SESSION['selecciones'])) {
            $_SESSION['selecciones'] = array();
        } else {
            if (isset($_POST['add'])) {
                $productoSel = ProductoDAO::getProductoById($_POST['id'], $_POST['categoria']);
                array_push($_SESSION['selecciones'], $productoSel);
            }
        }
        //Llamo al modelo para obtener los datos

        if (isset($_COOKIE['UltimoPedido'])) {
            $msg_cookie = 'Tu ultimo pedido fue de ' . $_COOKIE['UltimoPedido'] . '€';
        } else {
            $msg_cookie = "Ningun pedido realizado";
        }
        $allProducts = ProductoDAO::getAllByTipe('Menus');


        //cabecera
        include_once 'view/cabecera.php';
        
        //coockie
        include_once 'view/coockie.php';
         
        //panel
        include_once 'view/index.php';

        //footer
        include_once 'view/footer.php';
    }

    public function compra()
    {
        session_start();

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

        include_once 'view/cabecera.php';
        include_once 'view/panelCompra.php';
        include_once 'view/footer.php';
    }


    public function carta()
    {

        session_start();

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

        include_once 'view/cabecera.php';
        include_once 'view/panelPedido.php';
        include_once 'view/footer.php';
    }

    public function selecciones()
    {
        //Creamos e iniciamos una session
        session_start();

        if (isset($_POST['id'])) {
            // $productoId = $_POST['id'];
            // $encontrado = false;

            // // Recorremos los productos en el carrito para verificar si ya está presente
            // foreach ($_SESSION['selecciones'] as $pedido) {
            //     if ($pedido->getProducto()->getID() == $productoId) {
            //         $encontrado = true;
            //         // Si ya está en el carrito, incrementamos la cantidad
            //         $pedido->setCantidad($pedido->getCantidad() + 1);
            //         break;
            //     }
            // }

            // // Si no se encontró, agregamos el producto al carrito con cantidad = 1
            // if (!$encontrado) {
            //     $pedido = new Pedido(ProductoDAO::getAllProduct());
            //     $pedido->setCantidad(1);
            //     array_push($_SESSION['selecciones'], $pedido);
            // }
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
    // public function eliminar(){
    //     echo "Producto a eliminar";
    //     $id_product = $_POST["id"];
    //     ProductoDAO::deleteProduct($id_product);
    // }

    // public function edit(){

    //     $product=ProductoDAO::getProductoById($_POST['id'], $_POST['categoria']);


    //     include_once 'view/editarPedido.php';
    // }
    // public function editProduct(){
    //     $id = $_POST["id"];
    //     $nombre = $_POST["nombre"];

    //     ProductoDAO::editProductById();

    // }



    public function confirmar()
    {
        // te almacena el pedido en la base de datos PedidoDAO que guarda el pedido

        //borramos sesion de pedido
        session_start();
        unset($_SESSION['selecciones']);
        // guardo la cookie
        setcookie('UltimoPedido', $_POST['cantidadFinal'], time() + 3600, "/");
        header("Location:" . url . '?controller=producto');
    }


    public function login()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM usuarios WHERE username= ? AND password= ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                header("Location:" . url . '?controller=producto');
                $_SESSION["username"] = $username;
                return true;
            } else {
                header("Location:" . url . '?controller=producto&action=login');
                return false;
            }
        }
        include_once 'view/cabecera.php';
        include_once 'view/login.php';
        include_once 'view/footer.php';
    }

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

            if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["username"]) && !empty($_POST["mail"]) && !empty($_POST["password"]) && !empty($_POST["telefono"])) {
                $con->query("INSERT INTO usuarios ( nombre, apellido, username, mail, password, telefono) VALUES ('$nombre', '$apellido', '$username', '$mail', '$password', '$telefono')");
                header("Location:" . url . '?controller=producto&action=login');
            } else {
                echo "Por favor, completa todos los campos requeridos.";
            }
        }

        include_once 'views/cabecera.php';
        include_once 'view/login.php';
        include_once 'views/footer.php';
    }
}
