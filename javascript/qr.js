document.addEventListener('DOMContentLoaded', function () {
    let idUser = document.getElementById('ID').ariaValueMax;
    document.getElementById('btnFinalizar').addEventListener('click', function (event) {
  
      // Obtén el contenido que deseas en el código QR (en este caso, la URL)
      const url = 'http://localhost/?controller=producto&action=qr&ID='+idUser;
  
      // Genera el código QR en una nueva instancia de QRCode
      const qr = new QRCode(document.createElement('div'), {
        text: url,
        width: 300,
        height: 300,
      });
  
      // Crea una nueva ventana emergente con estilos y muestra el código QR
      const qrWindow = window.open('', 'Código QR', 'width=400,height=400');
      qrWindow.document.body.style.backgroundColor = '#f0f0f0';
      qrWindow.document.body.style.textAlign = 'center';
  
      // Agrega contenido personalizado a la ventana emergente
      qrWindow.document.body.innerHTML = `
        <h2 style="color: #333;">Código QR Generado</h2>
        <p>Escanea el código QR con tu dispositivo</p>
      `;
  
      // Agrega el código QR al contenido de la ventana emergente
      qrWindow.document.body.appendChild(qr._el);
  
    });
  });



// document.addEventListener('DOMContentLoaded', function () {
//     document.getElementById('qr').addEventListener('submit', function (event) {
//         event.preventDefault(); // Evita que el formulario se envíe normalmente

//         // Obtén el contenido que deseas en el código QR (en este caso, la URL)
//         const url = 'http://localhost/?controller=producto&action=qr';
//         // Genera el código QR en una nueva instancia de QRCode
//         const qr = new QRCode(document.createElement('div'), {
//             text: url,
//             width: 300,
//             height: 300,
//         });

//         // Crea una nueva ventana emergente y muestra el código QR
//         const qrWindow = window.open('', 'Código QR', 'width=400,height=400');
//         qrWindow.document.body.appendChild(qr._el);

//         // Envía el formulario al backend para finalizar la compra
//         this.submit();
//     });
// });




// document.addEventListener('DOMContentLoaded', function () {
//     obtenerDatosPedidos();
// });

// function obtenerDatosPedidos(){
//     fetch(`http://localhost/?controller=api&action=obtenerPedido`)

//     .then(response => response.json())

//     .then(datosPedido =>{

//         generarQR(datosPedido);
//     })
// }

// function generarQR(datosPedido){

//     let datosPedidoQR = `Id: ${datosPedido.id} Hora: ${datosPedido.hora} Total: ${datosPedido.total}`;

//     let contenedorQR = document.getElementById('contenedorQR');

//     let nuevoQR = new QRCode(contenedorQR, {
//         text: datosPedidoQR,
//         width: 300,
//         height: 300,
//     });
// }