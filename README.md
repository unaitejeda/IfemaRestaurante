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
### Explicación

## QR
### Código
### Explicación

## Propinas
### Código
### Explicación

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
