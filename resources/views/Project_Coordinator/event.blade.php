@extends('Project_Coordinator.projectcoordinator_main')

@section('content')
@include('Project_Coordinator.Body.sidebarproj')
    
<div class="title">
        <h1>Events</h1>
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>image.png</td>
                            <td>2023-09-21</td>
                            <td>
                           <button class="tooltip-button" data-tooltip="View" class="add-modal" data-bs-toggle="modal" data-bs-target="#viewModal">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Edit" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_edit"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete" class="delete-btn" onclick="deleteAnnouncement(1)"><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
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

              <button type="button" class="add-modal" data-bs-toggle="modal" data-bs-target="#eventModal" id="add-modal-button">
    Add
</button>
    </div>
   <!--Buttons-->

    <div class="modal fade" id="eventModal" tabindex="-1" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Events</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                            
                            <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <label id="label_">Title</label>
                                <input class="form-control" type="text" id="Title" placeholder="Title.... " name="title">                            </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <label id="label_">Date</label>
                                        <input class="form-control"  type="date" id="Date" placeholder="Title...." name="date">
                            </div>
                            </div>
        
                            <div class="col-md-12 mb-4">
                                <div class="form-outline">
                                    <label id="label_">Message:</label>
                                        <textarea class="form-control" rows="3" placeholder="Write something..."></textarea>
                                        </div>
                                        <div class="form-outline">
                                        <label for="input-file" id="drop-img">
                                        <input name="image" type="file" accept="image/*" id="input-file" hidden>
                                        <div id="img-view">
                                        <img src="/images/image_icon.png">
                                        <p> Drag and drop or click here <br> to upload picture</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                <div class="modal-footer">
                    <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="add">Save</button>
            </div>
        </div>
    </div>
    </div>

<!--MODAL EDIT-->
<div class="modal fade" id="viewModal" tabindex="-1" data-backdrop="false" aria-labelledby="viewModal" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Events</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                            
                            <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <label id="label_">Title</label>
                                <input class="form-control" type="text" id="Title" placeholder="Title.... " name="title">                            </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                <label id="label_">Date</label>
                                        <input class="form-control"  type="date" id="Date" placeholder="Title...." name="date">
                            </div>
                            </div>
        
                            <div class="col-md-12 mb-4">
                                <div class="form-outline">
                                    <label id="label_">Message:</label>
                                        <textarea class="form-control" rows="3" placeholder="Write something..."></textarea>
                                        </div>
                                        <div class="form-outline">
                                        <label for="input-file" id="drop-img">
                                        <input name="image" type="file" accept="image/*" id="input-file" hidden>
                                        <div id="img-view">
                                        <img src="/images/image_icon.png">
                                        <p> Drag and drop or click here <br> to upload picture</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                <div class="modal-footer">
                    <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="add">Save</button>
            </div>
        </div>
    </div>
    </div>

@endsection
