const categoryCheckboxes = document.querySelectorAll('.category-checkbox');

categoryCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('click', updateProducts);
});

function updateProducts() {
    const selectedCategorias = Array.from(categoryCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    const allProducts = document.querySelectorAll('.col-12.col-lg-3');

    if (selectedCategorias.length === 0) {
        allProducts.forEach(product => product.style.display = 'block');
    } else {
        allProducts.forEach(product => {
            const categoriaProducto = product.getAttribute('data-categoria');
            const isVisible = selectedCategorias.includes(categoriaProducto);
            product.style.display = isVisible ? 'block' : 'none';
        });
    }
}

function resetFilters() {
    categoryCheckboxes.forEach(checkbox => checkbox.checked = false);
    updateProducts();
}