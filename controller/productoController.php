<?php
//Creamos el controlador de pedidos
include_once 'model/menus.php';
include_once 'model/platos.php';
include_once 'model/postres.php';
include_once 'model/bebidas.php';
include_once 'model/productoDAO.php';
include_once 'model/pedido.php';
include_once 'utils/CalculadoraPrecios.php';


class productoController{

    public function index(){
        // inicializamos el array de sesiones
        session_start();

        if(!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }else{
            if(isset($_POST['add'])){
                $productoSel = ProductoDAO::getProductoById($_POST['id'], $_POST['categoria']);
                array_push($_SESSION['selecciones'],$productoSel);
            }

        }
        //Llamo al modelo para obtener los datos
        $allProducts = ProductoDAO::getAllProduct(); 
    
        //cabecera
        include_once 'view/cabecera.php';

        //panel
        include_once 'view/index.php';

        //footer
        include_once 'view/footer.php';
        // var_dump($_SESSION['selecciones']);
        if (isset($_COOKIE['UltimoPedido'])){
            echo 'Tu ultimo pedido fue de '. $_COOKIE['UltimoPedido'];
            setcookie('UltimoPedido','',time()-3600);
        }   
       


        // $sql = "SELECT * FROM productos LIMIT 4";

        // // Ejecutar la consulta
        // $result = $conn->query($sql);

        // // Verificar si hay resultados
        // if ($result->num_rows > 0) {
        //     // Mostrar los resultados
        //     while ($row = $result->fetch_assoc()) {
        //         echo "Nombre: " . $row["nombre"] . "<br>";
        //         // Puedes mostrar otras columnas según tu estructura de base de datos
        //     }
        // } else {
        //     echo "No se encontraron resultados";
        // }
    }

    public function compra(){
        session_start();

        if (isset($_POST['Add'])){
            $pedido = $_SESSION['selecciones'][$_POST['Add']];
            $pedido->setCantidad($pedido->getCantidad()+1);
        }else if(isset($_POST['Del'])){
            $pedido = $_SESSION['selecciones'][$_POST['Del']];
            if ($pedido->getCantidad()==1){
                unset($_SESSION['selecciones'][$_POST['Del']]);

                $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
            }else{
                $pedido->setCantidad($pedido->getCantidad()-1);
            }
        }
        $precioTotal = CalculadoraPrecios::calculadorPrecioPedido($_SESSION['selecciones']);

        include_once 'view/cabecera.php';
        include_once 'view/panelCompra.php';
        include_once 'view/footer.php';


    }


    public function carta(){

        session_start();

        if(!isset($_GET['categoria'])){
            $allProducts = ProductoDAO::getAllProduct();
            $categoria = 'Todos los Productos';
        }else{
            if(isset($_GET['categoria'])){
                $categoria = $_GET['categoria'];
                if($categoria == 'TodosProductos'){
                    $allProducts = ProductoDAO::getAllProduct();
                }else{
                    $allProducts = ProductoDAO::getAllByTipe($categoria);
                }
            }
        }

        include_once 'view/cabecera.php';
        include_once 'view/panelPedido.php';
        include_once 'view/footer.php';
    }

    public function selecciones(){
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
            array_push($_SESSION['selecciones'],$pedido);
            // Redirección después de manejar la lógica del carrito
            if (isset($_GET['pagina'])) {
                $redireccion = $_GET['pagina'];
                if ($redireccion == "index") {
                    header("Location:".url.'?controller=producto&action=index');
                } else {
                    header("Location:".url.'?controller=producto&action=carta');
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
    


    public function confirmar(){
        // te almacena el pedido en la base de datos PedidoDAO que guarda el pedido

        //borramos sesion de pedido
        session_start();
        unset($_SESSION['selecciones']);
        // guardo la cookie
        setcookie('UltimoPedido',$_POST['cantidadFinal'],time()+3600);
        header("Location:".url.'?controller=producto');

    }

}


?>