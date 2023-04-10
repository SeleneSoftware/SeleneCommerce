var revealSearch = document.getElementsByClassName("reveal-search")[0];

revealSearch.click(function (e) {
    document
        .getElementsByClass("search-wrapper")[0]
        .classList.add("show-search");
    document.querySelector(".search-form input[type='text']").focus();
    e.preventDefault();
});

document.body.addEventListener("keydown", function (event) {
    if (event.which == 27) {
        var searchWrapper = document.querySelector(".search-wrapper");
        searchWrapper.classList.remove("show-search");
    }
});
