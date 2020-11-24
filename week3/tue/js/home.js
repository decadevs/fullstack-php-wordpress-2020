let btnTable = document.querySelector('.btn-table');
let modal = document.querySelector('.modal-bg');
let closeModal = document.querySelector('.close-modal');
let body = document.body;

btnTable.addEventListener('click', function(){
    modal.classList.add('activate-modal');
    body.style.overflow = "hidden";
})



closeModal.addEventListener('click', function(){
    modal.classList.remove('activate-modal');
    body.style.overflow = "auto";
})