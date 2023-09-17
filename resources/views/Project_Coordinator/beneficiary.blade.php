@extends('Project_Coordinator.projectcoordinator_main')

@section('content')
@include('Project_Coordinator.Body.sidebarproj')
    
<div class="title">
        <h1>Beneficiaries</h1>
</div>

<div class="button-container">
  <button class="button_top"> <i class="fa-solid fa-print" style="color: #ffffff;"></i> Print</button>
  <button class="button_top"> <i class="fa-solid fa-file-arrow-up" style="color: #ffffff;"></i> Import</button>
  <button class="button_top"> <i class="fa-solid fa-file-arrow-down" style="color: #fafafa;"></i> Export</button>
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
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact #</th>
                            <th scope="col">Email</th>
                            <th scope="col">Project</th>
                            <th scope="col">Organization</th>
                            <th scope="col">Action</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Orly Encabo</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                                <button class="tooltip-button" data-tooltip="Message">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box active">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Joriza Oliva</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                                <button class="tooltip-button" data-tooltip="View">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box inactive">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Mathias Bermejo</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                                <button class="tooltip-button" data-tooltip="Message">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box active">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Jayferson Begino</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                                <button class="tooltip-button" data-tooltip="Message">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="togphp gleStatus(this)" class="status-box active">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Orly Encabo</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                                <button class="tooltip-button" data-tooltip="Message">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box active">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Joriza Oliva</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                                <button class="tooltip-button" data-tooltip="View">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box inactive">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Orly Encabo</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                                <button class="tooltip-button" data-tooltip="Message">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box active">Active</span>
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

              <!--status popup-->
             
    
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
            

                <div class="btn-bottom">
                    <button type="button" class="add-modal">
                    Add
                    </button>
                  
                    <button type="button" class="generate">
                    Generate Report
                    </button>
                </div>

                <div class="popup-status" id="statusPopup"></div>
@endsection

