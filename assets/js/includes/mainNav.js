const toggleNavEl = document.querySelector(".toggle-nav");

const mainNavEl = document.querySelector(".main-nav");
const headerControlsEl = document.querySelector(".header-controls");

toggleNavEl.addEventListener("click", function (e) {
    mainNavEl.classList.toggle("slideToggle");
    headerControlsEl.classList.toggle("slideToggle");
    e.preventDefault();
});
