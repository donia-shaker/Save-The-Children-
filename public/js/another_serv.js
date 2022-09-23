// other serv slider
var servSlideWrapper = document.getElementById("slides-wrapper");
// console.log(servSlideWrapper);
var servBox = document.querySelectorAll(".slides-wrapper .box");
servSlideWrapper.style.width = 'calc((320px *'+ (servBox.length + 1) +') - 60px)';
let i = 0;
function servNext(n) {
    if(i == servBox.length -1 ){
        i += n-1;

    }
    else if (i != (servBox.length - 3)) {
        i += n;
    }
    // console.log(i);
    let maxWidth = (320 *(servBox.length - 3  ) ) - 60;
    console.log(maxWidth);
    if ((320 * i) <=  maxWidth )
        servSlideWrapper.style.transform = "translateX(" + 320 * i + "px)";
    console.log("translateX(" + 320 * i + "px)");
    console.log({ item: servSlideWrapper.style.transform });
}

function servPrev(n) {
    if (i != 0) {
        i += n;
    }
    console.log(i);
    let maxWidth = (320 *(servBox.length - 3  ) ) - 60;
    if (
        servSlideWrapper.style.transform != "translateX(0px)" &&
        servSlideWrapper.style.transform != "" 
    ) {
        servSlideWrapper.style.transform = "translateX(" + 320 * i + "px)";

        // console.log("translateX(" +  320 * i  + "px )");
    }
}
