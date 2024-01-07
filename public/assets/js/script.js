const backBtn = document.getElementById("backBtn");

backBtn.addEventListener('click', () => {
    history.back()
})

// MODAL
// const open = document.querySelectorAll('.open');
// const modalContainer = document.querySelectorAll('.modalContainer');
// const close = document.querySelectorAll('.close');

// open.forEach((button, index) => {
//     button.addEventListener('click', () => {
//         modalContainer[index].classList.add('show');
//     });
// });

// close.forEach(element => {
//     element.addEventListener('click', () => {
//         element.closest('.modalContainer').classList.remove('show'); 
//     })
// });