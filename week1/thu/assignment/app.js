var images = document.querySelectorAll('.child');
var modal = document.querySelector('#myModal');
// the image in the modal
var modalImg = document.querySelector('#img01');
// the caption in the modal
var captionText = document.querySelector("#caption");

for (var i = 0; i < images.length; i++) {
    var img = images[i];
    // Attach click event listener for each image
    img.onclick = function (event) {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
}

var span = document.querySelector('.modal-close');

span.onclick = function () {
    modal.style.display = "none";
}