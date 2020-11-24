let btnConnect = document.querySelector('.btn-website');
let modal = document.querySelector('.modal-bg');
let closeModal = document.querySelector('.close-modal');
let body = document.body;

btnConnect.addEventListener('click', function(){
    modal.classList.add('activate-modal');
    body.style.overflow = "hidden";
});

closeModal.addEventListener('click', function(){
    modal.classList.remove('activate-modal');
    body.style.overflow = "auto";
});