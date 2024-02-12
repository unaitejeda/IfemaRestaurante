// Seleccionar todos los checkboxes de categoría
const categoryCheckboxes = document.querySelectorAll('.category-checkbox');

// Agregar un evento de clic a cada checkbox para actualizar los productos mostrados
document.addEventListener('DOMContentLoaded', function () {
    const storedSelections = localStorage.getItem('selectedCategories');

    if (storedSelections) {
        const selectedCategories = storedSelections.split(',');
        selectedCategories.forEach(category => {
            const checkbox = document.querySelector(`.category-checkbox[value="${category}"]`);
            if (checkbox) {
                checkbox.checked = true;
            }
        });

        // Actualiza los productos basándose en las categorías seleccionadas almacenadas
        updateProducts();
    }
});

categoryCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('click', function () {
        updateProducts();

        // Almacena las categorías seleccionadas en localStorage
        const selectedCategories = Array.from(categoryCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        localStorage.setItem('selectedCategories', selectedCategories.join(','));
    });
});


function updateProducts() {
    const selectedCategories = Array.from(categoryCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    const allProducts = document.querySelectorAll('.col-12.col-md-6.col-lg-3');

    if (selectedCategories.length === 0) {
        allProducts.forEach(product => product.style.display = 'block');
    } else {
        allProducts.forEach(product => {
            const productCategory = product.getAttribute('selCategoria');
            const isVisible = selectedCategories.includes(productCategory);
            product.style.display = isVisible ? 'block' : 'none';
        });
    }
}

function resetFilters() {
    categoryCheckboxes.forEach(checkbox => checkbox.checked = false);
    updateProducts();

    // Elimina las categorías seleccionadas almacenadas en localStorage al restablecer los filtros
    localStorage.removeItem('selectedCategories');
}