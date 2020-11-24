let btnConnect = document.querySelector('.btn-website');

btnConnect.addEventListener('click', function(){
    modal.classList.add('activate-modal')
});

closeModal.addEventListener('click', function(){
    modal.classList.remove('activate-modal')
});