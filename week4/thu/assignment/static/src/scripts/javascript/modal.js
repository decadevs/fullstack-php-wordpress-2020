const addButton = document.querySelector(".btn-table");
const modalClose = document.querySelector(".modal-close");
const modal = document.querySelector(".modal-bg");

addButton.addEventListener('click', () => {
    modal.style.visibility = 'visible';   
})


modalClose.addEventListener('click', () => {
  modal.style.visibility = 'hidden';
})