document.addEventListener('DOMContentLoaded', function() {
    let id_usuario = document.getElementById('id_usuario').value;
    let data = {
        id_usuario: id_usuario
    }
    // Calcula los puntos acumulados y muestra la cantidad en la interfaz
   
        fetch('http://localhost/?controller=api&action=apiComentarios&accion=puntosUser', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
            
        })
        .then(response => {return response.json();})
        .then(data => {
            mostrarPuntos(data);
        })
        // .catch(error => console.error(error));
    

    
    

    // Maneja el evento de confirmación de la compra
    // document.getElementById('compraForm').addEventListener('submit', function(event) {
    //     event.preventDefault();

    //     let usarPuntos = document.getElementById('usarPuntos').checked;
    //     let cantidadPuntos = document.getElementById('cantidadPuntos').value;

    //     // Envía la información al servidor
    //     fetch('http://localhost/?controller=producto&action=confirmar', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //         },
    //         body: JSON.stringify({
    //             usarPuntos: usarPuntos,
    //             cantidadPuntos: cantidadPuntos
    //         }),
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         // Maneja la respuesta del servidor, como redireccionar o mostrar un mensaje de éxito
    //         console.log(data);
    //     })
    //     .catch(error => console.error(error));
    // });
});

function mostrarPuntos(data){
    let puntos = document.getElementById("mostrarPuntos");
    puntos.innerHTML= '';
    let mostrar = document.createElement('span');
    mostrar.textContent = `Puntos acumulados: ${data}`;

    puntos.appendChild(mostrar);
}
