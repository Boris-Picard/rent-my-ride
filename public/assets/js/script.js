const backBtn = document.getElementById("backBtn");

backBtn.addEventListener('click', () => {
    history.back()
})

const formDelete = document.querySelectorAll('.formDelete');


formDelete.forEach(button => {
    button.addEventListener('click', () => {
        console.log(button.urlParams.get);
    })
});
