var modalBtn = document.querySelector('.modal-btn');
var modalBg = document.querySelector('.modal');
var modalClose = document.querySelector('.modal-close');

modalBtn.addEventListener('click', function() {
    modalBg.style.display = "block";
});

modalClose.addEventListener('click', function() {
    modalBg.style.display = "none";
});