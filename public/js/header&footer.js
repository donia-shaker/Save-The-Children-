function showNav() {
var minu = document.getElementById("minu");
// if (minu.className === "minu") {
//     minu.className += " rotate";
//   } else {
//     minu.className = "minu";
//   }
var list = document.getElementById("main-list");
    if (list.className === "main-list") {
      list.className += " responsive";
      minu.className += " rotate";

    } else {
      list.className = "main-list";
    minu.className = "minu";

    }
  }