/* DataTable initialization */
$(document).ready(function() {
    new DataTable('#example');
});

/* Popup functionality */
const serviceItems = document.querySelector(".popup-content");
const popup = document.querySelector(".popup-box");
const popupCloseBtn = popup.querySelector(".popup-close-btn");
const popupCloseIcon = popup.querySelector(".popup-close-icon");

serviceItems.addEventListener("click", function(event) {
    if (event.target.tagName.toLowerCase() === "button") {
        const item = event.target.parentElement;
        const h3 = item.querySelector("h3").innerHTML;
        const readMoreCont = item.querySelector(".read-more-cont").innerHTML;
        popup.querySelector("h3").innerHTML = h3;
        popup.querySelector(".popup-body").innerHTML = readMoreCont;
        popupBox();
    }
});

popupCloseBtn.addEventListener("click", popupBox);
popupCloseIcon.addEventListener("click", popupBox);

popup.addEventListener("click", function(event) {
    if (event.target === popup) {
        popupBox();
    }
});

function popupBox() {
    popup.classList.toggle("open");
}

/* Other code for image upload and search bar remains the same */

/* Sidebar functionality */
$(document).ready(function() {
    // Your existing sidebar-related code here
});

/* Dropdown and profile icon functionality */
$(document).ready(function() {
    // Your existing code for dropdowns and profile icons here
});

/* Number styling */
const numbers = document.querySelectorAll('.number');

numbers.forEach(number => {
    const value = parseInt(number.textContent);

    if (value >= 1000) {
        number.classList.add('high');
    } else if (value >= 500) {
        number.classList.add('medium');
    } else {
        number.classList.add('low');
    }
});

const dropImg = document.getElementById("drop-img");
const inputFile = document.getElementById("input-file");
const imgView = document.getElementById("img-view");

inputFile.addEventListener("change", uploadImage);

function uploadImage(){
    let imgLink = URL.createObjectURL(inputFile.files[0]);
    imgView.style.backgroundImage = `url(${imgLink})`;
    imgView.textContent ="";
}

dropImg.addEventListener("dragover", function(e){
    e.preventDefault();
});
dropImg.addEventListener("drop", function(e){
    e.preventDefault();
    inputFile.files = e.dataTransfer.files;
    uploadImage();
});

/*const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})

function toggleNav() {
    const nav = document.querySelector('nav');
    nav.classList.toggle('open');
}

const numbers = document.querySelectorAll('.number');

numbers.forEach(number => {
    const value = parseInt(number.textContent);
    
    if (value >= 1000) {
        number.classList.add('high');
    } else if (value >= 500) {
        number.classList.add('medium');
    } else {
        number.classList.add('low');
    }
});
 */