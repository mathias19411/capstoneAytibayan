<!DOCTYPE html>
<html>

<head>
    <title>Edit Program</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('Assets/css/itstaff.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('Assets/css/UserProfile.css') }}">

    {{-- Jquery CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

@extends('ABAKA_Project_Coordinator.projectcoordinator_main')
<body>
    <div class="program-form">
        <form method="POST" id="myForm" action="{{ route('itstaff.updateProgram') }}" enctype="multipart/form-data">
            @csrf
            <h1>Program Information</h1>

            <input type="hidden" name="id" value="{{ $program->id }}">

            <div class="form-row">
                @if ($program->coordinators)
                    <div class="input-group">
                        <label for="name">Project Coordinator:</label>
                        <input type="text" id="name" placeholder="Project Coordinator"
                        value="{{ $program->coordinators->first() ? $program->coordinators->first()->first_name . ' ' . $program->coordinators->first()->middle_name . ' ' . $program->coordinators->first()->last_name : 'No Project Coordinator Assigned' }}"
                            readonly>
                    </div>
                @else
                    <div class="input-group">
                        <label for="name">Project Coordinator:</label>
                        <input type="text" id="name" placeholder="Project Coordinator"
                            value="No Project Coordinator Assigned"
                            readonly>
                    </div>
                @endif
                
                <div class="input-group">
                    <label for="programnameInput">Name of the Program:</label>
                    <input type="text" id="programnameInput" value="{{ $program->program_name }}"
                        contenteditable="true" name="programnameInput">
                    @error('programnameInput')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="password">New Program Key:</label>
                    <input type="password" id="password" placeholder="" name="password" placeholder="########">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" id="password_confirmation" placeholder="########"
                        name="password_confirmation">
                </div>

            </div>

            <div class="form-row">
                <div class="input-group">
                    <label for="inputLocation">Location:</label>
                    <input type="text" id="inputLocation" placeholder="Location" value="{{ $program->location }}"
                        contenteditable="true" name="inputLocation">
                    @error('inputLocation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="inputEmail">Email Address:</label>
                    <input type="email" id="inputEmail" placeholder="Email Address" value="{{ $program->email }}"
                        contenteditable="true" name="inputEmail">
                    @error('inputEmail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="inputContact">Contact Number:</label>
                    <input type="tel" id="inputContact" placeholder="Contact Number"
                        value="{{ $program->contact }}" contenteditable="true" name="inputContact">
                    @error('inputContact')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="inputInfo">Program Information:</label>
                    <textarea id="inputInfo" contenteditable="true" name="inputInfo" placeholder="{{ $program->description }}">{{ $program->description }}</textarea>
                    @error('inputInfo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="form-row">
                <div class="input-group">
                    <label for="inputApply">How to Apply:</label>
                    <textarea id="inputApply" contenteditable="true" name="inputApply" placeholder="{{ $program->quiry }}">{{ $program->quiry }}</textarea>
                    @error('inputApply')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="inputReqs">Guidelines and Requirements:</label>
                    <textarea id="inputReqs" contenteditable="true" name="inputReqs" placeholder="{{ $program->requirements }}">{{ $program->requirements }}</textarea>
                    @error('inputReqs')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              
            <div class="input-group">
                <label for="programPhoto">Program Image:</label>
                <input type="file" class="custom-file-label" id="programPhoto" name="programPhoto">
               
                <div class="image-container">
                <img id="image-preview"
                    src="{{ !empty($program->image) ? url('Uploads/Program_images/' . $program->image) : url('Uploads/no-image.jpg') }}"
                    alt="User Profile Image" class="img-fluid-small  rounded-circle">
                 <span class="delete-icon" id="delete-image-btn">×</span>
                 </div>
            
            </div>

            </div>
            
            <div class="form-row1">
                <div class="input-group">
                    <label for="input-BackgroundImage">Program Background Image:</label>
                    <input type="file" class="custom-file-label"
                        id="input-BackgroundImage" name="programBackgroundPhoto">
               
                <div class="image-container">
                    <img id="image-preview1"
                        src="{{ !empty($program->background_image) ? url('Uploads/Program_images/' . $program->background_image) : url('Uploads/no-image.jpg') }}"
                        alt="Program Background Image" class="img-fluid-small  rounded-circle">
                   <span class="delete-icon" id="delete-image-btn">×</span> 
                </div>
                </div>
            </div>

           
            <button type="submit" class="btn btn-primary me-2">Save Your Changes</button>
           

        </form>


        
            <a href="{{ route('itstaff.home') }}" class="button discard-button">Discard</a>
        
    </div>

<!-----------TABLE----------->
    <div class="title">
        <h1>Registration</h1>
    </div>

    <div class="table-header">
        <div class="table-header-left">
        <label for="unread-filter">Filter: </label>
            <select id="unread-filter">
                <option value="all">All</option>
                <option value="read">itstaff</option>
                <option value="binhi">binhingpagasa</option>
                <option value="abaka">abakamopisomo</option>
                <option value="lead">lead</option>
                <option value="agripinay">agripinay</option>
                <option value="akbay">akbay</option>
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
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Program</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    {{-- Modal View --}}
                    <div class="modal fade" id="itStaffRegister{{ $user->id }}" tabindex="-1" data-backdrop="false" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title">User Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="col-md-12">
                                                <img class="ht-50 wd-50 rounded-circle"
                                                    src="{{ !empty($user->photo) ? url('Uploads/ITStaff_Images/' . $user->photo) : url('Uploads/user-icon-png-person-user-profile-icon-20.png') }}"
                                                    alt="profile">
                                            </div>
                                            <br>
                                            <span class="h4 ms-3">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</span>
                                            <br><br>
                                        </div>
                                        <div class="col-md-12">
                                            <h5>Email:</h5>
                                            <p id="modal-recipient">{{ $user->email }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <h5>Program:</h5>
                                            <p id="modal-recipient">{{ $user->program->program_name }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <h5>Role:</h5>
                                            <p id="modal-message">{{ $user->role->role_name }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <h5>Contact Number:</h5>
                                            <p id="modal-message">{{ $user->phone }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <h5>Address:</h5>
                                            <p id="modal-message">{{ $user->barangay }}, {{ $user->city }}, {{ $user->province }} {{ $user->zip }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Update User Status-->
                    <div class="modal fade" id="modal_edit{{ $user->id }}" tabindex="-1" data-backdrop="false" aria-labelledby="event_modal" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title">Edit User:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <img class="ht-50 wd-50 rounded-circle"
                                                src="{{ !empty($user->photo) ? url('Uploads/ITStaff_Images/' . $user->photo) : url('Uploads/user-icon-png-person-user-profile-icon-20.png') }}"
                                                alt="profile">
                                        </div>
                                        <br>
                                        <span class="h4 ms-3">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</span>
                                        <br><br>
                                            <form action="{{ route('itstaff.registerEditUser') }}" enctype="multipart/form-data" method="post">
                                                @csrf
                                            <div class="row">
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <div class="form-outline">
                                                <label id="inputRole">User Role:</label>
                                                <select id="inputRole" class="form-select" name="inputRole">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ ucwords($role->role_name) }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-4">
                                                <div class="form-outline">
                                                    <label id="inputStatus">User Status:</label>
                                                    <select id="inputStatus" class="form-select" name="inputStatus">
                                                        @foreach ($statuses as $status)
                                                            <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                        
                                            <div class="modal-footer">
                                                <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="add">Save Changes</button>
                                            </div>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->middle_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->program->program_name }}</td>
                        <td>{{ $user->role->role_name }}</td>
                        <td>{{ $user->status->status_name }}</td>
                        <td>
                            <button class="tooltip-button" data-tooltip="View" class="add-modal" data-bs-toggle="modal"
                            data-bs-target="#itStaffRegister{{ $user->id }}">
                                <i class="fa-solid fa-eye fa-2xs"></i>
                            </button>
                            <button class="tooltip-button" data-tooltip="Edit" class="add-modal" data-bs-toggle="modal"
                            data-bs-target="#modal_edit{{ $user->id }}"><i
                                    class="fa-solid fa-pen-to-square fa-2xs"></i></button>
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

    <form>

        <div class="btn-bottom">
            @auth
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="add-modal">

                        Register

                    </a>
                @endif
            @endauth
        </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            const imageInput = $('#input-ProfileImage');
            const imagePreview = $('#image-preview');
            const deleteImageBtn = $('#delete-image-btn');

            // Additional script for image input change (if needed)
            $('#input-ProfileImage').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#input-BackgroundImage').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview1').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
</body>

</html>
