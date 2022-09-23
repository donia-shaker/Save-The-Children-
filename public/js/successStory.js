let storySlideIndex = 1;
showStorySlides(storySlideIndex);

function plusStorySlides(n) {
    showStorySlides((storySlideIndex += n));
}

function showStorySlides(n) {
    let i;
    let slides = document.getElementsByClassName("story-slides");
    if (n > slides.length) {
        storySlideIndex = 1;
    }
    if (n < 1) {
        storySlideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[storySlideIndex - 1].style.display = "block";
}