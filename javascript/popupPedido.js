// Función para mostrar el popup con la información detallada del pedido
function mostrarPopupDetallePedido(idPedido) {
    // Verificar si se recibe correctamente el ID del pedido
    console.log("ID del Pedido:", idPedido);

    // Obtener el elemento del popup y el contenedor de contenido del pedido
    var popup = document.getElementById("popupDetallePedido");
    var detallePedidoContent = document.getElementById("detallePedidoContent");

    // Verificar nuevamente el ID del pedido antes de realizar la solicitud al servidor
    if (idPedido) {
        console.log("Realizando solicitud para obtener detalles del pedido...");

        // Realizar una solicitud al servidor para obtener los detalles del pedido
        fetch('http://localhost/?controller=producto&action=obtenerDetallesPedido&id=' + idPedido)
            .then(response => {
                if (!response.ok) {
                    throw new Error('La respuesta del servidor no es válida');
                }
                return response.json();
            })
            .then(data => {
                // Llenar el contenido del popup con la información del pedido
                detallePedidoContent.innerHTML = `
                    <h2>Detalles del Pedido</h2>
                    <p>ID del Pedido: ${data.id}</p>
                    <p>Nombre del Usuario: ${data.nombreUsuario}</p>
                    <p>Fecha del Pedido: ${data.fecha}</p>
                    <p>Total: ${data.total} €</p>
                    <p>Propina Aplicada: ${data.propina} %</p>
                    <!-- Puedes agregar más detalles del pedido según tu estructura de datos -->
                `;

                // Mostrar el popup
                popup.style.display = "block";
            })
            .catch(error => {
                console.error('Error al obtener detalles del pedido:', error);
                // Mostrar un mensaje de error al usuario
                alert('Error al obtener detalles del pedido. Por favor, inténtalo de nuevo más tarde.');
            });
    } else {
        console.error('ID del pedido no válido:', idPedido);
        // Mostrar un mensaje de error al usuario
        alert('ID del pedido no válido. Por favor, selecciona un pedido válido.');
    }
}

document.addEventListener("DOMContentLoaded", function() {
    // Obtener todos los elementos con la clase "ver-detalle"
    var botonesDetalles = document.querySelectorAll(".ver-detalle");

    // Iterar sobre cada elemento "ver-detalle"
    botonesDetalles.forEach(function(boton) {
        // Agregar un event listener al hacer clic en cada "ver-detalle"
        boton.addEventListener("click", function() {
            // Obtener el ID del pedido desde el atributo "data-idPedido"
            var idPedido = boton.dataset.idpedido; // Cambiado a minúsculas para mayor consistencia
            // Llamar a la función para mostrar el popup con los detalles del pedido
            mostrarPopupDetallePedido(idPedido);
        });
    });
});

// Event listener para el botón de cerrar el popup
var closeBtn = document.querySelector(".popup-close");
closeBtn.addEventListener("click", function() {
    // Ocultar el popup al hacer clic en "Cerrar"
    var popup = document.getElementById("popupDetallePedido");
    popup.style.display = "none";
});
