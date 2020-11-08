
let figures = document.querySelectorAll(".unique-img");
let closeBtns = document.querySelectorAll(".close-btn");

figures.forEach((figure,idx) => {
    figure.addEventListener("click", (e) => {
        console.log("You tapped me");
        console.log(e.target.parentElement.nextElementSibling);
        e.target.parentElement.nextElementSibling.classList.add("show");
    });
    closeBtns[idx].addEventListener("click", (e) => {
        console.log(figure.nextElementSibling);
        figure.nextElementSibling.classList.remove("show");
    });

});
