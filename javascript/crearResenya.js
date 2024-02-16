document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('comentarioForm').addEventListener('submit', function (event) {
        event.preventDefault();

        let id_usuario = document.getElementById('id_usuario').value;
        let resenya = document.getElementById('resenya').value;
        let valoracion = document.getElementById('valoracion').value;
        let id_pedido = document.getElementById('id_pedido').value;

        let data = {
            id_usuario: id_usuario,
            resenya: resenya,
            valoracion: valoracion,
            id_pedido: id_pedido
        };

        fetch('http://localhost/?controller=api&action=apiComentarios&accion=insertar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);

                // Vaciar los campos del formulario
                document.getElementById('resenya').value = "";
                document.getElementById('valoracion').value = "";

                // Mostrar notificación de éxito con Notie.js
                notie.alert({
                    type: 'success',
                    text: '¡Reseña enviada con éxito!',
                    time: 3 // Duración en segundos
                });

                // Redirigir al usuario a otra página después de 3 segundos
                setTimeout(function () {
                    window.location.href = 'http://localhost/?controller=reseñas&action=reseñas'; 
                }, 3000); // 3000 milisegundos = 3 segundos


            })
            .catch(error => console.error(error));
    });
});