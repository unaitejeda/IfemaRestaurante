document.addEventListener('DOMContentLoaded', function () {
    let precioFinal = document.getElementById('precioSinActualizar'); // Cambiado el ID para que coincida con el elemento en el HTML
    let precioInicial = parseFloat(precioFinal.textContent.split(': ')[1]); // Obtener el precio inicial del texto
    let propinaInput = document.getElementById('cantidadPropina');
    let id_usuario = document.getElementById('id_usuario').value;
    let checkbox = document.getElementById('usarPuntos'); // Obtener el checkbox
    let precioOriginal; // Variable para almacenar el precio original

    // Mostrar los puntos del usuario al cargar la página
    mostrarPuntos(id_usuario);

    // Guardar el precio original al cargar la página
    precioOriginal = parseFloat(precioFinal.textContent.split(': ')[1]);

    // Agregar un evento de cambio al checkbox
    checkbox.addEventListener('change', function () {
        // Verificar si el checkbox está marcado
        if (this.checked) {
            // Si está marcado, calcular y mostrar el precio con descuento
            calcularPrecioConDescuento(id_usuario);
        } else {
            // Si no está marcado, mostrar el precio original
            mostrarPrecioOriginal();
        }
    });
    precioFinal.addEventListener('change', function () {
        // Verificar si el checkbox está marcado
        if (this.checked) {
            // Si está marcado, calcular y mostrar el precio con descuento
            calcularPrecioConDescuento(id_usuario);
        } else {
            // Si no está marcado, mostrar el precio original
            mostrarPrecioOriginal();
        }
    });

    // Función para calcular el precio con el descuento de puntos y la propina
    function calcularPrecioConDescuento(id_usuario) {
        let data = {
            id_usuario: id_usuario
        };

        fetch('http://localhost/?controller=api&action=apiComentarios&accion=puntosUser', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                // Obtener el precio sin descuento
                let precioSinDescuento = precioInicial;
                // Calcular el descuento y actualizar el precio con descuento
                let descuento = parseFloat(data) * 0.1;
                let precioConDescuento = precioSinDescuento - descuento;

                // Obtener el valor de la propina ingresada por el usuario
                let propina = parseFloat(propinaInput.value);

                // Calcular el precio total con la propina y el descuento
                let precioTotal = precioConDescuento + (precioConDescuento * propina / 100);

                // Actualizar el precio final mostrado en la interfaz
                precioFinal.textContent = 'SUBTOTAL: ' + precioTotal.toFixed(2) + ' €';
            })
            .catch(error => console.error(error));
    }

    // Función para mostrar los puntos del usuario
    function mostrarPuntos(id_usuario) {
        let data = {
            id_usuario: id_usuario
        };

        fetch('http://localhost/?controller=api&action=apiComentarios&accion=puntosUser', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                let puntos = document.getElementById("mostrarPuntos");
                puntos.innerHTML = '';
                let mostrar = document.createElement('span');
                mostrar.textContent = `Puntos acumulados: ${data}`;
                puntos.appendChild(mostrar);
            })
            .catch(error => console.error(error));
    }

    // Función para mostrar el precio original en la página
    function mostrarPrecioOriginal() {
        let precioElemento = document.getElementById('precioSinActualizar');
        precioElemento.textContent = `SUBTOTAL: ${precioOriginal.toFixed(2)} €`;
    }

    // Agregar evento de cambio al input de propina
    propinaInput.addEventListener('input', function () {
        let propina = parseFloat(propinaInput.value);

        if (!isNaN(propina) && propina >= 0) {
            let precioTotal = precioInicial + (precioInicial * propina / 100);

            // Mostrar el precio total con la propina y el descuento
            precioFinal.textContent = 'SUBTOTAL: ' + precioTotal.toFixed(2) + ' €';
        } else if (propinaInput.value === '') {
            // Restablecer el precio inicial si el campo de propina está vacío
            precioFinal.textContent = 'SUBTOTAL: ' + precioInicial.toFixed(2) + ' €';
        } else {
            // Mostrar un mensaje de error si el valor de la propina no es válido
            precioFinal.textContent = "Error: ¡Ingresa un valor válido para la propina!";
        }
    });
});
