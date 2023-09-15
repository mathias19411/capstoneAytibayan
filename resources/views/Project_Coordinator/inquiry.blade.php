<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font-Awesome Link -->
    <script src="https://kit.fontawesome.com/b530089f5c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('Assets/css/coordinator.css') }}">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body class="announcement_events_inquiry">

    @include('Project_coordinator.Body.sidebarproj')

    <div class="title">
        <h1>Inquiry</h1>
    </div>
    <div class="table-header">
        <div class="table-header-left">
            <label for="unread-filter">Filter: </label>
            <select id="unread-filter">
                <option value="all">All</option>
                <option value="unread">Read</option>
                <option value="read">Unread</option>
            </select>
            <label for="items-per-page">Items per page: </label>
            <select id="items-per-page">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="all">All</option>
            </select>
        </div>
        <div class="table-header-right">
            <div class="search-container">
                <input type="text" id="search" placeholder="Search">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>
    </div>


    <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Message</th>
                            <th>Email Address</Address></th>
                            <th>Contact Number</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Joriza Oliva</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>jorizaoliva@gmail.com</td>
                            <td>09772703763</td>
                            <td>2023-09-21</td>
                            <td>
                           <!-- Sample "View Message" button -->
                            <button class="tooltip-button" data-tooltip="View Message" onclick="openPopup('Joriza Oliva', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishingLorem ipsum is placeholder text commonly used in the graphic, print, and publishing', 'jorizaoliva@gmail.com', '09772703763', '2023-09-01')">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Joriza Oliva</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>jorizaoliva@gmail.com</td>
                            <td>09772703763</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View Message" onclick="openPopup('Joriza Oliva', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishingLorem ipsum is placeholder text commonly used in the graphic, print, and publishing', 'jorizaoliva@gmail.com', '09772703763', '2023-09-01')">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>       
                        <tr>
                            <td>Joriza Oliva</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>jorizaoliva@gmail.com</td>
                            <td>09772703763</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View Message" onclick="openPopup('Joriza Oliva', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishingLorem ipsum is placeholder text commonly used in the graphic, print, and publishing', 'jorizaoliva@gmail.com', '09772703763', '2023-09-01')">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Joriza Oliva</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>jorizaoliva@gmail.com</td>
                            <td>09772703763</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View Message" onclick="openPopup('Joriza Oliva', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishingLorem ipsum is placeholder text commonly used in the graphic, print, and publishing', 'jorizaoliva@gmail.com', '09772703763', '2023-09-01')">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Joriza Oliva</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>jorizaoliva@gmail.com</td>
                            <td>09772703763</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View Message" onclick="openPopup('Joriza Oliva', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishingLorem ipsum is placeholder text commonly used in the graphic, print, and publishing', 'jorizaoliva@gmail.com', '09772703763', '2023-09-01')">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Joriza Oliva</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>jorizaoliva@gmail.com</td>
                            <td>09772703763</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View Message" onclick="openPopup('Joriza Oliva', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishingLorem ipsum is placeholder text commonly used in the graphic, print, and publishing', 'jorizaoliva@gmail.com', '09772703763', '2023-09-01')">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Joriza Oliva</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>jorizaoliva@gmail.com</td>
                            <td>09772703763</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View Message" onclick="openPopup('Joriza Oliva', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishingLorem ipsum is placeholder text commonly used in the graphic, print, and publishing', 'jorizaoliva@gmail.com', '09772703763', '2023-09-01')">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>          
                        <tr>
                            <td>Joriza Oliva</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>jorizaoliva@gmail.com</td>
                            <td>09772703763</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View Message" onclick="openPopup('Joriza Oliva', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishingLorem ipsum is placeholder text commonly used in the graphic, print, and publishing', 'jorizaoliva@gmail.com', '09772703763', '2023-09-01')">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Joriza Oliva</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>jorizaoliva@gmail.com</td>
                            <td>09772703763</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View Message" onclick="openPopup('Joriza Oliva', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishingLorem ipsum is placeholder text commonly used in the graphic, print, and publishing', 'jorizaoliva@gmail.com', '09772703763', '2023-09-01')">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Joriza Oliva</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>jorizaoliva@gmail.com</td>
                            <td>09772703763</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View Message" onclick="openPopup('Joriza Oliva', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishingLorem ipsum is placeholder text commonly used in the graphic, print, and publishing', 'jorizaoliva@gmail.com', '09772703763', '2023-09-01')">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Joriza Oliva</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>jorizaoliva@gmail.com</td>
                            <td>09772703763</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View Message" onclick="openPopup('Joriza Oliva', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishingLorem ipsum is placeholder text commonly used in the graphic, print, and publishing', 'jorizaoliva@gmail.com', '09772703763', '2023-09-01')">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                     </tbody>
                </table>
                <div class="pagination">
                    <button id="prev-page">Previous</button>
                    <div id="page-numbers"></div>
                    <button id="next-page">Next</button>
                </div>

                <div id="pagination-message"></div>
             
              </div>
    
                        <!-- Popup for displaying message content and details -->
                        <div id="message-popup" class="popup">
                <div class="popup-content">
                    <span class="popup-close" onclick="closePopup()">&times;</span>
                    <h2>Message Details</h2>
                    <div class="popup-details">
                        <div class="row">
                            <div class="column">
                                <p><strong>Full Name:</strong></p>
                                <p><strong>Email Address:</strong></p>
                            </div>
                            <div class="column">
                                <p><span id="full-name"></span></p>
                                <p><span id="email-address"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <p><strong>Contact Number:</strong></p>
                                <p><strong>Date:</strong></p>
                            </div>
                            <div class="column">
                                <p><span id="contact-number"></span></p>
                                <p><span id="date"></span></p>
                            </div>
                        </div>
                        <div class="message-row">
                            <p><strong>Message:</strong></p>
                            <p><span id="message-content"></span></p>
                        </div>
                    </div>
                    <div class="popup-actions">
                        <button class="button">Reply</button>
                        <button class="button">Delete</button>
                    </div>
                </div>
            </div>


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
</body>

</html>
