@extends('ITStaff.main')
@section('ITStaff')

@section('content')
@include('ITStaff.Body.sidebar')

    <div class="title">
        <h1>Announcement</h1>
    </div>
    <div class="table-header">
        <div class="table-header-left">
            <label for="unread-filter">Filter: </label>
            <select id="unread-filter">
                <option value="all">All</option>
                <option value="PUBLIC">Public</option>
      
                <option value="binhi">Binhi ng Pag-asa</option>
                <option value="abakamopisomo">Abaka Mo, Piso Mo</option>
                <option value="lead">LEAD</option>
                <option value="agripinay">AgriPinay</option>
                <option value="akbay">Akbay</option>
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
                            <th>From</th>
                            <th>Title</th>
                            <th>To</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($announcement->reverse() as $announcements)
                        <!--VIEW Announcement-->
                        <div class="modal fade" id="modal_view{{ $announcements->id }}" tabindex="-1" data-backdrop="false" data-bs-backdrop="static" aria-labelledby="#modal_view" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Message Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body">
                                        <div class="row">
                                        <div class="col">
                                        <div class="col-md-12">
                                            <h5>Title:</h5>
                                            <p id="modal-title">{{ $announcements->title }}</p>
                                        </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-12">
                                                <h5>To:</h5>
                                                <p id="modal-recipient">{{ $announcements->to }}</p>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h5>Message:</h5>
                                                <p id="modal-message">{{ $announcements->message }}</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <!--UPDATE Announcement-->
                        <div class="modal fade" id="modal_edit{{ $announcements->id }}" tabindex="-1" data-backdrop="false" data-bs-backdrop="static"  aria-labelledby="#modal_edit" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-title">Edit</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                            <div class="modal-body">
                                            <form action="{{ route('update.announcement') }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                    <div class="row">
                                                    <input type="hidden" name="announcement_id" value="{{ $announcements->id }}">
                                                        <div class="col-md-6 mb-4">
                                                        <div class="form-group">
                                                            <label for="edit-title">Title:</label>
                                                            <input type="text" class="form-control" id="edit-title" name="title" value="{{ $announcements->title }}">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                        <div class="form-group">
                                                            <label for="edit-recipient">To:</label>
                                                            <select class="form-control" type="email" id="to"  onchange= "changeStatus()" placeholder="Title...." name="to">
                                                            <option>{{ $announcements->to }}</option>
                                                            @foreach($programs as $program)
                                                            <option>{{ $program->program_name }}</option>
                                                            @endforeach
                                                            <option>Public</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                            <div class="col-md-12 mb-4">
                                                        <div class="form-group">
                                                            <label for="edit-message">Message:</label>
                                                            <textarea class="form-control" id="edit-message" name="message">{{ $announcements->message }}</textarea>
                                                        </div>
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

                        <!--DELETE Announcement-->
                        <div class="modal fade" id="modal_delete{{ $announcements->id }}" tabindex="-1" data-backdrop="false" data-bs-backdrop="static"  aria-labelledby="#modal_delete" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Cancel Announcement</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body">
                                        <form method="POST" action="{{ route('delete.announcement') }}">
                                            @csrf
                                            @method('PATCH')
                                        <input type="hidden" name="delete_id" value="{{ $announcements->id }}">
                                            @if(session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <p style="color:red">Are you sure you want to cancel this Announcement?</p>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="close" data-bs-dismiss="modal">No</button>
                                                <button type="submit" class="add" id="saveChanges">Yes</button>
                                        </div>
                                        </form>
                                        </div>
                            </div>
                        </div>

                        <tr>
                        <td class="column">{{ $announcements->from }}</td>
                        <td class="column">{{ $announcements->title }}</td>
                        <td class="column">{{ $announcements->to }}</td>
                        <td class="column message-column">{{ $announcements->message }}</td>
                        <td class="column">{{ $announcements->created_at->format('Y-m-d h:i A') }}</td>
                        <td class="column">{{ $announcements->status }}</td>

                        <td>
                            <button class="tooltip-button" data-tooltip="View" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_view{{ $announcements->id }}">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Edit" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_edit{{ $announcements->id }}">
                                <i class="fa-solid fa-pen-to-square fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Delete" class="delete-btn" data-bs-toggle="modal" data-bs-target="#modal_delete{{ $announcements->id }}">
                                <i class="fa-solid fa-trash fa-2xs"></i>
                            </button>
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
    <button type="button" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_announcement">
    Add</button> 
    </div>

        <!--Store ANNOUNCEMENT-->
        <div class="modal fade" id="modal_announcement" tabindex="-1" data-backdrop="false" data-bs-backdrop="static"  aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Announcement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <form action="{{ route('store.announcement') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                    <label id="label_">Title</label>
                                    <input class="form-control" type="text" id="Title" placeholder="Title.... " name="title">
                                    <input class="form-control" type="text" id="Title" value="{{ $roleName }}" name="from" hidden>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                    <label id="label_">To:</label>
                                        <select class="form-control" type="email" id="to"  onchange= "changeStatus()" placeholder="Title...." name="to">
                                        @foreach($programs as $program)
                                        <option>{{ $program->program_name }}</option>
                                        @endforeach
                                        <option>Public</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <label id="label_">Message:</label>
                                        <textarea class="form-control" rows="3" placeholder="Write something..." name="message"></textarea>
                                    </div>
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
