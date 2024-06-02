// Función para mostrar el popup con la información detallada del pedido
function mostrarPopupDetallePedido(idPedido) {
    // Aquí se debe implementar la lógica para mostrar el popup con la información detallada del pedido
    alert("Detalles del pedido con ID: " + idPedido);
}

// Agregar un event listener para mostrar el popup al hacer clic en un pedido
document.addEventListener("DOMContentLoaded", function() {
    var pedidos = document.querySelectorAll(".pedido");
    pedidos.forEach(function(pedido) {
        pedido.addEventListener("click", function() {
            var idPedido = pedido.dataset.idPedido;
            mostrarPopupDetallePedido(idPedido);
        });
    });
});
