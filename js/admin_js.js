function openNav() {
    document.getElementById("adminSidebar").style.width = "250px";
    document.getElementById("header").style.marginLeft = "250px";
    document.getElementById("mainBody").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("adminSidebar").style.width = "0";
    document.getElementById("header").style.marginLeft = "0";
    document.getElementById("mainBody").style.marginLeft = "0";

}

// calls the button
let mybutton = document.getElementById("topBtn");

// Shows the button when user scrolls 500 pixels from top of screen
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// function to scrolls to the top of the screen
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}