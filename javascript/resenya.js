document.addEventListener('DOMContentLoaded', function () {
    fetch('http://localhost/?controller=api&action=apiComentarios&accion=buscar_review')
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data)
            verComentarios(data);
        })
        .catch(error => console.error(error));
});


function verComentarios(comentarios) {
    let reseñasClientes = document.getElementById('container');
    console.log(reseñasClientes);

    comentarios.forEach(comentario => {
        let divComentarios = document.createElement('div');
        divComentarios.classList.add('col-12', 'col-md-6', 'col-lg-3', `valoracion-${comentario.valoracion}`);

        divComentarios.innerHTML = `
            <div class="mx-16 mb-12 mb-lg-0 mx-6 mx-lg-0">
                <div class="contenidoResenyas">
                    <p class="estrellas">${valoracionClientes(comentario.valoracion)}</p>
                    <p class="comentario"> ${comentario.resenya}</p>
                    <p class="nombre">${comentario.nombre}</p>
                </div>        
            </div>  
        `;

        reseñasClientes.appendChild(divComentarios);
    });
}

const valoracionClientes = (puntuacion) => {
    const numeros = '★'.repeat(puntuacion) + '☆'.repeat(5 - puntuacion);
    return `<span class="valoracion-${puntuacion}" style="color: var(--bg-col4);">${numeros}</span>`;
}

// Obté tots els elements del tipus checkbox amb la classe 'category-checkbox'
const categoryCheckboxes = document.querySelectorAll('.category-checkbox');

// Afegeix un esdeveniment 'change' a cada checkbox
categoryCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', updateReviews);
});

// Funció per actualitzar les ressenyes mostrades
// Funció per actualitzar les ressenyes mostrades
function updateReviews() {
    const selectedValoraciones = Array.from(categoryCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => `valoracion-${checkbox.value}`);

    const ordenSeleccionado = document.getElementById('orden').value;

    const allReviews = document.querySelectorAll('.col-lg-3');
 
    if (selectedValoraciones.length === 0) {
        allReviews.forEach(review => review.style.display = 'block');
    } else {
        allReviews.forEach(review => review.style.display = 'none');

        selectedValoraciones.forEach(valoracion => {
            const reviewsToShow = document.querySelectorAll(`.${valoracion}`);
            reviewsToShow.forEach(review => review.style.display = 'block');
        });
    }

    // Aplicar el orden ascendente o descendente
    const reviewsContainer = document.getElementById('container');
    const reviewsArray = Array.from(reviewsContainer.children);

    if (ordenSeleccionado === 'ascendente') {
        reviewsArray.sort((a, b) => a.textContent.localeCompare(b.textContent));
    } else {
        reviewsArray.sort((a, b) => b.textContent.localeCompare(a.textContent));
    }

    reviewsArray.forEach(review => reviewsContainer.appendChild(review));
}

const ordenSelector = document.getElementById('orden');
ordenSelector.addEventListener('change', updateReviews);
