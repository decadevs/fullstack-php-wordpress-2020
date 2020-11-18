// var commentForm = document.querySelector('.post-comment');
// var commentSummary = document.querySelector('#comment-id');

// commentSummary.onclick = function () {
//     commentForm.style.display = "block";
// }

var loginBtn = document.querySelector('#login-modal');
var modalBg = document.querySelector('.modal-bg');
var modalClose = document.querySelector('.modal-close');

var joinBtn = document.querySelector('#join-modal');
var modalBg2 = document.querySelector('.modal-bg2');
var modalClose2 = document.querySelector('.modal-close2');

loginBtn.addEventListener('click', function() {
    modalBg.classList.add('bg-active');
});

modalClose.addEventListener('click', function() {
    modalBg.classList.remove('bg-active');
})


joinBtn.addEventListener('click', function() {
    modalBg2.classList.add('bg-active');
});

modalClose2.addEventListener('click', function() {
    modalBg2.classList.remove('bg-active');
})