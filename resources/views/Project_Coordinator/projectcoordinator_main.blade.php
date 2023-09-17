<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Project Coordinator</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Modal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Table -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- CSS link -->
    <link rel="stylesheet" href="{{ asset('Assets/css/coordinator.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/6297197d39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body class="announcement_events_inquiry">

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- Table -->
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>    
    <script src="{{ asset('Assets/js/coordinator.js') }}"></script>
    
    <script>
    //DROP IMAGE
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

</script>


<script>
    //POP UP
        function toggleStatus(button) {
            const row = button.parentNode.parentNode;
            const statusBox = row.querySelector('.status-box');
            const statusPopup = document.getElementById('statusPopup');
            const beneficiaryName = row.querySelector('td:nth-child(2)').textContent;

            if (statusBox.classList.contains('active')) {
                statusBox.classList.remove('active');
                statusBox.classList.add('inactive');
                statusBox.textContent = 'Inactive';
                statusBox.style.backgroundColor = 'red';
                statusPopup.textContent = beneficiaryName + ' is now Inactive';
            } else {
                statusBox.classList.remove('inactive');
                statusBox.classList.add('active');
                statusBox.textContent = 'Active';
                statusBox.style.backgroundColor = 'green';
                statusPopup.textContent = beneficiaryName + ' is now Active';
            }

            statusPopup.style.display = 'block';
            setTimeout(() => {
                statusPopup.style.display = 'none';
            }, 2000); 
        }
    </script>

<script>
        // JavaScript for pagination
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.querySelector('.table');
            const rows = table.querySelectorAll('tbody tr');
            const itemsPerPageSelect = document.getElementById('items-per-page');
            const prevPageButton = document.getElementById('prev-page');
            const nextPageButton = document.getElementById('next-page');
            let currentPage = 1;
            let itemsPerPage = parseInt(itemsPerPageSelect.value);
            
            function updatePagination() {
                const totalPages = Math.ceil(rows.length / itemsPerPage);
                if (currentPage === 1) {
                    prevPageButton.disabled = true;
                } else {
                    prevPageButton.disabled = false;
                }
                if (currentPage === totalPages) {
                    nextPageButton.disabled = true;
                } else {
                    nextPageButton.disabled = false;
                }
            }
            
            function displayRows() {
                const startIdx = (currentPage - 1) * itemsPerPage;
                const endIdx = startIdx + itemsPerPage;
                
                rows.forEach((row, index) => {
                    if (index >= startIdx && index < endIdx) {
                        row.style.display = 'table-row';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
            
            itemsPerPageSelect.addEventListener('change', function() {
    const selectedValue = itemsPerPageSelect.value;
    if (selectedValue === 'all') {
        itemsPerPage = rows.length;
    } else {
        itemsPerPage = parseInt(selectedValue);
    }
    currentPage = 1;
    displayRows();
    updatePagination();
    updatePaginationMessage();
});

                
        
    prevPageButton.addEventListener('click', function () {
        if (currentPage > 1) {
            const currentButton = document.querySelector(`#page-numbers button:nth-child(${currentPage})`);
            if (currentButton) {
                currentButton.classList.remove('current-page');
            }

        currentPage--;
        displayRows();
        updatePagination();
        updatePaginationMessage();

        const pageButton = document.querySelector(`#page-numbers button:nth-child(${currentPage})`);
        if (pageButton) {
            pageButton.classList.add('current-page');
        }

        // Disable the "Next" button if we are on the first page
        if (currentPage === 1) {
            prevPageButton.disabled = true;
            prevPageButton.classList.add('disabled');
        }

        // Enable the "Next" button
        nextPageButton.disabled = false;
        nextPageButton.classList.remove('disabled');
    }
});

nextPageButton.addEventListener('click', function () {
    const totalPages = Math.ceil(rows.length / itemsPerPage);
    if (currentPage < totalPages) {
        const currentButton = document.querySelector(`#page-numbers button:nth-child(${currentPage})`);
        if (currentButton) {
            currentButton.classList.remove('current-page');
        }

        currentPage++;
        displayRows();
        updatePagination();
        updatePaginationMessage();

        const pageButton = document.querySelector(`#page-numbers button:nth-child(${currentPage})`);
        if (pageButton) {
            pageButton.classList.add('current-page');
        }

        // Disable the "Previous" button if we are on the last page
        if (currentPage === totalPages) {
            nextPageButton.disabled = true;
            nextPageButton.classList.add('disabled');
        }

        // Enable the "Previous" button
        prevPageButton.disabled = false;
        prevPageButton.classList.remove('disabled');
    }
});

function updatePaginationMessage() {
    const totalPages = Math.ceil(rows.length / itemsPerPage);
    const startIndex = (currentPage - 1) * itemsPerPage + 1;
    const endIndex = Math.min(currentPage * itemsPerPage, rows.length);
    const entriesCount = rows.length;

    let message;

    if (itemsPerPage === rows.length) {
        message = `Showing all ${entriesCount} entries`;
    } else {
        if (endIndex > entriesCount) {
            message = `Showing ${startIndex}-${entriesCount} of ${entriesCount} entries`;
        } else {
            message = `Showing ${startIndex}-${endIndex} of ${entriesCount} entries`;
        }
    }

    document.getElementById('pagination-message').textContent = message;
}





        function updatePaginationButtons() {
    const totalPages = Math.ceil(rows.length / itemsPerPage);

    // Clear the page numbers div
    const pageNumbersDiv = document.getElementById('page-numbers');
    pageNumbersDiv.innerHTML = '';

    // Create and append page number buttons
    for (let page = 1; page <= totalPages; page++) {
        const pageButton = document.createElement('button');
        pageButton.textContent = page;

        if (page === currentPage) {
            // Highlight the current page button
            pageButton.classList.add('current-page');
        }

        pageButton.addEventListener('click', function () {
            if (page !== currentPage) {
                // Only update if the clicked page is different from the current page
                // Remove the highlight from the current page button
                const currentButton = pageNumbersDiv.querySelector('.current-page');
                if (currentButton) {
                    currentButton.classList.remove('current-page');
                }

                // Update the current page and re-render the table
                currentPage = page;
                displayRows();
                updatePagination();
                updatePaginationMessage();

                // Highlight the clicked page button
                pageButton.classList.add('current-page');
            }
        });

        pageNumbersDiv.appendChild(pageButton);
    }
}

            // Initialize pagination buttons
            updatePaginationButtons();
                // Update the pagination message initially
             updatePaginationMessage();
            
            // Initialize pagination
            displayRows();
            updatePagination();
        });

        
    </script>

<script>
    //IEW MODAL
  $(document).ready(function () {
    $(".view-btn").on("click", function () {
      // Get the row index from the clicked button's data attribute
      var rowIndex = $(this).data("row-index");

      // Find the row in the table and extract its data
      var $table = $("table");
      var $row = $table.find("tbody tr:eq(" + rowIndex + ")");
      var title = $row.find("td:eq(0)").text();
      var recipient = $row.find("td:eq(1)").text();
      var message = "The message goes here"; // You can populate the message as needed

      // Populate the modal with the extracted data
      $("#modal-title").text(title);
      $("#modal-recipient").text(recipient);
      $("#modal-message").text(message);

      // Show the modal
      $("#modal_view").modal("show");
    });
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //EDIT
  // Store the initial data from the table row
  var initialData = {
    title: "",
    recipient: "",
    message: ""
  };

  $(document).ready(function () {
    $(".view-btn").on("click", function () {
      // Get the row index from the clicked button's data attribute
      var rowIndex = $(this).data("row-index");

      // Find the row in the table and extract its data
      var $table = $("table");
      var $row = $table.find("tbody tr:eq(" + rowIndex + ")");
      initialData.title = $row.find("td:eq(0)").text();
      initialData.recipient = $row.find("td:eq(1)").text();
      initialData.message = "The message goes here"; // You can populate the message as needed

      // Populate the modal form fields with the extracted data
      $("#edit-title").val(initialData.title);
      $("#edit-recipient").val(initialData.recipient);
      $("#edit-message").val(initialData.message);

      // Show the modal
      $("#myModal").modal("show");
    });

    // Handle the "Save Changes" button click
    $("#saveChanges").on("click", function () {
      // Get the edited values from the form
      var editedTitle = $("#edit-title").val();
      var editedRecipient = $("#edit-recipient").val();
      var editedMessage = $("#edit-message").val();

      // Update the corresponding elements in the table with the edited values
      // This step depends on your specific implementation and requirements

      // Optionally, you can update the initialData to reflect the changes
      initialData.title = editedTitle;
      initialData.recipient = editedRecipient;
      initialData.message = editedMessage;
    });
  });
  </script>


</body>
</html>