// Hamburguer Menu Início
const hamburger = document.querySelector(".hamburger-menu");
const navLinks = document.querySelector(".nav-links-menu");
const links = document.querySelectorAll(".nav-links-menu li");

hamburger.addEventListener("click", () => {
  //Animate Links
  navLinks.classList.toggle("open");
  links.forEach((link) => {
    link.classList.toggle("fade");
  });

  //Hamburger Animation
  hamburger.classList.toggle("toggle");
});
// Hamburguer Menu Fim
