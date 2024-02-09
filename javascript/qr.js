document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('qr').addEventListener('submit', function (event) {
        event.preventDefault(); // Evita que el formulario se envíe normalmente

        // Obtén el contenido que deseas en el código QR (en este caso, la URL)
        const url = 'http://localhost/?controller=producto&action=qr';

        // Genera el código QR en una nueva instancia de QRCode
        const qr = new QRCode(document.createElement('div'), {
            text: url,
            width: 300,
            height: 300,
        });

        // Crea una nueva ventana emergente y muestra el código QR
        const qrWindow = window.open('', 'Código QR', 'width=400,height=400');
        qrWindow.document.body.appendChild(qr._el);

        // Envía el formulario al backend para finalizar la compra
        this.submit();
    });
});