function mostrarPopupDetallePedido(idPedido) {

    if (idPedido) {

        fetch('http://localhost/?controller=producto&action=obtenerDetallesPedido&id=' + idPedido)
            .then(response => {
                if (!response.ok) {
                    throw new Error('La respuesta del servidor no es válida');
                }
                return response.json();
            })
            .then(data => {
                // Formatear los datos del pedido para mostrarlos en una lista ordenada
                var pedidoInfo = `
                    <b>ID del Pedido:</b> ${data.id}\n
                    <b>Nombre del Usuario:</b> ${data.nombre_usuario}\n
                    <b>Fecha del Pedido:</b> ${data.hora}\n
                    <b>Total:</b> ${data.total} €\n
                    <b>Propina Aplicada:</b> ${data.propina} %\n
                    <b>Productos:</b>\n
                    <ol>
                        ${data.productos.map(producto => `
                            <li>${producto.nombre_producto} - Precio: ${producto.precio} € - Cantidad: ${producto.cantidad}</li>
                        `).join('')}
                    </ol>
                `;

                // Mostrar una alerta estilo notie con la información del pedido durante 10 segundos
                notie.force({
                    type: 'info',
                    text: pedidoInfo,
                    time: 10,
                    position: 'top'
                });
            })
            .catch(error => {
                console.error('Error al obtener detalles del pedido:', error);
                notie.alert({
                    type: 'error',
                    text: 'Error al obtener detalles del pedido. Por favor, inténtalo de nuevo más tarde.',
                    position: 'top'
                });
            });
    } else {
        console.error('ID del pedido no válido:', idPedido);
        notie.alert({
            type: 'warning',
            text: 'ID del pedido no válido. Por favor, selecciona un pedido válido.',
            position: 'top'
        });
    }
}


document.addEventListener("DOMContentLoaded", function() {
    // Obtener todos los elementos con la clase "ver-detalle"
    var botonesDetalles = document.querySelectorAll(".ver-detalle");

    botonesDetalles.forEach(function(boton) {
        boton.addEventListener("click", function() {
            var idPedido = boton.dataset.idpedido;
            mostrarPopupDetallePedido(idPedido);
        });
    });
});
