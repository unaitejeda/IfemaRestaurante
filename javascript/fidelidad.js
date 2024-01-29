// En el archivo panelCompra.js

document.addEventListener('DOMContentLoaded', function() {
    // Calcula los puntos acumulados y muestra la cantidad en la interfaz
    function calcularPuntosAcumulados(precioTotal) {
        // Suponiendo que 100 puntos equivalen a 1 euro
        let puntosAcumulados = Math.floor(precioTotal / 100);
        document.getElementById('puntosAcumulados').textContent = puntosAcumulados;
        return puntosAcumulados;
    }

    // Maneja el evento de confirmación de la compra
    document.getElementById('compraForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let usarPuntos = document.getElementById('usarPuntos').checked;
        let cantidadPuntos = document.getElementById('cantidadPuntos').value;

        // Envía la información al servidor
        fetch('http://localhost/?controller=producto&action=confirmar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                usarPuntos: usarPuntos,
                cantidadPuntos: cantidadPuntos
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Maneja la respuesta del servidor, como redireccionar o mostrar un mensaje de éxito
            console.log(data);
        })
        .catch(error => console.error(error));
    });
});