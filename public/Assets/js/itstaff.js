const body = document.querySelector("body"),
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

/*--------------------------ANNOUNCEMENT, EVENTS & REGISTRATION----------------------*/

const dropImg = document.getElementById("drop-img");
const inputFile = document.getElementById("input-file");
const imgView = document.getElementById("img-view");

inputFile.addEventListener("change", uploadImage);

function uploadImage(){
    let imgLink = URL.createObjectURL(inputFile.files[0]);
    imgView.style.backgroundImage = `url(${imgLink})`;
    imgView.style.textContent ="";
}

dropImg.addEventListener("dragover", function(e){
    e.preventDefault();
});
dropImg.addEventListener("drop", function(e){
    e.preventDefault();
    inputFile.files = e.dataTransfer.files;
    uploadImage();
});

/*-----------seearch bar---------- */
const searchInput = document.getElementById("searchInput");
const table = document.querySelectorAll(".table");

searchInput.addEventListener("input", () => {
    const searchTerm = searchInput.value.toLowerCase();

    table.forEach(table => {
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName("td");
            let found = false;

            for (let j = 0; j < cells.length; j++) {
                const cell = cells[j];

                if (cell.textContent.toLowerCase().includes(searchTerm)) {
                    found = true;
                    break;
                }
            }

            if (found) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    });
});
$(document).ready(function() {
    $(".profile-icon").click(function(e) {
        e.stopPropagation(); // Prevent closing the dropdown when clicking on the icon
        $(".profile-dropdown").toggle();
    });

    $(document).click(function() {
        $(".profile-dropdown").hide();
    });

    $(".profile-dropdown").click(function(e) {
        e.stopPropagation(); // Prevent closing when clicking inside the dropdown
    });
});
$(document).ready(function() {
    // Hide the name and submenus initially
    $(".sub-menus").hide();
    
    // Add a click event handler to the image
    $("i img").click(function() {
      // Toggle the visibility of the name and submenus
      $(".sub-menus").toggle();
    });
  });