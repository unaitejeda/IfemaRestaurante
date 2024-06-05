// gananciaRepartidor.js

function mostrarGananciaRepartidor() {
    var checkbox = document.getElementById('esPedido');
    var gananciaRepartidor = document.getElementById('gananciaRepartidor');
    if (checkbox.checked) {
        gananciaRepartidor.style.display = 'block';
    } else {
        gananciaRepartidor.style.display = 'none';
    }
}
