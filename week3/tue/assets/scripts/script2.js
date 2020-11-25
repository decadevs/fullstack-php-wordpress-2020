const overlay = document.getElementById('overlay-connect');
const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget)
        openModal(modal)
    })
})

closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = button.closest('.modal-connect'); //select parent element html
        closeModal(modal)
    })
})

overlay.addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal-connect.active')
    modals.forEach(modal => {
        closeModal(modal)
    })
})

function openModal(modal){
    // if(modal == null){
    //     return
    // }
    if(modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
}

function closeModal(modal){
    // if(modal == null){
    //     return
    // }
    if(modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
}