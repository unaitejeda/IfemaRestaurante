// Seleccionar todos los checkboxes de categoría
const categoryCheckboxes = document.querySelectorAll('.category-checkbox');

// Agregar un evento de clic a cada checkbox para actualizar los productos mostrados
categoryCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('click', updateProducts);
});

// Función para actualizar los productos mostrados según las categorías seleccionadas
function updateProducts() {
    // Obtener las categorías seleccionadas
    const selectedCategorias = Array.from(categoryCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    // Seleccionar todos los elementos de producto
    const allProducts = document.querySelectorAll('.col-12.col-md-6.col-lg-3');

    // Mostrar u ocultar productos según las categorías seleccionadas
    if (selectedCategorias.length === 0) {
        // Si no se ha seleccionado ninguna categoría, mostrar todos los productos
        allProducts.forEach(product => product.style.display = 'block');
    } else {
        // Si se han seleccionado categorías, mostrar solo los productos de esas categorías
        allProducts.forEach(product => {
            const categoriaProducto = product.getAttribute('selCategoria');
            const isVisible = selectedCategorias.includes(categoriaProducto);
            product.style.display = isVisible ? 'block' : 'none';
        });
    }
}

// Función para restablecer todos los filtros (deseleccionar todas las categorías)
function resetFilters() {
    categoryCheckboxes.forEach(checkbox => checkbox.checked = false);
    updateProducts(); // Actualizar los productos para mostrar todos nuevamente
}
