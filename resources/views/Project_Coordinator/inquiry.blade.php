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
            <option value="unread">Unread</option>
            <option value="read">Read</option>
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
                            <button class="tooltip-button" data-tooltip="View Message"><i class="fa-solid fa-eye fa-2xs"></i></button>
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
                            <button class="tooltip-button" data-tooltip="View Message"><i class="fa-solid fa-eye fa-2xs"></i></button>
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
                            <button class="tooltip-button" data-tooltip="View Message"><i class="fa-solid fa-eye fa-2xs"></i></button>
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
                            <button class="tooltip-button" data-tooltip="View Message"><i class="fa-solid fa-eye fa-2xs"></i></button>
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
                            <button class="tooltip-button" data-tooltip="View Message"><i class="fa-solid fa-eye fa-2xs"></i></button>
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
                            <button class="tooltip-button" data-tooltip="View Message"><i class="fa-solid fa-eye fa-2xs"></i></button>
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
                            <button class="tooltip-button" data-tooltip="View Message"><i class="fa-solid fa-eye fa-2xs"></i></button>
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
                            <button class="tooltip-button" data-tooltip="View Message"><i class="fa-solid fa-eye fa-2xs"></i></button>
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
                            <button class="tooltip-button" data-tooltip="View Message"><i class="fa-solid fa-eye fa-2xs"></i></button>
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
                            <button class="tooltip-button" data-tooltip="View Message"><i class="fa-solid fa-eye fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Reply"><i class="fas fa-reply fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                     </tbody>
                </table>
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



</body>

</html>
