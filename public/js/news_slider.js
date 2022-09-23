// news slider
var newsSlideWrapper = document.getElementById("news-boxes");
var newsBox = document.querySelectorAll(".news .slide-wrapper .box");
var container = document.querySelector(".news .slide-wrapper");
newsSlideWrapper.style.width = 390 * newsBox.length + (newsBox.length - 1) * 50 + "px";
var width = 390 * newsBox.length + (newsBox.length - 1) * 50;
var initWidth = container.offsetWidth;
let i = 0;

function newsNext(n) {
    if (i == 0) {
        i += 1;
    }
    console.log(i);
    console.log('init = '+initWidth);
    console.log('all_boxes = '+width);
    if (initWidth <  width ) {
        newsSlideWrapper.style.transform = "translateX(" + 440 * i + "px)";
        i += n;
        initWidth += 440;
    }

    console.log({ item: newsSlideWrapper.style.transform });
}

function newsPrev(n) {
    if (i != 0) {
        i += n;
    }
    console.log(i);
    console.log(initWidth);
    // let maxWidth = -420 * (newsBox.length -1 ) + "px";
    if (
        initWidth != newsSlideWrapper.style.width &&
        newsSlideWrapper.style.transform != `translateX(0px)` &&
        newsSlideWrapper.style.transform != ""
    ) {
        // if (i == 0)
        // newsSlideWrapper.style.transform =
        // "translateX(" + (420 * (i + 1) - 420) + "px)";
        // else
        //     newsSlideWrapper.style.transform =
        //         "translateX(" + (420 * i - 420) + "px)";
        newsSlideWrapper.style.transform =
            "translateX(" + (440 * i - 440) + "px)";
        initWidth -= 440;
        
        console.log(newsSlideWrapper.style.transform);
    }
}
