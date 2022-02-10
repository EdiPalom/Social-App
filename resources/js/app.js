require('./bootstrap');


// Use a component framework

// let error_alert = document.querySelector('#error');

// error_alert.addEventListener('click',()=>{
//     this.style.display = "none";
// })


let create = document.querySelector('#create__button');
let form = document.querySelector('#post-form');

let image = document.querySelector('#form--image');
let link = document.querySelector('#form--link');

let button_link = document.querySelector('#button--link');
let button_land = document.querySelector('#button--land');

let close = document.querySelector('#form-close');

create.addEventListener('click',()=>{
    create.style.display = "none";
    form.style.display = "flex";     
});

button_link.addEventListener('click',()=>{
    event.preventDefault();
    button_link.style.display = "none";
    link.style.display = "flex";
    link.style.flexDirection = "column";
});

button_land.addEventListener('click',()=>{
    event.preventDefault();
    button_land.style.display = "none";
    image.style.display = "flex";
});

close.addEventListener('click',()=>{
    form.style.display = "none";
    create.style.display = "inline-block";
    image.style.display = "none";
    button_link.style.display = "inline-block";
    link.style.display = "none";
    button_land.style.display = "inline-block";
});


