@extends('ABAKA_Project_Coordinator.projectcoordinator_main')

@section('content')
    @include('ABAKA_Project_Coordinator.Body.sidebarproj')


    <div class="title">
        <h1>Progress</h1>
    </div>

    @php
        //Access the authenticated user's id
$userRole = Illuminate\Support\Facades\AUTH::user()->role->role_name;

$userProgramId = Illuminate\Support\Facades\AUTH::user()->program->id;

$benefAssistanceStatuses = [];
//Access the specific row data of the user's id
        //when using a model in blade.php, indicate the direct path of the model
        // $userProfileData = App\Models\User::find($id);
    @endphp

    <div class="boxes">

        <div class="box box-1">
            <h1>Active and Inactive Beneficiaries</h1>
            <div class="chart-inner" id="pie-chart1"></div>
        </div>

        @if (App\Models\Financialassistance::count() > 0)
            @php
            //total pending benef
                $abakaStartedCount = App\Models\User::whereHas('role', function ($query) {
                        $query->where('role_name', 'beneficiary');
                    })
                    ->whereHas('program', function ($query) use ($userProgramId) {
                        $query->where('id', $userProgramId);
                    })
                    ->whereHas('assistance', function ($query) {
                        $query->where('financialassistancestatus_id', 2);
                    })
                    ->count();
                //total pending benef
                $abakaPendingCount = App\Models\User::whereHas('role', function ($query) {
                    $query->where('role_name', 'beneficiary');
                })
                    ->whereHas('program', function ($query) use ($userProgramId) {
                        $query->where('id', $userProgramId);
                    })
                    ->whereHas('assistance', function ($query) {
                        $query->where('financialassistancestatus_id', 3);
                    })
                    ->count();
                //total approved benef
                $abakaApprovedCount = App\Models\User::whereHas('role', function ($query) {
                    $query->where('role_name', 'beneficiary');
                })
                    ->whereHas('program', function ($query) use ($userProgramId) {
                        $query->where('id', $userProgramId);
                    })
                    ->whereHas('assistance', function ($query) {
                        $query->where('financialassistancestatus_id', 4);
                    })
                    ->count();
                //total disbursed benef
                $abakaDisbursedCount = App\Models\User::whereHas('role', function ($query) {
                    $query->where('role_name', 'beneficiary');
                })
                    ->whereHas('program', function ($query) use ($userProgramId) {
                        $query->where('id', $userProgramId);
                    })
                    ->whereHas('assistance', function ($query) {
                        $query->where('financialassistancestatus_id', 5);
                    })
                    ->count();

                $benefExistingProjectCount = App\Models\Financialassistance::count();

                $benefAssistanceStatuses = [$abakaStartedCount, $abakaPendingCount, $abakaApprovedCount, $abakaDisbursedCount];
            @endphp
            <div class="box box-11 ">
                <h1>Existing Beneficiry Projects</h1>
                <p>{{ $benefExistingProjectCount }}</p>
            </div>
            <div class="box box-2">
                <h1>Overall Financial Assistance Statuses</h1>
                <div class="chart-inner" id="pie-chart2"></div>
            </div>
            <div class="box box-3">
                <h1>Progress %</h1>
                <div class="progress-bar"></div>
                <p></p>
            </div>
        @else
            <div class="box box-1 ">
                <h1>Beneficiary Projects</h1>
                <p>No Projects</p>
            </div>
            <div class="box box-2">
                <h1>Overall Financial Assistance Statuses</h1>
                <p>No Projects</p>
            </div>
            <div class="box box-3">
                <h1>Steps Progress</h1>
                <div class="progress-bar"></div>
                <p></p>
            </div>
        @endif

    </div>
    <div class="button-container">
                    <button class="button_top" data-bs-toggle="modal" data-bs-target="#projectModal">
                        <i class="fa-solid fa-list-check" style="color: #ffffff;"></i> Program Activities
                    </button>
                </div>


    <div class="table-header">
        <div class="table-header-left">
            <label for="unread-filter">Filter: </label>
            <select id="unread-filter">
                        <option value="all">All</option>
                        <option value="Camalig">Camalig</option>
                        <option value="Daraga">Daraga</option>
                        <option value="Guinobatan">Guinobatan</option>
                        <option value="Jovellar">Jovellar</option>
                        <option value="Legazpi City">Legazpi City</option>
                        <option value="Libon">Libon</option>
                        <option value="Ligao">Ligao</option>
                        <option value="Malilipot">Malilipot</option>
                        <option value="Malinao">Malinao</option>
                        <option value="Manito">Manito</option>
                        <option value="Oas">Oas</option>
                        <option value="Pioduran">Pioduran</option>
                        <option value="Sto.Domingo">Sto. Domingo</option>
                        <option value="Tabaco City">Tabaco City</option>
                        <option value="Tiwi">Tiwi</option>
                        <option value="Bacacay">Bacacay</option>
                        <option value="Camalig">Camalig</option>
                        <option value="Daraga">Daraga</option>
                        <option value="Guinobatan">Guinobatan</option>
                        <option value="Jovellar">Jovellar</option>
                        <option value="Legazpi City">Legazpi City</option>
                        <option value="Libon">Libon</option>
                        <option value="Ligao">Ligao</option>
                        <option value="Malilipot">Malilipot</option>
                        <option value="Malinao">Malinao</option>
                        <option value="Manito">Manito</option>
                        <option value="Oas">Oas</option>
                        <option value="Pioduran">Pioduran</option>
                        <option value="Sto.Domingo">Sto. Domingo</option>
                        <option value="Tabaco City">Tabaco City</option>
                        <option value="Tiwi">Tiwi</option>
            </select>
            <label for="status-filter">Status: </label>
            <select id="status-filter">
                        <option value="all">All</option>
                        <option value="started">Started</option>
                        <option value="unsettled">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="disbursed">Disbursed</option>
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

    <!--LOGO -->
    <div class="header">
        <h1>Republic of the Philippines</h1>
        <h2>Province of Albay</h2>
        <h3>ALBAY PROVINCIAL AGRICULTURAL OFFICE</h3>
    </div>

    <div class="container">
    <div id="printableContent">
        <div class="print-header">
            <img src="\images\APAO-R5.jpg" alt="Albay Provincial Agricultural Office Logo">
            <h3>Republic of Albay, Province of Albay</h3>
            <h5>ALBAY PROVINCIAL AGRICULTURAL OFFICE</h5>
            <h4>AbakaBuhayan Project, "ABAKA MO, PISO MO" CASH INCENTIVE SCHEME</h4>
            </div>
        <table class="table" id="beneficiaries-table">


            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Beneficiary</th>
                    <th scope="col">Barangay</th>
                    <th scope="col">City</th>
                    <th scope="col">Status</th>
                    <th scope="col">Project</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Hectares</th>
                    <th scope="col" class="no-print">Action</th>
                    <th scope="col">Assistance Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($abakaBeneficiaries as $abakaBeneficiary)
                    {{-- Modal View for Add --}}
                    <div id="add-value-popup-{{ $abakaBeneficiary->id }}" class="add-value-popup">
                        <div class="add-value-popup-content">
                            <span class="add-value-popup-close"
                                onclick="hideAddValuePopup({{ $abakaBeneficiary->id }})">&times;</span>
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
                                <label for="hectares">Number of Hectares:</label>
                                <input type="number" id="hectares" name="hectares" required min="1" max="5">
                                @error('hectares')
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
                            <span class="update-status-popup-close"
                                onclick="hideUpdateStatusPopup({{ $abakaBeneficiary->id }})">&times;</span>
                            <h2>Beneficiary Progress Details</h2>
                            <p><strong>Beneficiary Name:</strong> <span>{{ $abakaBeneficiary->first_name }}
                                    {{ $abakaBeneficiary->middle_name }} {{ $abakaBeneficiary->last_name }}</span></p>
                            @if ($abakaBeneficiary->assistance)
                                <p><strong>Project:</strong> <span>{{ $abakaBeneficiary->assistance->project }}</span></p>
                                <p><strong>Amount:</strong> <span>{{ $abakaBeneficiary->assistance->amount }}</span></p>
                                <p><strong>Number of Hectares:</strong> <span>{{ $abakaBeneficiary->assistance->number_of_hectares }}</span></p>
                                <p><strong>Last Updated:</strong>
                                    <span>{{ $abakaBeneficiary->assistance->updated_at }}</span>
                                </p>
                            @endif

                            <label for="update-status-dropdown">Update Status:</label>
                            <form action="{{ route('abakaprojectcoordinator.progressUpdate') }}"
                                enctype="multipart/form-data" method="post">
                                @csrf

                                <input type="hidden" name="userId" value="{{ $abakaBeneficiary->id }}">

                                @if ($abakaBeneficiary->assistance)
                                    <input type="hidden" name="assistanceId"
                                        value="{{ $abakaBeneficiary->assistance->id }}">


                                    <select id="update-status-dropdown" name="inputAssistanceUpdate">
                                        @foreach ($filteredassistanceStatuses as $filteredassistanceStatus)
                                            <option value="{{ $filteredassistanceStatus->id }}"
                                                @if ($filteredassistanceStatus->id == $abakaBeneficiary->assistance->financialassistancestatus_id) selected @endif>
                                                {{ $filteredassistanceStatus->financial_assistance_status_name }}</option>
                                        @endforeach
                                    </select>
                                @endif

                                <button type="submit" class="add">Save Changes</button>
                            </form>
                        </div>
                    </div>

                    <tr>
                        <td>{{ $abakaBeneficiary->id }}</td>
                        <td>{{ $abakaBeneficiary->first_name }} {{ $abakaBeneficiary->middle_name }}
                            {{ $abakaBeneficiary->last_name }}</td>
                        <td>{{ $abakaBeneficiary->barangay }}</td>
                        <td>{{ $abakaBeneficiary->city }}</td>
                        <td>{{ $abakaBeneficiary->status->status_name }}</td>
                        @if ($abakaBeneficiary->assistance)
                            <td>{{ $abakaBeneficiary->assistance->project }}</td>
                            <td>{{ $abakaBeneficiary->assistance->amount }}</td>
                            <td>{{ $abakaBeneficiary->assistance->number_of_hectares }}</td>
                            <td class="no-print">
                                <button class="tooltip-button" data-tooltip="Add"
                                    onclick="showAddValuePopup({{ $abakaBeneficiary->id }})" disabled
                                    style="opacity: 0.5; cursor: not-allowed;"><i
                                        class="fa-solid fa-plus fa-2xs"></i></button>
                                <button class="tooltip-button" data-tooltip="Update"
                                    onclick="showUpdateStatusPopup({{ $abakaBeneficiary->id }})"><i
                                        class="fa-solid fa-pen-to-square fa-2xs"></i></button>

                            </td>
                            <td>{{ $abakaBeneficiary->financialAssistanceStatus->financial_assistance_status_name }}</td>
                        @else
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td class="no-print">
                                <button class="tooltip-button" data-tooltip="Add"
                                    onclick="showAddValuePopup({{ $abakaBeneficiary->id }})"><i
                                        class="fa-solid fa-plus fa-2xs"></i></button>
                                <button class="tooltip-button" data-tooltip="Update"
                                    onclick="showUpdateStatusPopup({{ $abakaBeneficiary->id }})" disabled
                                    style="opacity: 0.5; cursor: not-allowed;"><i
                                        class="fa-solid fa-pen-to-square fa-2xs"></i></button>

                            <td>{{ $assistanceUnsettledStatus->financial_assistance_status_name }}</td>
                        @endif
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
        <div class="button-container">
            <button id="printButton" class="button_top"> <i class="fa-solid fa-print" style="color: #ffffff;"></i> Print</button>
            <button class="button_top"> <i class="fa-solid fa-file-arrow-down" style="color: #fafafa;"></i> Export</button>
        </div>
    </div>







    <div class="progress-container">
        <div class="progress-line">



            <!-- Steps with numbers will be added dynamically here -->
        </div>
        <ul id="progress-num" class="progress-num"></ul>

    </div>

    <div class="progress-section">
        <h3>Process</h3>
        <ul id="progress-list">
            <!-- Steps will be added dynamically here -->
        </ul>

        <div id="progress-percent"></div>
        <button id="add-step">Add Step</button>
        <button id="reset-steps">Reset Steps</button>
    </div>


<!--project-->
<div class="modal fade" id="projectModal" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Projects</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body justify-content-center">
             <div class= "project_header">
                <!--
                <img src="\images\project_background1.png"> -->
                <div class= "project_box">
                        @foreach($project->reverse() as $projects)
                        <!--EDIT PROJECT-->
                        <div class="modal fade" id="modal_editproject{{ $projects->id }}" tabindex="-1" data-backdrop="false" aria-labelledby="event_modal" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Edit Project</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('edit.project') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="project-info-edit">
                                                <input type="hidden" name="project_id" value="{{ $projects->id }}">
                                                <div class="mb-3">
                                                    <label for="projectTitle" class="form-label">Title:</label>
                                                    <input type="text" class="form-control" id="projectTitle" value="{{ $projects->title }}" name="title">
                                                    <input type="text" class="form-control" id="projectTitle" value="{{ $projects->from }}" name="from">
                                                </div>

                                                <div class="row mb-3 image-update">
                                                <div class="col-sm-10">
                                                    <label for="projectImage" class="col-sm-2 col-form-label">Image:</label>
                                                        <label id="drop-img">
                                                            <input name="attachment" type="file" id="input-file" value="{{ $projects->attachment }}" hidden>
                                                            <div id="img-view">
                                                                <img src="{{ asset('Uploads/Updates/'.$projects->attachment) }}" class="img-fluid" alt="Image Icon">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="projectVisibility" class="form-label">Edit Visibility:</label>
                                                    <select class="form-control" type="email" id="to"  onchange= "changeStatus()" placeholder="Title...." name="recipient">
                                                                <option>{{ $projects->recipient }}</option>
                                                                <option>{{ $programName }}</option>
                                                                <option>Public</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="projectDescription" class="form-label">Description:</label>
                                                    <input type="text" class="form-control" id="projectDescription" value="{{ $projects->message }}" name="message">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="add">Save Changes</button>
                                        </div>

                                    </form>
                                    </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modal_deleteproject{{ $projects->id }}" tabindex="-1" data-backdrop="false" aria-labelledby="modal_delete" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Event Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body">
                                        <form method="POST" action="{{ route('delete.project') }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="row">
                                            <input type="hidden" name="project_id" value="{{ $projects->id }}">
                                            </div>
                                                <div class="col-md-12 mb-4">
                                                    <div class="form-outline">
                                                       
                                                    </div>
                                                    @if(session('error'))
                                                        <div class="alert alert-danger">
                                                            {{ session('error') }}
                                                        </div>
                                                    @endif
                                            <p style="color:red">Are you sure you want to delete this Project?</p>
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

                        <div class="box">
                            <div class="project-info">
                                <h5>Title: {{ $projects->title }}</h5>
                                <img src="{{ asset('Uploads/Updates/'.$projects->attachment) }}">
                                <h2>Visibility: {{ $projects->recipient }}</h2>
                                <hr class="rounded">
                                <div class="description">
                                    <p>Description: {{ $projects->message }}</p>
                                </div>
                            </div>
                            <div class="footer">
                                <button class="edit-btn" title="Edit Project"  data-bs-toggle="modal" data-bs-target="#modal_editproject{{ $projects->id }}" >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="delete-btn" title="Delete Project" data-bs-toggle="modal" data-bs-target="#modal_deleteproject{{ $projects->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>

                        </div>

                        @endforeach   
                    </div>
                </div>
             <button type="button" class="add-project_modal" data-bs-toggle="modal" data-bs-target="#modal_addproject">Add Project</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="close" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

 <!--ADD PROJECT-->
                        <div class="modal fade" id="modal_addproject" tabindex="-1" data-backdrop="false" aria-labelledby="event_modal" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Add Project</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('add.project') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                                <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                    <label id="label_">Title</label>
                                                    <input class="form-control" type="text" id="Title" placeholder="Title.... " name="title">   
                                                    <input class="form-control" type="text" id="Title" value="{{ $programName }}" name="from" hidden>                           
                                                </div>
                                                </div>

                                                <div class="col-md-6 mb-4">
                                                        <div class="form-group">
                                                            <label for="edit-recipient">To:</label>
                                                            <select class="form-control" type="email" id="to"  onchange= "changeStatus()" placeholder="Title...." name="recipient">
                                                                <option>{{ $programName }}</option>
                                                                <option>Public</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                <div class="col-md-12 mb-4">
                                                    <div class="form-outline">
                                                        <label id="label_">Message:</label>
                                                            <textarea class="form-control" rows="3" placeholder="Write something..." name="message"></textarea>
                                                            </div>
                                                    <div class="form-outline">
                                                        <label id="drop-img">
                                                            <input name="image" type="file" id="input-file" hidden>
                                                            <div id="img-view">
                                                                <img src="" alt="Image Icon">
                                                                <p>Drag and drop or click here<br>to upload a picture</p>
                                                            </div>
                                                        </label>
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


    <script src="{{ asset('Assets/js/progress.js') }}"></script>

    {{-- apex charts cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        var totalActiveAndInactiveCount = {!! json_encode($totalActiveAndInactiveCount) !!};

        var benefAssistanceStatuses = {!! json_encode($benefAssistanceStatuses) !!};

        // -------------------------------- Pie chart----------------------
        var options = {
            series: totalActiveAndInactiveCount,
            chart: {

                type: 'pie',
                toolbar: { //toolbar enabled, users can DL the chart into svg, csv, and png
                    show: true
                },
                width: '100%', // Set the width of the chart
                height: 600,
            },
            colors: [
                "#7bb701",
                "#f0a60f",

            ],
            labels: ['Active', 'Inactive'],
            responsive: [{
                    breakpoint: 1000, // Set a breakpoint for smaller screens (e.g., tablets)
                    options: {
                        chart: {
                            width: '90%', // Adjust the width for smaller screens
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                },
                {
                    breakpoint: 769, // Set a breakpoint for even smaller screens (e.g., mobile devices)
                    options: {
                        chart: {
                            width: '40%',

                            height: 450,
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                },
                {
                    breakpoint: 694, // Set a breakpoint for even smaller screens (e.g., mobile devices)
                    options: {
                        chart: {
                            width: '50%',

                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            ]
        };

        var chart = new ApexCharts(document.querySelector("#pie-chart1"), options);
        chart.render();

        // -------------------------------- Pie chart----------------------
        var options = {
            series: benefAssistanceStatuses,
            chart: {

                type: 'pie',
                toolbar: { //toolbar enabled, users can DL the chart into svg, csv, and png
                    show: true
                },
                width: '100%', // Set the width of the chart
                height: 600,
            },
            colors: [
                "#7bb701",
                "#f0a60f",
                "#58c0e2",
                "#3F5E5A",

            ],
            labels: ['Started', 'Pending', 'Approved', 'Disbursed'],
            responsive: [{
                    breakpoint: 1000, // Set a breakpoint for smaller screens (e.g., tablets)
                    options: {
                        chart: {
                            width: '90%', // Adjust the width for smaller screens
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                },
                {
                    breakpoint: 769, // Set a breakpoint for even smaller screens (e.g., mobile devices)
                    options: {
                        chart: {
                            width: '40%',

                            height: 450,
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                },
                {
                    breakpoint: 694, // Set a breakpoint for even smaller screens (e.g., mobile devices)
                    options: {
                        chart: {
                            width: '50%',

                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            ]
        };

        var chart = new ApexCharts(document.querySelector("#pie-chart2"), options);
        chart.render();
    </script>
@endsection
