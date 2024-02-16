// botonResenya.js

document.addEventListener("DOMContentLoaded", function() {
    const botonesResenya = document.querySelectorAll('.boton-resenya');
    botonesResenya.forEach(boton => {
        const pedidoId = boton.dataset.pedidoId;
        fetch(`http://localhost/?controller=api&action=apiComentarios&accion=reviewId&pedido_id=${pedidoId}`)
            .then(response => response.json())
            .then(data => {
                if (data.tiene_resenya) {
                    boton.innerHTML = "Ya se dejó una reseña";
                    boton.disabled = true; // Deshabilitar el botón para evitar que se haga clic nuevamente
                }
            })
            .catch(error => console.error('Error al obtener la reseña:', error));
    });
});