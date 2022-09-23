let input = document.querySelectorAll("input");
let message = document.querySelector("textarea");
let label = document.querySelectorAll("label");

var element='';
for (let i = 0; i < input.length; i++) {
    input[i].addEventListener("click", () => {
        for (let j = 0; j < label.length; j++) {
            if (i == j) {
                if (element != ''){
                element.classList.remove("focus");}
                label[j].classList.add("focus");
                element = label[j];
                console.log(label[i]);
            }
        }
    });
}

message.addEventListener("click", () => {
            for (let j = 0; j < label.length; j++) {
                    if (element != ''){
                    element.classList.remove("focus");}
                    label[3].classList.add("focus");
                    element = label[3];
                    console.log(label[3]);
                }
            
        });
    
