const backBtn = document.getElementById("backBtn");

backBtn.addEventListener("click", () => {
    history.back();
});


let generateDeleteUrl = (categoryId) => {
    const currentPage = window.location.pathname;
    let baseUrl = '';

    if (currentPage.includes('/vehicles')) {
        baseUrl = '/controllers/dashboard/vehicles/delete-ctrl.php';
    } else if (currentPage.includes('/categories')) {
        baseUrl = '/controllers/dashboard/categories/delete-ctrl.php';
    } 
    
    return baseUrl + '?id=' + categoryId;
}

document.addEventListener("DOMContentLoaded", () => {
    const deleteButtons = document.querySelectorAll('.formDelete');
    const modalTitle = document.querySelector('.modal-title.modalVehicle span'); 

    const deleteLink = document.querySelector('#modalDelete .deleteModalBtn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const categoryId = event.currentTarget.getAttribute('data-category-id');
            const categoryName = event.currentTarget.getAttribute('data-category-name');
            const vehicleModel = event.currentTarget.getAttribute('data-vehicle-model');

            if (window.location.pathname.includes('/vehicles')) {
                modalTitle.textContent = vehicleModel;
            } else if (window.location.pathname.includes('/categories')) {
                modalTitle.textContent = categoryName;
            }

            deleteLink.href = generateDeleteUrl(categoryId);
        });
    });
});

generateDeleteUrl()