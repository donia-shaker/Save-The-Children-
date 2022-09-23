// Application Slider
var slideIndex;

function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    let sliders = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (let i = 0; i < sliders.length; i++) {
        sliders[i].classList.remove("main-position");
        sliders[i].classList.add("seconed-position");
        dots[i].className = dots[i].className.replace(" active", "");
        // console.log(sliders[i].classList)
    }
    sliders[slideIndex - 1].classList.remove("seconed-position");
    sliders[slideIndex - 1].classList.add("main-position");
    dots[slideIndex - 1].className += " active";
}

// Services Slider
let box = document.querySelectorAll(".service .slider-wrapper .box");
let servicesDots = document.getElementsByClassName("ServicesDot");

let index = 0;

// for(let i=0 ; i < box.length;i++){
//     console.log(box[i]);
// };
function next() {
    box[index].classList.remove("active");
    servicesDots[index].classList.remove("active");
    index = (index + 1) % box.length;
    box[index].classList.add("active");
    servicesDots[index].classList.add("active");
}

function prev() {
    box[index].classList.remove("active");
    servicesDots[index].classList.remove("active");
    index = (index - 1 + box.length) % box.length;
    box[index].classList.add("active");
    servicesDots[index].classList.add("active");
}

function currentservicesSlide(n) {
    box[index].classList.remove("active");
    servicesDots[index].classList.remove("active");
    index = n - 1;
    box[index].classList.add("active");
    servicesDots[index].classList.add("active");
}

