document.addEventListener('DOMContentLoaded', function () {
    // Obtener elementos del DOM
    let precioFinal = document.getElementById('precioFinal');
    let precioInicial = parseFloat(precioFinal.getAttribute('data-precio')); // Precio inicial del pedido
    let propinaInput = document.getElementById('cantidadPuntos');

    // Agregar evento de cambio al input de propina
    propinaInput.addEventListener('input', function () {
        // Obtener el valor de la propina ingresada por el usuario
        let propina = parseFloat(propinaInput.value);

        // Validar que el valor de la propina sea válido (mayor o igual a 0)
        if (!isNaN(propina) && propina >= 0) {
            // Calcular el monto de la propina y sumarlo al precio total del pedido
            let precioTotal = precioInicial + (precioInicial * propina / 100);
            
            // Actualizar el precio final mostrado en la interfaz
            precioFinal.textContent = precioTotal.toFixed(2) + ' €';
        } else if (propinaInput.value === '') {
            // Si el campo de propina está vacío, restablecer el precio final al precio inicial
            precioFinal.textContent = precioInicial.toFixed(2) + ' €';
        } else {
            // Mostrar un mensaje de error si el valor de la propina no es válido
            precioFinal.textContent = "Error: ¡Ingresa un valor válido para la propina!";
        }
    });
});
