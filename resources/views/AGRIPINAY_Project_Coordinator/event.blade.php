@extends('AGRIPINAY_Project_Coordinator.projectcoordinator_main')

@section('content')
@include('AGRIPINAY_Project_Coordinator.Body.sidebarproj')
    
<div class="title">
        <h1>Events</h1>
</div>
<div class="table-header">
        <div class="table-header-left">
            <label for="unread-filter">Filter: </label>
            <select id="unread-filter">
                <option value="all">All</option>
                <option value="PUBLIC">Public</option>
                <option value="agripinay">Beneficiaries</option>
                <option value="project coordinator">Project Coordinator</option>
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
                            <th>Description</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($event->reverse() as $events)
                        <!--MODAL VIEW-->
                        <div class="modal fade" id="view_itstaff{{ $events->id }}" tabindex="-1" data-backdrop="false" aria-labelledby="modal_view" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Event Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-4" style="width: 100%;">
                                                    <div class="form-outline">
                                                        <label for="Title">Title:</label>
                                                        <p class="form-control" type="text" id="Title" placeholder="Title...." name="title">{{ $events->title }}</p>
                                                    </div>
                                                </div>
                                                    <div class="col-md-6 mb-4" style="width: 100%;">
                                                    <div class="form-outline">
                                                    <label id="label_">To:</label>
                                                        <p class="form-control" type="text" name="to">{{ $events->to }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="col-md-6 mb-4" style="padding-left: 10%;">
                                                    <div class="form-outline">
                                                        <label for="Date">Date:</label>
                                                        <p class="form-control" type="date" id="Date" name="date">{{ $events->date }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <div class="form-outline">
                                                        <label for="Message">Message:</label>
                                                        <p class="form-control" rows="3" id="Message" placeholder="Write something..." name="message">{{ $events->message }}</p>
                                                    </div>
                                                    <div class="form-outline">
                                                        <label id="drop-img">
                                                            <input name="image" type="file" accept="image/*" id="input-file" hidden>
                                                            <div id="img-view">
                                                                <img src="{{ $events->image }}" alt="Image Icon">
                                                                <p>Drag and drop or click here<br>to upload a picture</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                        </div>

                        <!--MODAL UPDATE-->
                        <div class="modal fade" id="modal_edit{{ $events->id }}" tabindex="-1" data-backdrop="false" aria-labelledby="modal_edit" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body">
                                        <form action="{{ route('update.eventcoordinatoragripinay') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                            <input type="hidden" name="event_id" value="{{ $events->id }}">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label for="Title">Title:</label>
                                                        <input class="form-control" type="text" id="Title" placeholder="Title...." name="title" value="{{ $events->title }}">
                                                    </div>
                                                </div>
                                                    <div class="col-md-6 mb-4">
                                                    <div class="form-group">
                                                    <label for="edit-recipient">To:</label>
                                                        <select class="form-control" type="text" id="to"  onchange= "changeStatus()" placeholder="Title...." name="to">
                                                            <option>AGRIPINAY</option>
                                                            <option>PUBLIC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label for="Date">Date:</label>
                                                        <input class="form-control" type="date" id="Date" name="date" value="{{ $events->date }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <div class="form-outline">
                                                        <label for="Message">Message:</label>
                                                        <textarea class="form-control" rows="3" id="Message" placeholder="Write something..." name="message">{{ $events->message }}</textarea>
                                                    </div>
                                                    <div class="form-outline">
                                                        <label id="drop-img">
                                                            <input name="image" type="file" accept="image/*" id="input-file" hidden>
                                                            <div id="img-view">
                                                                <img src="{{ $events->image }}" alt="Image Icon">
                                                                <p>Drag and drop or click here<br>to upload a picture</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="add" id="saveChanges">Save Changes</button>
                                                </div>
                                        </form>
                                            </div>
                                    </div>
                            </div>
                        </div>

                        <!--MODAL DELETE-->
                        <div class="modal fade" id="modal_delete{{ $events->id }}" tabindex="-1" data-backdrop="false" aria-labelledby="modal_delete" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Event Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body">
                                        <form method="POST" action="{{ route('delete.eventcoordinatoragripinay') }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="row">
                                            <input type="hidden" name="event_id" value="{{ $events->id }}">
                                                <div class="col-md-6 mb-4" style="width: 100%;">
                                                    <div class="form-outline">
                                                        <label for="Title">Title:</label>
                                                        <p class="form-control" type="text" id="Title" placeholder="Title...." name="title">{{ $events->title }}</p>
                                                    </div>
                                                </div>
                                                    <div class="col-md-6 mb-4" style="width: 100%;">
                                                    <div class="form-outline">
                                                    <label id="label_">To:</label>
                                                        <p class="form-control" type="text" name="to">{{ $events->to }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="col-md-6 mb-4" style="padding-left: 10%;">
                                                    <div class="form-outline">
                                                        <label for="Date">Date:</label>
                                                        <p class="form-control" type="date" id="Date" name="date">{{ $events->date }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <div class="form-outline">
                                                        <label for="Message">Message:</label>
                                                        <p class="form-control" rows="3" id="Message" placeholder="Write something..." name="message">{{ $events->message }}</p>
                                                    </div>
                                                    <div class="form-outline">
                                                        <label id="drop-img">
                                                            <input name="image" type="file" accept="image/*" id="input-file" hidden>
                                                            <div id="img-view">
                                                                <img src="{{ $events->image }}" alt="Image Icon">
                                                                <p>Drag and drop or click here<br>to upload a picture</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    @if(session('error'))
                                                        <div class="alert alert-danger">
                                                            {{ session('error') }}
                                                        </div>
                                                    @endif
                                            <p style="color:red">Are you sure you want to delete this Announcement?</p>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="add" id="saveChanges">Delete</button>
                                                </div>
                                        </form>
                                            </div>
                                    </div>
                            </div>
                        </div>
                        <tr>
                            <td>{{ $events->title }}</td>
                            <td>{{ $events->to }}</td>
                            <td>{{ $events->message }}</td>
                            <td>{{ $events->image }}</td>
                            <td>{{ $events->date }}</td>
                            <td>
                            <button class="tooltip-button" data-tooltip="View" data-bs-toggle="modal" data-bs-target="#view_itstaff{{ $events->id }}">
                            <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Edit" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_edit{{ $events->id }}"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            <button class="tooltip-button" data-tooltip="Delete" class="delete-btn" data-bs-toggle="modal" data-bs-target="#modal_delete{{ $events->id }}">
                                <i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        @endforeach
                     </tbody>
                </table>
                <div class="pagination">
                    <button id="prev-page">Previous</button>
                    <div id="page-numbers"></div>
                    <button id="next-page">Next</button>
                </div>  

                <div id="pagination-message"></div>
             
              </div>
            <div>
                 <!--Button-->
                <button type="button" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_event" id="add-modal-button">
                    Add
                </button>
</div>


 <!--MODAL Event Store-->
 <div class="modal fade" id="modal_event" tabindex="-1" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <form action="{{ route('store.eventcoordinatoragripinay') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label for="Title">Title</label>
                                <input class="form-control" type="text" id="Title" placeholder="Title...." name="title">
                            </div>
                        </div>
                            <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label id="label_">To:</label>
                                        <select class="form-control" type="email" id="to"  onchange= "changeStatus()" placeholder="Title...." name="to">
                                        <option>AGRIPINAY</option>
                                        <option>PUBLIC</option>
                                        </select>
                                    </div>
                        </div>
                    </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label for="Date">Date</label>
                                <input class="form-control" type="date" id="Date" name="date">
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-outline">
                                <label for="Message">Message:</label>
                                <textarea class="form-control" rows="3" id="Message" placeholder="Write something..." name="message"></textarea>
                            </div>
                            <div class="form-outline">
                                <label id="drop-img">
                                    <input name="image" type="file" accept="image/*" id="input-file" hidden>
                                    <div id="img-view">
                                        <img src="/images/image_icon.png" alt="Image Icon">
                                        <p>Drag and drop or click here<br>to upload a picture</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="add">Save</button>
                        </div>
                        </form>
                    </div>
            </div>
    </div>
</div>
</div>

@endsection
