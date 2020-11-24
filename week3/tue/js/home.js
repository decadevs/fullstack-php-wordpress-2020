let btnTable = document.querySelector('.btn-table');
let btnConnect = document.querySelector('.btn-website')
let modal = document.querySelector('.modal-bg');
let closeModal = document.querySelector('.close-modal');

btnTable.addEventListener('click', function(){
    modal.classList.add('activate-modal');
})

btnConnect.addEventListener('click', function(){
    modal.classList.add('activate-modal');
})

closeModal.addEventListener('click', function(){
    modal.classList.remove('activate-modal');
})