
let figures = document.querySelectorAll(".unique-img");
let closeBtns = document.querySelectorAll(".close-btn");
const fileField = document.querySelector('input[type="file"]');
const submitBtn = document.querySelector('button[type="submit"]');
const formElement = document.querySelector(".forminput");

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
formElement.addEventListener("submit", (e) => {
    // console.log(e);
    e.preventDefault();
    console.log(fileField.files[0]);
    console.log(typeof fileField.files[0]);
    console.log(fileField);
    // console.log(formElement);
    
    const formData = new FormData(formElement);
    formData.append('photo', fileField.files[0]);
    // console.log(JSON.stringify(formData));
    console.log(formData);
    fetch("gallery.php",{
        method: 'POST',
        body: JSON.stringify(formData),
        headers: {
            'Content-Type': 'multipart/form-data'
          },
    })
    .then(response => {
        console.log(response);
        return response.url;
    })
    .then(result => {
        console.log('Success: ', result);
        // window.location(result.url);
    })
    .catch(err => {
        console.error('Error: ', err);
    });
})
// window.onload(e => {
//     console.log(e);
// })