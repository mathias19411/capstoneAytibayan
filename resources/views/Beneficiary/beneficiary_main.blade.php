<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Beneficiary</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS link -->
        <link rel="stylesheet" href="{{ asset('Assets/css/beneficiary.css') }}">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous">
    </head>

    <body class="beneficiary">
        
        @yield('content')
        <script src="{{ asset('Assets/js/progress.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        <script src="{{ asset('Assets/js/beneficiary.js') }}"></script>
        <script>
            const updates = [
    {
        id: 1,
        date: '2023-09-22',
        picture: '/images/agri1.png',
        title: 'Update 1 title here.',
    },
    {
        id: 2,
        date: '2023-09-23',
        picture: '/images/agri2.png',
        title: 'Update 2 title here.',
    },
    {
        id: 3,
        date: '2023-09-23',
        picture: '/images/agri3.png',
        title: 'Update 2 title here.',
    },
    {
        id: 4,
        date: '2023-09-23',
        picture: '/images/agri4.png',
        title: 'Update 2 title here.',
    },
];

// Function to create an update card
function createUpdateCard(update) {
    const card = document.createElement("div");
    card.classList.add("card", "mb-3", "col-md-3"); // Apply Bootstrap grid classes

    // Create card body
    const cardBody = document.createElement("div");
    cardBody.classList.add("card-body");

    // Display date
    const dateElement = document.createElement("p");
    dateElement.classList.add("update-date");
    dateElement.innerText = `Date: ${update.date}`;
    cardBody.appendChild(dateElement);

    // Display picture (if provided)
    if (update.picture) {
        const pictureElement = document.createElement("img");
        pictureElement.src = update.picture;
        pictureElement.alt = "Beneficiary's Picture";
        pictureElement.classList.add("img-thumbnail"); // Add Bootstrap class for a smaller image
        cardBody.appendChild(pictureElement);
    }

    // Display title (limited to 50 words)
    const titleElement = document.createElement("p");
    titleElement.classList.add("update-title");
    titleElement.innerText = `Title: ${update.title}`;
    cardBody.appendChild(titleElement);

    // Create card footer for edit and delete buttons
    const cardFooter = document.createElement("div");
    cardFooter.classList.add("card-footer");

    // Create edit button with Bootstrap modal attributes
    const editButton = document.createElement("button");
    editButton.classList.add("btn", "btn-pink", "edit-update");
    editButton.innerHTML = '<i class="fa-solid fa-pen-to-square fa-lg" style="color: #58c0e2"></i>';

    // Add Bootstrap modal attributes to the "Edit" button
    editButton.setAttribute("data-bs-toggle", "modal");
    editButton.setAttribute("data-bs-target", "#editModal");

    // Attach the update data to the edit button as a dataset attribute
    editButton.dataset.updateId = update.id;

    editButton.addEventListener("click", () => {
        // Implement edit functionality here
        const editUpdateId = editButton.dataset.updateId;
        const selectedUpdate = updates.find((update) => update.id == editUpdateId);

        // Populate the edit modal with the selected update's data
        document.getElementById("edit-date").value = selectedUpdate.date;
        document.getElementById("edit-title").value = selectedUpdate.title;
        // You can handle the picture editing here as well
    });

    // Create delete button
    const deleteButton = document.createElement("button");
    deleteButton.classList.add("btn","btn-delete", "delete-update");
    deleteButton.innerHTML = '<i class="fa-solid fa-trash fa-lg" style="color:#ff1100"></i>';

    deleteButton.addEventListener("click", () => {
        // Implement delete functionality here
        const editUpdateId = editButton.dataset.updateId;
        const updateIndex = updates.findIndex((update) => update.id == editUpdateId);

        if (updateIndex !== -1) {
            // Remove the update from the updates array
            updates.splice(updateIndex, 1);

            // Remove the card from the UI
            card.remove();
        }
    });

    // Append edit and delete buttons to the card footer
    cardFooter.appendChild(editButton);
    cardFooter.appendChild(deleteButton);

    // Append card body and card footer to the card
    card.appendChild(cardBody);
    card.appendChild(cardFooter);

    return card;
}

// Function to display updates as cards
function displayUpdates() {
    const updateDetails = document.getElementById("update-details");

    // Clear existing update cards
    updateDetails.innerHTML = "";

    // Loop through updates and create cards
    updates.forEach((update) => {
        const updateCard = createUpdateCard(update);
        updateDetails.appendChild(updateCard);
    });
}

// Call the displayUpdates function initially to populate the update cards
displayUpdates();

// Function to update an existing update
function updateUpdate(updateId, newUpdateData) {
    const updateIndex = updates.findIndex((update) => update.id == updateId);

    if (updateIndex !== -1) {
        // Update the existing update with the new data
        updates[updateIndex] = { ...updates[updateIndex], ...newUpdateData };
    }
}

// Handle Save Changes button click in the modal
const editModalSaveButton = document.getElementById("edit");
editModalSaveButton.addEventListener("click", () => {
    const editUpdateId = editModalSaveButton.dataset.updateId;
    const newDate = document.getElementById("edit-date").value;
    const newTitle = document.getElementById("edit-title").value;

    // Update the existing update with the new data
    updateUpdate(editUpdateId, { date: newDate, title: newTitle });

    // Hide the edit modal
    const editModal = new bootstrap.Modal(document.getElementById("editModal"));
    editModal.hide();

    // Refresh the displayed updates
    displayUpdates();
});

// Add update functionality
const updateForm = document.getElementById("update-form");
updateForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const date = document.getElementById("date").value;
    const picture = document.getElementById("picture").files[0];
    const title = document.getElementById("title").value;

    if (!date || !title) {
        alert("Please fill in all fields.");
        return;
    }


});
        </script>
 
 <script>
    //DROP IMAGE
    const dropImg = document.getElementById("drop-img");
const inputFile = document.getElementById("edit-picture");
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

// Function to open the schedule modal
function openScheduleModal() {
    // Add your code to open the schedule modal here
    alert("Add Schedule button clicked!");
}

// Add an event listener to the "Add Schedule" button
const addScheduleButton = document.getElementById("add-schedule-button");
addScheduleButton.addEventListener("click", openScheduleModal);


</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const progressChart = document.getElementById("chart-fill");
    const progressNum = document.getElementById("progress-num");

    // Function to update the chart based on the selected progress number
    function updateChart(selectedPercent) {
        const percent = selectedPercent;
        progressChart.style.height = percent + "%";
    }

    // Add a click event listener to each progress number
    const progressNumbers = progressNum.getElementsByTagName("li");
    for (const number of progressNumbers) {
        number.addEventListener("click", function () {
            const selectedPercent = parseInt(number.getAttribute("data-percent"));
            updateChart(selectedPercent);
        });
    }
});

    </script>

<script>
    //PROGRESS BAB
    const one = document.querySelector(".one");

const two = document.querySelector(".two");

const three = document.querySelector(".three");

const four = document.querySelector(".four");

const five = document.querySelector(".five");


one.onclick = function() {

    one.classList.add("active");

    two.classList.remove("active");

    three.classList.remove("active");

    four.classList.remove("active");

    five.classList.remove("active");

}


two.onclick = function() {

    one.classList.add("active");

    two.classList.add("active");

    three.classList.remove("active");

    four.classList.remove("active");

    five.classList.remove("active");

}

three.onclick = function() {

    one.classList.add("active");

    two.classList.add("active");

    three.classList.add("active");

    four.classList.remove("active");

    five.classList.remove("active");

}

four.onclick = function() {

    one.classList.add("active");

    two.classList.add("active");

    three.classList.add("active");

    four.classList.add("active");

    five.classList.remove("active");

}

five.onclick = function() {

    one.classList.add("active");

    two.classList.add("active");

    three.classList.add("active");

    four.classList.add("active");

    five.classList.add("active");

}
    </script>

    <script>
        //CIRCLE CHART
            const numb = document.querySelector(".numb");
            let counter = 0;
            setInterval(()=>{
              if(counter == 100){
                clearInterval();
              }else{
                counter+=1;
                numb.textContent = counter + "%";
              }
            }, 80);
         </script>
    </body>
</html>