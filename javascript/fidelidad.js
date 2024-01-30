document.addEventListener('DOMContentLoaded', function() {
    // Calcula los puntos acumulados y muestra la cantidad en la interfaz
    function calcularPuntosAcumulados() {
        fetch('http://localhost/?controller=api&action=obtenerPuntosUsuario', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('puntosAcumulados').textContent = data.puntos;
        })
        .catch(error => console.error(error));
    }

    calcularPuntosAcumulados();

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
