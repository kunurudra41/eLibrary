var coll = document.getElementById("req-expand");
var content = document.getElementById('expand');
coll.addEventListener("click",()=>{

if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }

});


const sidebarBtn = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("aside");
const nav=document.getElementById('nav');

sidebarBtn.addEventListener("click", () => {
  if(nav.classList.contains("active"))
  {
      nav.classList.remove("active");
  }
  else{
        nav.classList.add("active");
  }
});

function formsubmit(){
      const form= document.getElementById("bookentryform");
  form.submit();
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
