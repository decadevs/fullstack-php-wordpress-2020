/**
 * Created by hp on 11/9/2020.
 */

let imgModels = document.querySelectorAll(".contentwrapper");
let pixModal = document.querySelector("#staticBackdrop");
let textPix = document.querySelector(".pixText");
let modalImg = document.querySelector(".pix")
imgModels.forEach(image => {
        image.addEventListener("click", () => {
             //alert(image.id);
             textPix.innerHTML = image.childNodes[1].innerHTML;
             let strPath = image.firstChild.firstChild.src;
             let imgName = strPath.slice(strPath.lastIndexOf("/") + 1);
             modalImg.src = "photos/" + imgName;
             //Display modal to show photo
             $('#staticBackdrop').modal('show');
        })
})







