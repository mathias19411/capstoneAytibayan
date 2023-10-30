@extends('ABAKA_Project_Coordinator.projectcoordinator_main')

@section('content')
@include('ABAKA_Project_Coordinator.Body.sidebarproj')
    
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
            <label for="unread-filter">Location: </label>
            <select id="unread-filter">
                <option value="all">All</option>
                <option value="Sagpon">Sagpon, Daraga</option>
                <option value="Rawis">Rawis</option>
            </select>
            <label for="unread-filter">Status: </label>
            <select id="unread-filter">
                <option value="all">All</option>
                <option value="unread">Active</option>
                <option value="read">Inactive</option>
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
                        <tr data-location="Sagpon">
                            <td>1</td>
                            <td>Orly Encabo</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                                <button class="tooltip-button" data-tooltip="Message"data-beneficiary-id="1"  class="add-modal" data-bs-toggle="modal" data-bs-target="#view_beneficiary_updates">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box active">Active</span>
                            </td>
                        </tr>
                        <tr data-location="Sagpon">
                            <td>2</td>
                            <td>Joriza Oliva</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="Message"data-beneficiary-id="1"  class="add-modal" data-bs-toggle="modal" data-bs-target="#view_beneficiary_updates">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box inactive">Inactive</span>
                            </td>
                        </tr>
                        <tr data-location="Sagpon">
                            <td>3</td>
                            <td>Mathias Bermejo</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="Message"data-beneficiary-id="1"  class="add-modal" data-bs-toggle="modal" data-bs-target="#view_beneficiary_updates">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box active">Active</span>
                            </td>
                        </tr>
                        <tr data-location="Rawis">
                            <td>4</td>
                            <td>Jayferson Begino</td>
                            <td>Rawis, Legazpi</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="Message"data-beneficiary-id="1"  class="add-modal" data-bs-toggle="modal" data-bs-target="#view_beneficiary_updates">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box active">Active</span>
                            </td>
                        </tr>
                        <tr data-location="Sagpon">
                            <td>5</td>
                            <td>Orly Encabo</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="Message"data-beneficiary-id="1"  class="add-modal" data-bs-toggle="modal" data-bs-target="#view_beneficiary_updates">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box active">Active</span>
                            </td>
                        </tr>
                        <tr data-location="Rawis">
                            <td>6</td>
                            <td>Joriza Oliva</td>
                            <td>Rawis, Legazpi</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="Message"data-beneficiary-id="1"  class="add-modal" data-bs-toggle="modal" data-bs-target="#view_beneficiary_updates">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                                </button>
                                <button class="tooltip-button" data-tooltip="Edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            <td>
                            <span onclick="toggleStatus(this)" class="status-box inactive">Inactive</span>
                            </td>
                        </tr>
                        <tr data-location="Sagpon">
                            <td>7</td>
                            <td>Orly Encabo</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="Message"data-beneficiary-id="1"  class="add-modal" data-bs-toggle="modal" data-bs-target="#view_beneficiary_updates">
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

        <div class="popup-status" id="statusPopup"></div>

<!--view_beneficiaries-->
<div class="modal fade" id="view_beneficiary_updates" tabindex="-1"  data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Beneficiary Updates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body justify-content-center">
                <h4 class="text-center">Beneficiary: <span id="actual-beneficiary-name"></span></h4>
                <div id="update-details" class="row justify-content-center">
                    <!-- Update cards will be dynamically generated here -->
                </div>
                <button type="button" class="btn add" id="add-schedule-button">Add Schedule</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Add Schedule Modal -->
<div class="modal fade" id="add-schedule-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-schedule-form">
                    <div class="mb-3">
                        <label for="schedule-description" class="form-label">Description:</label>
                        <input type="text" class="form-control" id="schedule-description" required>
                    </div>
                    <div class="mb-3">
                        <label for="schedule-date" class="form-label">Date:</label>
                        <input type="date" class="form-control" id="schedule-date" required>
                    </div>
                    <div class="mb-3">
                        <label for="schedule-time" class="form-label">Time:</label>
                        <input type="time" class="form-control" id="schedule-time" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="add" id="save-schedule-button">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection

