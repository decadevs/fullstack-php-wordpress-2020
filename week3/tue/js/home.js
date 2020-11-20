var btnTable = document.querySelector('.btn-table');
let modal = document.querySelector('.modal-bg');
let closeModal = document.querySelector('.close-modal');

btnTable.addEventListener('click', function(){
    modal.classList.add('activate-modal');
})

closeModal.addEventListener('click', function(){
    modal.classList.remove('activate-modal');
})