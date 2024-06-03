// Seleccionar todos los radio buttons de orden
// Seleccionar todos los radio buttons de orden de fecha
const orderFechaRadioButtons = document.querySelectorAll('input[name="orderFecha"]');
// Seleccionar todos los radio buttons de orden de precio
const orderPrecioRadioButtons = document.querySelectorAll('input[name="orderPrecio"]');

document.addEventListener('DOMContentLoaded', function () {
    const storedOrderFecha = localStorage.getItem('orderFecha');
    const storedOrderPrecio = localStorage.getItem('orderPrecio');

    if (storedOrderFecha) {
        const selectedOrderFecha = document.querySelector(`input[name="orderFecha"][value="${storedOrderFecha}"]`);
        if (selectedOrderFecha) {
            selectedOrderFecha.checked = true;
        }
    }

    if (storedOrderPrecio) {
        const selectedOrderPrecio = document.querySelector(`input[name="orderPrecio"][value="${storedOrderPrecio}"]`);
        if (selectedOrderPrecio) {
            selectedOrderPrecio.checked = true;
        }
    }

    // Actualiza los pedidos basándose en el orden seleccionado almacenado
    updateOrder();
});

orderFechaRadioButtons.forEach(radioButton => {
    radioButton.addEventListener('click', function () {
        updateOrder();
        const selectedOrderFecha = document.querySelector('input[name="orderFecha"]:checked');
        if (selectedOrderFecha) {
            localStorage.setItem('orderFecha', selectedOrderFecha.value);
        }
    });
});

orderPrecioRadioButtons.forEach(radioButton => {
    radioButton.addEventListener('click', function () {
        updateOrder();
        const selectedOrderPrecio = document.querySelector('input[name="orderPrecio"]:checked');
        if (selectedOrderPrecio) {
            localStorage.setItem('orderPrecio', selectedOrderPrecio.value);
        }
    });
});


function updateOrder() {
    const selectedOrderFecha = document.querySelector('input[name="orderFecha"]:checked');
    const selectedOrderPrecio = document.querySelector('input[name="orderPrecio"]:checked');

    const orderFechaValue = selectedOrderFecha ? selectedOrderFecha.value : null;
    const orderPrecioValue = selectedOrderPrecio ? selectedOrderPrecio.value : null;

    const pendientesContainer = document.querySelector('.column.pendiente'); // Selecciona la columna de pedidos pendientes
    const pedidos = pendientesContainer.querySelectorAll('.pedido'); // Selecciona solo los pedidos en la columna de pedidos pendientes
    const pedidosArray = Array.from(pedidos);

    // Filtrar por precio
    if (orderPrecioValue) {
        switch (orderPrecioValue) {
            case 'precioAsc':
                pedidosArray.sort((a, b) => {
                    const precioA = parseFloat(a.getAttribute('data-precio'));
                    const precioB = parseFloat(b.getAttribute('data-precio'));
                    return precioA - precioB;
                });
                break;
            case 'precioDesc':
                pedidosArray.sort((a, b) => {
                    const precioA = parseFloat(a.getAttribute('data-precio'));
                    const precioB = parseFloat(b.getAttribute('data-precio'));
                    return precioB - precioA;
                });
                break;
            default:
                break;
        }
    }

    // Filtrar por fecha
    if (orderFechaValue) {
        switch (orderFechaValue) {
            case 'fechaAsc':
                pedidosArray.sort((a, b) => {
                    const dateA = new Date(a.getAttribute('data-fecha'));
                    const dateB = new Date(b.getAttribute('data-fecha'));
                    return dateA - dateB;
                });
                break;
            case 'fechaDesc':
                pedidosArray.sort((a, b) => {
                    const dateA = new Date(a.getAttribute('data-fecha'));
                    const dateB = new Date(b.getAttribute('data-fecha'));
                    return dateB - dateA;
                });
                break;
            default:
                break;
        }
    }

    // Limpiar el contenedor de pedidos pendientes
    pendientesContainer.innerHTML = '';

    // Volver a agregar los pedidos en el nuevo orden
    pedidosArray.forEach(pedido => pendientesContainer.appendChild(pedido));
}


function resetOrder() {
    orderFechaRadioButtons.forEach(radioButton => radioButton.checked = false);
    orderPrecioRadioButtons.forEach(radioButton => radioButton.checked = false);
    updateOrder();

    // Elimina los ordenes seleccionados almacenados en localStorage al restablecer el filtro
    localStorage.removeItem('orderFecha');
    localStorage.removeItem('orderPrecio');
}
