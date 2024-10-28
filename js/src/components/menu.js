const menu = document.querySelector(".menu");
const body = document.body;
const hamburger = document.querySelector(".hamburger");
const hamburgerIcon = document.querySelector(".hamburger__icon");
const headerContainer = document.querySelector(".header__container");
const header = document.querySelector(".header__container-top");

hamburger.addEventListener("click", function () {
  if (hamburger.classList.contains("open")) {
    hamburger.classList.remove("open");
    hamburgerIcon.classList.remove("open");
    menu.classList.remove("open");
    menu.classList.add("close");
    body.classList.remove("open");
    headerContainer.classList.remove("open");
    header.style.display = "flex";
  } else {
    hamburger.classList.add("open");
    hamburgerIcon.classList.add("open");
    menu.classList.remove("close");
    menu.classList.add("open");
    body.classList.add("open");
    headerContainer.classList.add("open");
    header.style.display = "none";
  }
});
