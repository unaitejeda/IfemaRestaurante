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
});

function mostrarPuntos(data){
    let puntos = document.getElementById("mostrarPuntos");
    puntos.innerHTML= '';
    let mostrar = document.createElement('span');
    mostrar.textContent = `Puntos acumulados: ${data}`;

    puntos.appendChild(mostrar);
}
