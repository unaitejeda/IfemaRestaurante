Unai Tejeda Montañes  |  DAW2B  |  JavaScript  |  16/02/2023
# Página Web de IFEMA RESTAURANTE


## Resumen del Proyecto
Este portal web se enfoca a una web basada en IFEMA MADRID pero hecha en restaurante, utilizando tecnologías de vanguardia como JavaScript, PHP, CSS y HTML. Con esto aplicamos todo lo que sabemos para generar la web realizar las maximas funciones posbiles que se nos piden.


## Funcionalidades Principales
- **Reseñas del restaurante:** Apartado de reseñas donde cada usuario podra realizar una reseña de cada uno de sus propios pedidos, estas reseñas se veran reflejadas en un apartado en la web, y cada pedido unicmamente podra tener una única reseña. 
- **Programa de fidelidad:** Programa adaptado para que los usuarios por realziar pedidos en nuestra web reciban una recompensa gratuita que podran utilizar para conseguir descuentos exclusivos.
- **QR:** En este apartado se generar un código QR especifico para cada pedido específico que se realice, si se escanea este QR te dirigira a una página donde podras obtener todo el detalle ded tu pedido. 
- **Propinas:** Los usaurios podran dejar un propina en cada uno de sus pedidos para que asi apoyen aun mas a la empresa.
- **Filtro de productos:** Este filtro se aplciara en el apartado de la carta, donde los usuarios pdoran filtrar por una o mas categorias en concreto, a aprte de que este filtro en caso de salirse de la web se mantendra hasta que el usuario lo quite.


## Lenguajes 
- **HTML:** Para la estructura y contenido de la página.
- **CSS:** Para la estética y estilo del portal.
- **PHP:** Para el desarrollo del lado del servidor.
- **JavaScript:** Para la funcionalidad interactiva del lado del cliente.


## Reseñas del restaurante
### Código
#### Página donde se muestran los pedidos con el botón 
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/0681dbb2-673b-4cbe-b295-ed54f3e29d57)
#### Botón crear reseña
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/7ff64d62-b645-4205-8961-6e1f5c2e50dc)
#### Formulario crear reseña
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/1ab61b40-787c-41e0-906b-9b588f8a7551)
#### Crear reseña
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/077868dd-c4c2-4b11-bc0e-8f1c0f394ab2)
#### Página de reseñas
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/b0c5ea86-f1fb-4d23-9f38-6630e392c888)
#### Mostrar reseñas
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/68ca4ed2-e1fc-4e72-a85f-f0e6e4c6331e)
#### Filtro de reseñas
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/a890c7b4-7cde-4c39-8c31-21b1e19fa44b)
#### Api para reseñas
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/3ee48b3b-e5dc-470a-993f-c0c870625c7a)
#### Controlador reseñas
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/a2e06937-1af4-432a-a493-7705faa7cc39)
#### Funciones del DAO de reseñas
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/1449e041-2585-4f0a-afeb-9969f094ed1d)
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/9d9dc262-f507-4595-9487-c0f95469a9c6)

### Explicación
#### Página donde se muestran los pedidos con el botón 
Este código HTML crea una página web que muestra una lista de pedidos. Utiliza PHP para iterar sobre los pedidos y muestra información como el ID del pedido, el producto y la cantidad. Además, proporciona la funcionalidad de dejar reseñas para cada pedido a través de formularios, con botones condicionalmente deshabilitados si ya se ha dejado una reseña. Se incluyen archivos JavaScript para agregar interactividad a los botones de reseña.

#### Botón crear reseña
Este script, llamado "botonResenya.js", se encarga de manejar la funcionalidad de los botones de reseña en la página web. En resumen, espera a que el contenido del documento HTML esté completamente cargado, selecciona los botones de reseña, realiza una solicitud Fetch a una API local para verificar si ya se ha dejado una reseña para cada pedido, y actualiza dinámicamente el texto y el estado de los botones en consecuencia. Si hay errores al obtener la información de la reseña, muestra un mensaje de error en la consola del navegador.

#### Formulario crear reseña
Este fragmento HTML crea una página web con un formulario para que los usuarios escriban reseñas. Incluye campos para la reseña y la valoración, junto con estilos CSS y scripts JavaScript para mejorar la presentación y funcionalidad de la página.

#### Crear reseña
Este script maneja el envío de reseñas desde un formulario. Espera a que el contenido del documento HTML esté completamente cargado, agrega un event listener al formulario para capturar el evento de envío, previene el comportamiento predeterminado del formulario, recopila los datos del formulario, realiza una solicitud Fetch POST a una API local con los datos del formulario como JSON, maneja la respuesta de la API, vacía los campos del formulario, muestra una notificación de éxito utilizando Notie.js y finalmente redirige al usuario a otra página después de un breve intervalo de tiempo.

#### Página de reseñas
Este fragmento HTML constituye una página web que muestra reseñas de productos. Incluye secciones para la ubicación del usuario, filtrado de reseñas y visualización de las mismas. La funcionalidad de cargar y mostrar las reseñas dinámicamente se espera que sea implementada mediante JavaScript.

#### Mostrar reseñas
Este script JavaScript se encarga de cargar las reseñas de los clientes desde una API local al cargar el documento HTML. Luego, utiliza la función verComentarios() para mostrar las reseñas en la página. Cada comentario se representa visualmente mediante un conjunto de estrellas, generado por la función valoracionClientes().

#### Filtro de reseñas
Este script  gestiona el filtrado y ordenado dinámico de las reseñas mostradas en la página web. Selecciona todos los elementos checkbox con la clase 'category-checkbox' y les añade un evento 'change' para actualizar las reseñas cuando cambia su estado. La función updateReviews() se encarga de filtrar y ordenar las reseñas según las categorías seleccionadas y el criterio de orden, mostrándolas nuevamente en la página. Además, se agrega un evento 'change' al selector de orden para aplicar los cambios al ordenar las reseñas.

#### Api para reseñas
Este fragmento de código PHP define un controlador llamado ApiController que maneja las solicitudes de una API relacionadas con los comentarios de los usuarios. En su método apiComentarios(), dependiendo de la acción especificada en los parámetros GET, realiza diferentes acciones: obtener los comentarios de la base de datos y enviarlos como respuesta en formato JSON, crear un nuevo comentario en la base de datos a partir de los datos proporcionados en formato JSON, o verificar si un pedido tiene una reseña asociada y enviar la respuesta en formato JSON.

#### Controlador reseñas
Este código PHP define el controlador reseñasController, que maneja las acciones relacionadas con las reseñas de productos. Contiene tres métodos:

- reseñas(): Muestra la página de reseñas, verificando si el usuario ha iniciado sesión y si es administrador para mostrar la cabecera correspondiente.
- crearReseña(): Muestra el formulario para crear una nueva reseña si se ha enviado el ID del pedido a través del método POST.
- mostrarPedidos(): Muestra los pedidos del usuario, verificando si ha iniciado sesión y obteniendo los pedidos del usuario a través del método getAllPedidos() de la clase comentariosDAO.

#### Funciones del DAO de reseñas
Este bloque de código PHP define la clase ComentariosDAO, que maneja la interacción con la base de datos para los comentarios de los usuarios. Aquí está un resumen:

- Método getComentarios(): Obtiene todos los comentarios de la base de datos junto con el nombre del usuario que los realizó y los devuelve en un array.
- Método crearComentarios(): Crea un nuevo comentario en la base de datos utilizando los datos proporcionados.
- Método getAllPedidos(): Obtiene todos los pedidos del usuario especificado y los devuelve en un array.
- Método selecPedidos(): Obtiene un pedido específico junto con su reseña asociada, si la tiene, y lo devuelve en un array.
- Método tieneResenya(): Verifica si un pedido tiene asociada al menos una reseña en la base de datos y devuelve true o false en consecuencia.


## Programa de fidelidad
### Código
#### Puntos de fidelidad
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/e2432543-a734-45fa-8376-a6f5ff4f3908)
#### Mostrar puntos de fidelidad y el descuento
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/3186aa40-c87d-489d-a386-bac5ec7aff29)
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/38efb70a-92c4-4b64-bc01-d744c8a37029)
#### Api para los puntos del usuario
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/c9e41430-04d0-48f5-8d6a-f2ce6c751cc7)
#### Funciones del DAO para la fidelidad
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/8475d51b-d1e3-4e2d-9274-515086dde698)
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/8dc7fe71-0f0f-4dfa-8638-4bd84f9c078f)
#### Función para confirmar
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/e4256457-679c-4384-8289-1240223d7a0b)

### Explicación
#### Puntos de fidelidad
Los puntos de fidelidad del usuario se calculan y muestran al calcular el total acumulado de puntos que ganará con la compra. Este cálculo se realiza utilizando un método proporcionado por UsuarioDAO. Además, se incluye un campo para ingresar un porcentaje de propina y un checkbox para indicar si se desean utilizar los puntos de fidelidad en la compra.Los puntos de fidelidad del usuario se actualizan según el precio total de la compra y se muestran en la respuesta del servidor.

#### Mostrar puntos de fidelidad y el descuento
Este código JavaScript se encarga de calcular y mostrar el precio final considerando los puntos de fidelidad del usuario y la propina seleccionada. Al cargar la página, se muestra la cantidad de puntos de fidelidad acumulados por el usuario. Cuando se marca o desmarca el checkbox para usar los puntos de fidelidad, se calcula y muestra el precio final con el descuento correspondiente. Si se ingresa una propina, se actualiza el precio final teniendo en cuenta la propina. Si no se ingresa propina, se muestra el precio final original sin modificar.

#### Api para los puntos del usuario
Este bloque de código PHP maneja una solicitud para obtener los puntos de fidelidad de un usuario. Primero, verifica si se proporciona un ID de usuario válido. Luego, utiliza el método mostrarPuntosFidelidad de la clase UsuarioDAO para obtener los puntos de fidelidad asociados a ese usuario. Finalmente, devuelve la cantidad de puntos en formato JSON si se proporciona un ID de usuario válido, o un mensaje de error si no hay sesión iniciada o el ID de usuario es nulo.

#### Funciones del DAO para la fidelidad
Este PHP define la clase UsuarioDAO, que proporciona funcionalidades relacionadas con los puntos de fidelidad del usuario.

- mostrarPuntosFidelidad($id_usuario): Esta función recupera los puntos de fidelidad actuales de un usuario específico de la base de datos y los devuelve.

- actualizarPuntosFidelidad($id_usuario, $nuevosPuntos): Actualiza los puntos de fidelidad de un usuario en la base de datos con el valor proporcionado.

- acumularPuntosPorCompra($id_usuario, $total): Calcula y acumula los puntos de fidelidad que un usuario ganará por una compra específica. Calcula la cantidad de puntos a acumular multiplicando el total gastado por una tasa de conversión fija. Luego, actualiza los puntos de fidelidad del usuario en la base de datos y devuelve la cantidad de puntos acumulados.

- calcularPuntosAcumulados($total, $id_usuario): Similar a la función anterior, calcula la cantidad de puntos de fidelidad que un usuario ganará por una compra específica.

#### Función para confirmar
Este método confirma un pedido de usuario. Inicia sesión, obtiene detalles del pedido y calcula el precio total. Si se usan puntos de fidelidad, aplica descuentos y actualiza los puntos del usuario. Luego, calcula el precio total con descuento y agrega la propina. Crea el pedido en la base de datos y acumula puntos por la compra. Finalmente, redirige al usuario y limpia los datos del pedido.


## QR
### Código
#### Código QR
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/82c5f0e5-4ef5-437d-8d14-d268da55478a)
#### Funciones del DAO para el QR y el pedido
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/9b9ade36-09da-43a3-978c-84c5bc56da06)
#### Controlador QR
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/54e10345-9191-4739-b2ad-8ab5382b4439)
#### Generar QR
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/7f36a3f1-d898-4f3f-a540-071705da94cb)
#### Detalle del pedido
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/a0683475-abef-4b3c-874f-a2f1c0befdac)

### Explicación
#### Código QR
En el formulario de compra, hay un input oculto con el id "id_usuario" que almacena el ID del usuario. Esta información es esencial para asociar el pedido con el usuario correspondiente. El formulario también incluye otros campos relevantes para el proceso de compra, como el precio total y la cantidad final.
Una vez que se completa el formulario y se envía, la información se utiliza para generar el código QR correspondiente al pedido realizado. Este código QR puede ser utilizado para diversos fines, como rastrear el pedido o acceder a detalles adicionales sobre la compra.

#### Funciones del DAO para el QR y el pedido
La función getUltimoPedidoByUser($id) se encarga de obtener el ID del último pedido realizado por un usuario específico. Realiza una consulta a la base de datos para seleccionar el ID del pedido más reciente asociado al usuario proporcionado. Retorna el ID del último pedido.

Por otro lado, la función getProductoByPedido($id_pedido) recupera los detalles de un pedido específico, incluyendo los productos asociados a ese pedido. Realiza una consulta a la base de datos para seleccionar los detalles del pedido y los productos correspondientes. Retorna un array de objetos Pedido que contiene información detallada sobre los productos incluidos en el pedido especificado. Cada objeto Pedido incluye detalles como el producto, la cantidad, el nombre del usuario, la hora del pedido, el precio total, la propina y los puntos acumulados.

#### Controlador QR
La función PaginaDetallesPedidoQR() se encarga de mostrar los detalles de un pedido junto con su código QR asociado. Primero, inicia la sesión y obtiene el ID de usuario de la URL. Luego, utiliza el método getUltimoPedidoByUser($id_user) para obtener información sobre el último pedido realizado por el usuario. Posteriormente, emplea el método getProductoByPedido($pedidos) para obtener los productos asociados al último pedido.

Una vez que se obtiene la información del pedido y los productos, la función verifica si se encontraron productos en el pedido. Si se encuentra al menos un producto, se extrae la información del primer pedido, como su ID, fecha y nombre de usuario.

#### Generar QR
Este script JavaScript crea un código QR para los detalles del pedido cuando se hace clic en el botón de confirmación. El código obtiene el ID de usuario, construye una URL con ese ID para obtener los detalles del pedido y luego genera un código QR basado en esa URL. Finalmente, muestra el código QR en una ventana emergente con un mensaje informativo.

#### Detalle del pedido
Este es un archivo HTML que muestra los detalles del pedido, incluyendo el ID del pedido, la fecha, el nombre del usuario y la lista de productos. Utiliza PHP para iterar sobre los productos y mostrar su información. También incluye un script JavaScript para generar y mostrar el código QR del pedido.


## Propinas
### Código
#### Propina en formulario
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/e2432543-a734-45fa-8376-a6f5ff4f3908)
#### Mostrar y calcular la propina aplicada
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/3081635b-9831-4a8b-aec4-b5472d909005)
#### Función para confirmar
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/e4256457-679c-4384-8289-1240223d7a0b)

### Explicación
#### Propina en formulario
En el formulario de compra, el campo "Porcentaje de propina" permite al usuario ingresar el valor de la propina como un porcentaje del precio total. Este valor se ingresa en el input con el id "cantidadPropina". El valor mínimo es 0 y el máximo es 100. Este campo permite al usuario definir la cantidad de propina que desea agregar al precio total de la compra.

#### Mostrar y calcular la propina aplicada
El evento change del checkbox se activa cuando se marca o desmarca. Si está marcado, calcula y muestra el precio con descuento. Si no está marcado, restaura el precio original y aplica la propina si está definida.
El evento input del input de propina se activa cuando se ingresa un valor. Calcula el precio con la propina si el valor es válido y actualiza el precio mostrado. Si se deja vacío, restaura el precio inicial. Si el valor no es válido, muestra un mensaje de error.

#### Función para confirmar
Este método confirma un pedido de usuario. Inicia sesión, obtiene detalles del pedido y calcula el precio total. Si se usan puntos de fidelidad, aplica descuentos y actualiza los puntos del usuario. Luego, calcula el precio total con descuento y agrega la propina. Crea el pedido en la base de datos y acumula puntos por la compra. Finalmente, redirige al usuario y limpia los datos del pedido.


## Filtro de productos
### Código
#### Página de productos
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/d02c3fe4-c568-4447-b8f7-823daa15002d)
#### Filtro de productos
![image](https://github.com/unaitejeda/IfemaRestaurante/assets/145151359/7a2a7d35-868a-40d9-b0fd-61c6bb755a96)

### Explicación
#### Página de productos
Este fragmento de código HTML representa una sección de filtros para productos. Contiene checkboxes que permiten al usuario filtrar los productos por categoría. Cada checkbox tiene una clase category-checkbox y un valor que representa la categoría a la que corresponde. Al hacer clic en uno de los checkboxes, se activará la función resetFilters(), la cual restablece todos los filtros a su estado original.

#### Filtro de productos
Este JavaScript administra la funcionalidad de filtrado de productos basada en categorías mediante checkboxes. Primero, selecciona todos los checkboxes de categoría y les añade un evento de clic para actualizar los productos mostrados. Luego, al cargar la página, verifica si hay selecciones de categorías almacenadas en el localStorage y, si las hay, marca los checkboxes correspondientes y actualiza los productos mostrados según esas categorías. La función updateProducts() se encarga de mostrar u ocultar los productos según las categorías seleccionadas. Si no se selecciona ninguna categoría, se muestran todos los productos. Si se selecciona al menos una categoría, solo se muestran los productos que pertenecen a esas categorías. La función resetFilters() desmarca todos los checkboxes y restablece los productos mostrados a su estado original, además de eliminar las categorías seleccionadas almacenadas en localStorage.
