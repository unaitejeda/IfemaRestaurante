document.addEventListener('DOMContentLoaded', function () {
    let idUser = document.getElementById('id_usuario').value;
    document.getElementById('botonConfirmar').addEventListener('click', function (event) {
  
      // Obtén el contenido que deseas en el código QR
      const url = 'http://localhost/?controller=producto&action=PaginaDetallesPedidoQR&ID='+idUser;
  
      // Genera el código QR en una nueva instancia de QRCode
      const qr = new QRCode(document.createElement('div'), {
        text: url,
        width: 300,
        height: 300,
      });
  
      // Crea una nueva ventana emergente con estilos y muestra el código QR
      const qrWindow = window.open('', 'Código QR', 'width=300,height=300');
      qrWindow.document.body.style.backgroundColor = '#f2f2f5';
      qrWindow.document.body.style.textAlign = 'center';
  
      // Agrega contenido personalizado a la ventana emergente
      qrWindow.document.body.innerHTML = `
        <h2 style="color: #171736;">Tu Código QR </h2>
        <p style="color: #171736;">Escanea el código QR en tu dispositivo movil o tablet para ver la infromación del pedido</p>
      `;
  
      // Agrega el código QR al contenido de la ventana emergente
      qrWindow.document.body.appendChild(qr._el);
  
    });
  });
