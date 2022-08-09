import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
const hamburger_menu = document.querySelector(".hamburger-menu");
const container = document.querySelector(".container");
const main_container=document.querySelector(".main-container");


hamburger_menu.addEventListener("click", () => {
  container.classList.toggle("active");
  main_container.classList.toggle("hide");
});