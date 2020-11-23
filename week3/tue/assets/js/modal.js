const addbtn = document.querySelector(".btn-table");
const close = document.querySelector(".close");
const overlay = document.querySelector(".modal-overlay");
const modal = document.querySelector(".modal");

addbtn.addEventListener('click', () => {
    overlay.style.visibility = 'visible';
    modal.style.display = 'flex';
})


close.addEventListener('click', () => {
    overlay.style.visibility = 'hidden';
    modal.style.display = 'none';
})