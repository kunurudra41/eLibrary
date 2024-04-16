const sidebarBtn = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("aside");

sidebarBtn.addEventListener("click", () => {
  document.body.classList.toggle("active");
});

function formsubmit(){
      const form= document.getElementById("bookentryform");
  form.submit();
}