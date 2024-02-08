document.addEventListener('DOMContentLoaded', function () {
    let precioFinal = document.getElementById('precioSinActualizar'); // Cambiado el ID para que coincida con el elemento en el HTML
    let precioInicial = parseFloat(precioFinal.textContent.split(': ')[1]); // Obtener el precio inicial del texto
    let propinaInput = document.getElementById('cantidadPropina');

    propinaInput.addEventListener('input', function () {
        let propina = parseFloat(propinaInput.value);

        if (!isNaN(propina) && propina >= 0) {
            let precioTotal = precioInicial + (precioInicial * propina / 100);
            precioFinal.textContent = 'SUBTOTAL: ' + precioTotal.toFixed(2) + ' €'; // Actualizar el texto del precio final
        } else if (propinaInput.value === '') {
            precioFinal.textContent = 'SUBTOTAL: ' + precioInicial.toFixed(2) + ' €'; // Restablecer el precio inicial si el campo de propina está vacío
        } else {
            precioFinal.textContent = "Error: ¡Ingresa un valor válido para la propina!";
        }
    });
});
