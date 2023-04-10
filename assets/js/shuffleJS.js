const grid = document.querySelector(".grid");
const shuffleInstance = new Shuffle(grid, {
    itemSelector: ".grid-item",
    sizer: ".grid-sizer",
});

const filterButtons = document.querySelectorAll(".filter-button");
filterButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        const filterValue = event.currentTarget.dataset.filter;
        shuffleInstance.filter(filterValue);
    });
});

const sortButtons = document.querySelectorAll(".sort-button");
sortButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        const sortValue = event.currentTarget.dataset.sortBy;
        const isAscending = sortValue === "default" ? true : false;
        shuffleInstance.sort({
            by: (element) => {
                return element.getAttribute(`data-${sortValue}`);
            },
            reverse: isAscending,
        });
    });
});
