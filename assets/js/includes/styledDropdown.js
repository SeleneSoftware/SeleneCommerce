const selectEls = document.querySelectorAll(".styled-drop-down");

selectEls.forEach((selectEl) => {
    new Dropkick(selectEl);
});
