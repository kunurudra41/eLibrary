   // Get the button element
let mybutton = document.getElementById("myBtn");

// Show or hide the button based on scroll position
window.onscroll = function() {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// Scroll to the top of the document when the button is clicked
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
}

const openButton = document.getElementById('openPopup');
const overlay = document.getElementById('overlay');
const popup = document.getElementById('popup');
const closeButton = document.getElementById('closePopup');

// Show popup and overlay when button is clicked
openButton.addEventListener('click', () => {
    overlay.classList.remove('hidden');
    popup.classList.remove('hidden');
});

// Close popup when close button is clicked
closeButton.addEventListener('click', () => {
    overlay.classList.add('hidden');
    popup.classList.add('hidden');
});

// Close popup when user clicks outside the popup area
overlay.addEventListener('click', () => {
    overlay.classList.add('hidden');
    popup.classList.add('hidden');
});

//nav-bar
        document.addEventListener('DOMContentLoaded', (event) => {
    const menuIcon = document.getElementById('menu-icon');
    const divLinks = document.getElementById('div-links');

    menuIcon.addEventListener('click', () => {
        divLinks.classList.toggle('show');
    });
});

