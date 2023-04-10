// Get all the slide elements and store them in an array
const slides = Array.from(document.querySelectorAll(".slides li"));

// Set the current slide index to 0
let currentSlideIndex = 0;

// Set the time interval between slide transitions
const slideInterval = 5000; // 5 seconds

// Set the function to transition to the next slide
function transitionToNextSlide() {
    // Hide the current slide
    slides[currentSlideIndex].classList.remove("active");

    // Move to the next slide
    currentSlideIndex++;

    // If we've reached the end of the slides, loop back to the beginning
    if (currentSlideIndex >= slides.length) {
        currentSlideIndex = 0;
    }

    // Show the next slide
    slides[currentSlideIndex].classList.add("active");
}

// Start the slideshow
setInterval(transitionToNextSlide, slideInterval);
