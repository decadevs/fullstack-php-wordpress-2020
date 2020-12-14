const hamburger = document.querySelector(".hambuger");
const hamburgerContainer = document.querySelector(".hamburgerCover");

const navlinks = document.querySelector(".nav-links");

hamburgerContainer.addEventListener("click", e => {
  navlinks.classList.toggle("show");
  hamburgerContainer.classList.toggle("open");
});

