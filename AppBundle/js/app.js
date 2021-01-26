const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.nav-menu');

menu.addEventListener('click',function (){
    menu.classList.toggle('is-active');
    menuLinks.classList.toggle('active');
})

window.onscroll = function () {
    myFunction()
};

// Get the navbar
var navbar = document.getElementById("nav-container");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}