document.addEventListener('DOMContentLoaded', function() {
    let id_usuario = document.getElementById('id_usuario').value;
    let checkbox = document.getElementById('usarPuntos'); // Obtener el checkbox
    let precioOriginal; // Variable para almacenar el precio original

    // Mostrar los puntos del usuario al cargar la página
    mostrarPuntos(id_usuario);

    // Guardar el precio original al cargar la página
    precioOriginal = parseFloat(document.getElementById('precioSinActualizar').textContent.split(': ')[1]);

    // Agregar un evento de cambio al checkbox
    checkbox.addEventListener('change', function() {
        // Verificar si el checkbox está marcado
        if (this.checked) {
            // Si está marcado, calcular y mostrar el precio con descuento
            calcularPrecioConDescuento(id_usuario);
        } else {
            // Si no está marcado, mostrar el precio original
            mostrarPrecioOriginal();
        }
    });

    // Función para calcular el precio con el descuento de puntos
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
            // Calcular el descuento y actualizar el precio con descuento
            let descuento = parseFloat(data) * 0.1;
            let precioConDescuento = precioSinDescuento - descuento;
            // Mostrar el precio con descuento en la página
            mostrarPrecioConDescuento(precioConDescuento);
        })
        .catch(error => console.error(error));
    }

    // Función para mostrar los puntos del usuario
    function mostrarPuntos(id_usuario){
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

    // Función para mostrar el precio con descuento en la página
    function mostrarPrecioConDescuento(precioConDescuento) {
        let precioElemento = document.getElementById('precioSinActualizar');
        precioElemento.textContent = `SUBTOTAL: ${precioConDescuento.toFixed(2)} €`;
    }

    // Función para mostrar el precio original en la página
    function mostrarPrecioOriginal() {
        mostrarPrecioConDescuento(precioOriginal);
    }
});

