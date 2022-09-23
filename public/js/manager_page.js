let column = document.querySelectorAll('.col');
// console.log(column);
column.forEach(element => {
    element.innerHTML += element.innerHTML;
});