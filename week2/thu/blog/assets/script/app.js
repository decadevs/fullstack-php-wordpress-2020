// var commentForm = document.querySelector('.post-comment');
// var commentSummary = document.querySelector('#comment-id');

// commentSummary.onclick = function () {
//     commentForm.style.display = "block";
// }

var modalBtn = document.querySelector('.login-modal');
var modalBg = document.querySelector('.modal-bg');
var modalClose = document.querySelector('.modal-close');

modalBtn.addEventListener('click', function() {
    modalBg.classList.add('bg-active');
});

modalClose.addEventListener('click', function() {
    modalBg.classList.remove('bg-active');
})