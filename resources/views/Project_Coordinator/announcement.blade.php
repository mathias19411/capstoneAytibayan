@extends('Project_Coordinator.projectcoordinator_main')

@section('content')
@include('Project_Coordinator.Body.sidebarproj')
    

    <div class="title">
        <h1>Announcement</h1>
    </div>
    <div class="table-header">
        <div class="table-header-left">
            <label for="unread-filter">Filter: </label>
            <select id="unread-filter">
                <option value="all">All</option>
                <option value="unread">Public</option>
                <option value="read">Beneficiaries</option>
                <option value="read">Project Coordinator</option>
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
                            <th>Title</th>
                            <th>To</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_view">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Edit" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete" class="delete-btn" onclick="deleteAnnouncement(1)"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_view">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Edit" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete" class="delete-btn" onclick="deleteAnnouncement(1)"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_view">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Edit" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete" class="delete-btn" onclick="deleteAnnouncement(1)"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_view">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Edit" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete" class="delete-btn" onclick="deleteAnnouncement(1)"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_view">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Edit" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete" class="delete-btn" onclick="deleteAnnouncement(1)"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_view">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Edit" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete" class="delete-btn" onclick="deleteAnnouncement(1)"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_view">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Edit" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete" class="delete-btn" onclick="deleteAnnouncement(1)"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                </body>
                </table>
                <div class="pagination">
                    <button id="prev-page">Previous</button>
                    <div id="page-numbers"></div>
                    <button id="next-page">Next</button>
                </div>

                <div id="pagination-message"></div>
                </div>
    

            <div class="btn-bottom">
            <button type="button" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_announcement">
                Add</button> 
            </div>

   <!--MODAL ANNOUNCEMENT-->
<div class="modal fade" id="modal_announcement" tabindex="-1" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label id="label_">Title</label>
                            <input class="form-control" type="text" id="Title" placeholder="Title.... ">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label id="label_">To:</label>
                                <select class="form-control" type="email" id="to"  onchange= "changeStatus()" placeholder="Title....">
                                    <option value="public"> Public </option>
                                    <option value="benef"> Beneficiaries</option>
                                    <option value="akbay"> Akbay (Project Coordinator) </option>
                                    <option value="agripinay"> AgriPinay (Project Coordinator)  </option>
                                    <option value="abaka"> Abaka (Project Coordinator)  </option>
                                    <option value="lead"> LEAD (Project Coordinator)  </option>
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-outline">
                                <label id="label_">Message:</label>
                                <textarea class="form-control" rows="3" placeholder="Write something..."></textarea>
                            </div>
                        </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="add">Save</button>
         </div>
    </div>
</div>
</div>

<!--MODAL VIEW-->
<div class="modal fade" id="modal_view" tabindex="-1" data-backdrop="false" aria-labelledby="modal_view" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Message Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label for="ViewTitle">Title:</label>
                            <p id="ViewTitle"></p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label for="ViewTo">To:</label>
                            <p id="ViewTo"></p>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="form-outline">
                            <label for="ViewMessage">Message:</label>
                            <p id="ViewMessage"></p>
                        </div>
                        <div class="form-outline">
                            <label for="ViewDate">Date:</label>
                            <p id="ViewDate"></p>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="modal-footer">
                    <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>

<!--MODAL EDIT-->
<div class="modal fade" id="modal_edit" tabindex="-1" data-backdrop="false" aria-labelledby="modal_edit" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="edit-title">Title:</label>
                                <input type="text" class="form-control" id="edit-title" name="title">
                            </div>
                            </div>
                            <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="edit-recipient">To:</label>
                                <input type="text" class="form-control" id="edit-recipient" name="recipient">
                            </div>
                            </div>
                                <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label for="edit-message">Message:</label>
                                <textarea class="form-control" id="edit-message" name="message"></textarea>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="add" id="saveChanges">Save Changes</button>
                    </div>
        </div>
    </div>
</div>


@endsection
