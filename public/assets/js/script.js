const backBtn = document.getElementById("backBtn");

backBtn.addEventListener("click", () => {
    history.back();
});

// document.addEventListener("DOMContentLoaded", () => {
//     const deleteButtons = document.querySelectorAll('.formDelete');
//     const modalTitle = document.querySelector('#modalDelete .modal-title span');
//     const deleteLink = document.querySelector('#modalDelete .deleteModalBtn');

//     deleteButtons.forEach(button => {
//         button.addEventListener('click', (event) => {
//             const categoryId = event.currentTarget.getAttribute('data-category-id');
//             const categoryName = event.currentTarget.getAttribute('data-category-name');
//             modalTitle.textContent = categoryName;
//             deleteLink.href = '/controllers/dashboard/categories/delete-ctrl.php?id=' + categoryId;
//         });
//     });
// });

function generateDeleteUrl(categoryId) {
    const currentPage = window.location.pathname;

    // Ici, vous définirez la logique pour choisir la bonne URL de base
    // en fonction de la valeur de `currentPage`.
    if (currentPage.includes('/vehicles')) {
        baseUrl = '/controllers/dashboard/vehicles/delete-vehicle-ctrl.php';
    } else if (currentPage.includes('/categories')) {
        baseUrl = '/controllers/dashboard/categories/delete-ctrl.php';
    } // Ajoutez d'autres conditions ici si nécessaire

    return baseUrl + '?id=' + categoryId;
}

document.addEventListener("DOMContentLoaded", () => {
    const deleteButtons = document.querySelectorAll('.formDelete');
    const modalTitle = document.querySelector('#modalDelete .modal-title span');
    const deleteLink = document.querySelector('#modalDelete .deleteModalBtn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const categoryId = event.currentTarget.getAttribute('data-category-id');
            const categoryName = event.currentTarget.getAttribute('data-category-name');
            modalTitle.textContent = categoryName;
            deleteLink.href = generateDeleteUrl(categoryId);
        });
    });
});
console.log(generateDeleteUrl());