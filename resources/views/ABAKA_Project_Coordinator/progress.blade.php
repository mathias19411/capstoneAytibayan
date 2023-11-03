@extends('ABAKA_Project_Coordinator.projectcoordinator_main')

@section('content')
    @include('ABAKA_Project_Coordinator.Body.sidebarproj')


    <div class="title">
        <h1>Progress</h1>
    </div>

    <div class="boxes">
        <div class="box box-1">
            <h1>Graph 1</h1>
            <p>g1</p>
        </div>
        <div class="box box-1 ">
            <h1>Graph 2</h1>
            <p>g2</p>
        </div>
        <div class="box box-2">
            <h1>Graph 3</h1>
            <p>g3</p>
        </div>
        <div class="box box-3">
            <h1>Progress %</h1>
            <div class="progress-bar"></div>
            <p></p>
        </div>
    </div>




    <div class="table-header">
        <div class="table-header-left">
            <label for="unread-filter">Filter: </label>
            <select id="unread-filter">
                <option value="all">All</option>
                <option value="unread">Sagpon, Daraga</option>
                <option value="read">Rawis</option>
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
                                <p><strong>Last Updated:</strong>
                                    <span>{{ $abakaBeneficiary->assistance->updated_at }}</span>
                                </p>
                            @endif

                            <label for="update-status-dropdown">Update Status:</label>
                            <form action="{{ route('abakaprojectcoordinator.progressUpdate') }}"
                                enctype="multipart/form-data" method="post">
                                @csrf

                                @if ($abakaBeneficiary->assistance)
                                    <input type="hidden" name="assistanceId"
                                        value="{{ $abakaBeneficiary->assistance->id }}">


                                    <select id="update-status-dropdown" name="inputAssistanceUpdate">
                                        @foreach ($assistanceStatuses as $assistanceStatus)
                                            <option value="{{ $assistanceStatus->id }}"
                                                @if ($assistanceStatus->id == $abakaBeneficiary->assistance->financialassistancestatus_id) selected @endif>
                                                {{ $assistanceStatus->financial_assistance_status_name }}</option>
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
                            <td class="no-print">
                                <button class="tooltip-button" data-tooltip="Add"
                                    onclick="showAddValuePopup({{ $abakaBeneficiary->id }})"><i
                                        class="fa-solid fa-plus fa-2xs"></i></button>
                                <button class="tooltip-button" data-tooltip="Update"
                                    onclick="showUpdateStatusPopup({{ $abakaBeneficiary->id }})" disabled
                                    style="opacity: 0.5; cursor: not-allowed;"><i
                                        class="fa-solid fa-pen-to-square fa-2xs"></i></button>

                            <td>Unsettled</td>
                        @endif
                @endforeach
            </tbody>
        </table>





        <div class="pagination">
            <button id="prev-page">Previous</button>
            <div id="page-numbers"></div>
            <button id="next-page">Next</button>
        </div>



        <div id="pagination-message"></div>
        <div class="button-container">
            <button class="button_top buttons-print" onclick="printTable()"> <i class="fa-solid fa-print"
                    style="color: #ffffff;"></i> Print</button>

        </div>
    </div>







    <div class="progress-container">
        <div class="progress-line">



            <!-- Steps with numbers will be added dynamically here -->
        </div>
        <ul id="progress-num" class="progress-num"></ul>

    </div>

    <div class="progress-section">
        <h2>Process</h2>
        <ul id="progress-list">
            <!-- Steps will be added dynamically here -->
        </ul>

        <div id="progress-percent"></div>
        <button id="add-step">Add Step</button>
    </div>






    <script src="{{ asset('Assets/js/progress.js') }}"></script>
@endsection
