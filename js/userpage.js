var coll = document.getElementsByClassName("cards1");
for (var i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}
function formsubmit(){
    const form= document.getElementById("passwordchange");
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