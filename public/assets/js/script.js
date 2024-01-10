const backBtn = document.getElementById("backBtn");

backBtn.addEventListener('click', () => {
    history.back()
})

const formDelete = document.querySelectorAll('.formDelete');

formDelete.forEach(button => {
    button.addEventListener('click', (event) => {
        let page = event.target.search;
        let modal = document.getElementById('modal');
        
        console.log(modal);
    })
});

