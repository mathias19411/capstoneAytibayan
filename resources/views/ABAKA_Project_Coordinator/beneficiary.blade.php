@extends('ABAKA_Project_Coordinator.projectcoordinator_main')

@section('content')
@include('ABAKA_Project_Coordinator.Body.sidebarproj')
    
<div class="title">
        <h1>Beneficiaries</h1>
</div>
<div class="boxes1">
    <div class="box box-5">
        <h1>Beneficiaries</h1>
        <p>{{ $abakaBeneficiariesCount }}</p>
    </div>
    <div class="box box-5 ">
        <h1>Active</h1>
        <p>{{ $abakaActiveCount }}</p>
    </div>
    <div class="box box-6">
        <h1>Inactive</h1>
        <p>{{ $abakaInactiveCount }}</p>
    </div>
</div>

  <!--ADD PROJECTS-->
    <!--PALAGAY NA LANG DITO JEF -->   
               
  <div class="table-header">
  <div class="table-header-left">
    <label for="status-filter">Status: </label>
    <select id="status-filter">
        <option value="all">All</option>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
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
        <div id="printableContent">
        <div class="print-header">
            <img src="\images\APAO-R5.jpg" alt="Albay Provincial Agricultural Office Logo">
            <h3>Republic of Albay, Province of Albay</h3>
            <h5>ALBAY PROVINCIAL AGRICULTURAL OFFICE</h5>
            <h4>AbakaBuhayan Project, "ABAKA MO, PISO MO" CASH INCENTIVE SCHEME</h4>
            </div>
                <table class="table">
                    <thead>
                    <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Province</th>
                            <th scope="col">Email</th>
                            <th scope="col">Project</th>
                            <th scope="col">Action</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($abakaBeneficiaries as $abakaBeneficiary)

                            <!--view_beneficiaries-->
                            <div class="modal fade" id="view_beneficiary_updates{{ $abakaBeneficiary->id }}" tabindex="-1"  data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-title">Beneficiary Updates:  {{ $abakaBeneficiary->first_name }} {{ $abakaBeneficiary->middle_name }}
                                                {{ $abakaBeneficiary->last_name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="project_box">
                                        @foreach($updates->reverse() as $update)
                                            <div class="box">
                                                <div class="project-info">
                                                @if ($abakaBeneficiary->email === $update->email)
                                                <a href="{{ asset('Uploads/Updates/'.$update->image) }}" target="_blank">
                                                    <img src="{{ asset('Uploads/Updates/'.$update->image) }}" alt="Beneficiary's Picture" class="img-thumbnail">
                                                </a>
                                                    <p class="update-title"> {{ $update->title }}</p>
                                                </div>
                                                    <p class="update-date">Posted: {{ $update->created_at->format('Y-m-d h:i A') }} </p>
                                                    <p class="update-date">Last Edited: {{ $update->updated_at->format('Y-m-d h:i A') }} </p>
                                                @endif
                                            </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    
                            
                                        <button class="add-project_modal" data-tooltip="View" class="add-modal" data-bs-toggle="modal" data-bs-target="#add-schedule-modal{{ $abakaBeneficiary->id }}">Add Schedule</button>
                                        <div class="modal-footer">
                                            <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Add Schedule Modal -->
                            <div class="modal fade" id="add-schedule-modal{{ $abakaBeneficiary->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="add-schedule-form" action="{{ route('add.schedule') }}" method="post">
                                            @csrf
                                        <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="schedule-description" class="form-label">Description:</label>
                                                    <input name="description" type="text" class="form-control" id="schedule-description" required>
                                                    <input type="hidden" name="from" value="{{ $programName }}">
                                                    <input type="hidden" name="recipient_email" value="{{ $abakaBeneficiary->email }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="schedule-date" class="form-label">Date:</label>
                                                    <input name="date" type="date" class="form-control" id="schedule-date" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="schedule-time" class="form-label">Time:</label>
                                                    <input name="time" type="time" class="form-control" id="schedule-time" required>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="add" id="save-schedule-button">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal View for Add --}}
                            <div id="add-value-popup-{{ $abakaBeneficiary->id }}" class="add-value-popup">
                                <div class="add-value-popup-content">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">View Beneficiary</h5>
                                        <span class="add-value-popup-close"
                                        onclick="hideAddValuePopup({{ $abakaBeneficiary->id }})">&times;</span>
                                </div>  
                               
                                    <h2>Add Beneficiary</h2>
                                    <form action="{{ route('abakaprojectcoordinator.progressAdd') }}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf

                                        <input type="hidden" name="userId" value="{{ $abakaBeneficiary->id }}">

                                        <label for="name">Beneficiary Name:</label>
                                        <input type="text" id="name" name="name"
                                            value="{{ $abakaBeneficiary->first_name }} {{ $abakaBeneficiary->middle_name }} {{ $abakaBeneficiary->last_name }}"
                                            readonly>
                                        <label for="project">Project:</label>
                                        <input type="text" id="project" name="project" required>
                                        @error('project')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <label for="amount">Amount:</label>
                                        <input type="number" id="amount" name="amount" required>
                                        @error('amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="hidden" name="financialassistancestatus_id" value="2">

                                        <button type="submit" class="add">Save Changes</button>
                                    </form>
                                </div>
                            </div>

                            {{-- Modal View for Update --}}
                            <div id="update-status-popup-{{ $abakaBeneficiary->id }}" class="update-status-popup">
                                <div class="update-status-popup-content">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Update Beneficiary</h5>
                                        <span class="update-status-popup-close"
                                        onclick="hideUpdateStatusPopup({{ $abakaBeneficiary->id }})">&times;</span>
                                </div>  
                                    
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="col-md-12">
                                                    <img class="ht-50 wd-50 rounded-circle"
                                                        src="{{ !empty($abakaBeneficiary->photo) ? url('Uploads/Beneficiary_Images/' . $abakaBeneficiary->photo) : url('Uploads/user-icon-png-person-user-profile-icon-20.png') }}"
                                                        alt="profile">
                                                </div>
                                                <br>
                                                <span class="h4 ms-3">{{ $abakaBeneficiary->first_name }} {{ $abakaBeneficiary->middle_name }} {{ $abakaBeneficiary->last_name }}</span>
                                                <br><br>
                                            </div>
                                            <div class="col-md-12">
                                                <h5>Email:</h5>
                                                <p id="modal-recipient">{{ $abakaBeneficiary->email }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <h5>Program:</h5>
                                                <p id="modal-recipient">{{ $abakaBeneficiary->program->program_name }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <h5>Role:</h5>
                                                <p id="modal-message">{{ $abakaBeneficiary->role->role_name }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <h5>Contact Number:</h5>
                                                <p id="modal-message">{{ $abakaBeneficiary->phone }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <h5>Address:</h5>
                                                <p id="modal-message">{{ $abakaBeneficiary->barangay }}, {{ $abakaBeneficiary->city }}, {{ $abakaBeneficiary->province }} {{ $abakaBeneficiary->zip }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                            <tr>
                                <td>{{ $abakaBeneficiary->id }}</td>
                                <td>{{ $abakaBeneficiary->first_name }} {{ $abakaBeneficiary->middle_name }}
                                    {{ $abakaBeneficiary->last_name }}</td>
                                <td>{{ $abakaBeneficiary->barangay }} {{ $abakaBeneficiary->city }}</td>
                                <td>{{ $abakaBeneficiary->province }}</td>
                                
                                <td>{{ $abakaBeneficiary->email }}</td>

                                <td>N/A</td>
                                <td class="no-print">
                                <input type="hidden" name="benef_email" value="{{ $abakaBeneficiary->email }}" > 
                                <button class="tooltip-button" data-tooltip="View" class="add-modal" data-bs-toggle="modal" data-bs-target="#view_beneficiary_updates{{ $abakaBeneficiary->id }}"><i class="fa-solid fa-eye fa-2xs"></i></button>
                                    {{--<button class="tooltip-button" data-tooltip="Update"
                                        onclick="showUpdateStatusPopup({{ $abakaBeneficiary->id }})"><i
                                            class="fa-solid fa-pen-to-square fa-2xs"></i></button> --}}
                                </td>
                                <td>{{ $abakaBeneficiary->status->status_name }}</td>
                            
                        @endforeach
                    </tbody>
                </table>   
            </div>
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

@endsection

