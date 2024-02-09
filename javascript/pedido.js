document.addEventListener('DOMContentLoaded', function () {
    let precioFinal = document.getElementById('precioSinActualizar');
    let precioInicial = parseFloat(precioFinal.textContent.split(': ')[1]);
    let propinaInput = document.getElementById('cantidadPropina');
    let id_usuario = document.getElementById('id_usuario').value;
    let checkbox = document.getElementById('usarPuntos');
    let precioOriginal;

    // Mostrar los puntos del usuario al cargar la página
    mostrarPuntos(id_usuario);

    // Guardar el precio original al cargar la página
    precioOriginal = parseFloat(precioFinal.textContent.split(': ')[1]);

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
            let precioSinDescuento = precioOriginal;
            // Calcular el descuento por puntos
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
            puntos.innerHTML= '';
            let mostrar = document.createElement('span');
            mostrar.textContent = `Puntos acumulados: ${data}`;
            puntos.appendChild(mostrar);
        })
        .catch(error => console.error(error));
    }

    // Agregar un evento de cambio al checkbox
    checkbox.addEventListener('change', function () {
        // Verificar si el checkbox está marcado
        if (this.checked) {
            // Si está marcado, calcular y mostrar el precio con descuento
            calcularPrecioConDescuento(id_usuario);
        } else {
            // Si no está marcado, restaurar el precio original con la propina si está definida
            let propina = parseFloat(propinaInput.value);
            if (!isNaN(propina) && propina >= 0) {
                let precioConPropina = precioInicial * (1 + propina / 100); 
                // Mostrar el precio con la propina
                precioFinal.textContent = 'SUBTOTAL: ' + precioConPropina.toFixed(2) + ' €';
            } else {
                // Si la propina no está definida, restaurar el precio original sin propina
                precioFinal.textContent = 'SUBTOTAL: ' + precioInicial.toFixed(2) + ' €';
            }
        }
    });

    // Agregar evento de cambio al input de propina
    propinaInput.addEventListener('input', function () {
        let propina = parseFloat(propinaInput.value);

        if (!isNaN(propina) && propina >= 0) {
            // Verificar si el checkbox de descuento está marcado
            if (checkbox.checked) {
                // Si está marcado, calcular el precio con descuento y propina
                calcularPrecioConDescuento(id_usuario);
            } else {
                // Si no está marcado, calcular el precio con propina solamente
                let precioConPropina = precioInicial * (1 + propina / 100); 
                // Mostrar el precio con la propina
                precioFinal.textContent = 'SUBTOTAL: ' + precioConPropina.toFixed(2) + ' €';
            }
        } else if (propinaInput.value === '') {
            // Restablecer el precio inicial si el campo de propina está vacío
            precioFinal.textContent = 'SUBTOTAL: ' + precioInicial.toFixed(2) + ' €';
        } else {
            // Mostrar un mensaje de error si el valor de la propina no es válido
            precioFinal.textContent = "Error: ¡Ingresa un valor válido para la propina!";
        }
    });
});
