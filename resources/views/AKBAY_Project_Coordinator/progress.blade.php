@extends('AKBAY_Project_Coordinator.projectcoordinator_main')

@section('content')
    @include('AKBAY_Project_Coordinator.Body.sidebarproj')


    <div class="title">
        <h1>Progress</h1>
    </div>

    @php
        //Access the authenticated user's id
$userRole = Illuminate\Support\Facades\AUTH::user()->role->role_name;

$userProgramId = Illuminate\Support\Facades\AUTH::user()->program->id;

$benefLoanStatuses = [];

$benefCurrentLoanStatuses = [];

//Access the specific row data of the user's id
        //when using a model in blade.php, indicate the direct path of the model
        // $userProfileData = App\Models\User::find($id);
    @endphp

    <div class="boxes">

        <div class="box box-1">
            <h1>Active and Inactive Beneficiaries</h1>
            <div class="chart-inner" id="pie-chart1"></div>
        </div>

        @if (App\Models\Loan::count() > 0)
            @php
                //total started benef loans
                $akbayStartedCount = App\Models\User::whereHas('role', function ($query) {
                    $query->where('role_name', 'beneficiary');
                })
                    ->whereHas('program', function ($query) use ($userProgramId) {
                        $query->where('id', $userProgramId);
                    })
                    ->whereHas('loan', function ($query) {
                        $query->where('loanstatus_id', 2);
                    })
                    ->count();
                //total pending benef loans
                $akbayPendingCount = App\Models\User::whereHas('role', function ($query) {
                    $query->where('role_name', 'beneficiary');
                })
                    ->whereHas('program', function ($query) use ($userProgramId) {
                        $query->where('id', $userProgramId);
                    })
                    ->whereHas('loan', function ($query) {
                        $query->where('loanstatus_id', 3);
                    })
                    ->count();
                //total approved benef loans
                $akbayApprovedCount = App\Models\User::whereHas('role', function ($query) {
                    $query->where('role_name', 'beneficiary');
                })
                    ->whereHas('program', function ($query) use ($userProgramId) {
                        $query->where('id', $userProgramId);
                    })
                    ->whereHas('loan', function ($query) {
                        $query->where('loanstatus_id', 4);
                    })
                    ->count();
                //total disbursed benef loans
                $akbayDisbursedCount = App\Models\User::whereHas('role', function ($query) {
                    $query->where('role_name', 'beneficiary');
                })
                    ->whereHas('program', function ($query) use ($userProgramId) {
                        $query->where('id', $userProgramId);
                    })
                    ->whereHas('loan', function ($query) {
                        $query->where('loanstatus_id', 5);
                    })
                    ->count();
                
                

                //total active benef loans
                $akbayActiveLoanCount = App\Models\User::whereHas('role', function ($query) {
                    $query->where('role_name', 'beneficiary');
                })
                    ->whereHas('program', function ($query) use ($userProgramId) {
                        $query->where('id', $userProgramId);
                    })
                    ->whereHas('loan', function ($query) {
                        $query->where('currentloanstatus_id', 2);
                    })
                    ->count();
                //total paid benef loans
                $akbayPaidLoanCount = App\Models\User::whereHas('role', function ($query) {
                    $query->where('role_name', 'beneficiary');
                })
                    ->whereHas('program', function ($query) use ($userProgramId) {
                        $query->where('id', $userProgramId);
                    })
                    ->whereHas('loan', function ($query) {
                        $query->where('currentloanstatus_id', 3);
                    })
                    ->count();
                //total overdue benef loans
                $akbayOverdueLoanCount = App\Models\User::whereHas('role', function ($query) {
                    $query->where('role_name', 'beneficiary');
                })
                    ->whereHas('program', function ($query) use ($userProgramId) {
                        $query->where('id', $userProgramId);
                    })
                    ->whereHas('loan', function ($query) {
                        $query->where('currentloanstatus_id', 4);
                    })
                    ->count();
                // //total closed benef loans
                // $akbayClosedLoanCount = App\Models\User::whereHas('role', function ($query) {
                //     $query->where('role_name', 'beneficiary');
                // })
                //     ->whereHas('program', function ($query) use ($userProgramId) {
                //         $query->where('id', $userProgramId);
                //     })
                //     ->whereHas('loan', function ($query) {
                //         $query->where('currentloanstatus_id', 4);
                //     })
                //     ->count();

                $benefExistingProjectCount = App\Models\Financialassistance::count();

                $benefLoanStatuses = [$akbayStartedCount, $akbayPendingCount, $akbayApprovedCount, $akbayDisbursedCount];

                $benefCurrentLoanStatuses = [$akbayActiveLoanCount, $akbayPaidLoanCount, $akbayOverdueLoanCount];
                
            @endphp
            <div class="box box-1 ">
                <h1>Overall Incoming Loan Statuses</h1>
                <div class="chart-inner" id="pie-chart2"></div>
            </div>
            <div class="box box-2">
                <h1>Overall Existing Loan Statuses</h1>
                <div class="chart-inner" id="pie-chart3"></div>
            </div>
            <div class="box box-3">
                <h1>Progress %</h1>
                <div class="progress-bar"></div>
                <p></p>
            </div>
        @else
            <div class="box box-1 ">
                <h1>Overall Incoming Loan Statuses</h1>
                <p>No Projects</p>
            </div>
            <div class="box box-2">
                <h1>Overall Existing Loan Statuses</h1>
                <p>Not Available</p>
            </div>
            <div class="box box-3">
                <h1>Progress %</h1>
                <div class="progress-bar"></div>
                <p></p>
            </div>
        @endif

    </div>

    <div class="table-header">
        <div class="table-header-left">
            <label for="unread-filter">City: </label>
            <select id="unread-filter">
                <option value="all">All</option>
                        <option value="Camalig">Camalig</option>
                        <option value="Daraga">Daraga</option>
                        <option value="Guinobatan">Guinobatan</option>
                        <option value="Jovellar">Jovellar</option>
                        <option value="Legazpi">Legazpi City</option>
                        <option value="Libon">Libon</option>
                        <option value="Ligao">Ligao</option>
                        <option value="Malilipot">Malilipot</option>
                        <option value="Malinao">Malinao</option>
                        <option value="Manito">Manito</option>
                        <option value="Oas">Oas</option>
                        <option value="Pioduran">Pioduran</option>
                        <option value="Rapu-rapu">Rapu-rapu</option>
                        <option value="Sto.Domingo">Sto. Domingo</option>
                        <option value="Tabaco">Tabaco City</option>
                        <option value="Tiwi">Tiwi</option>
                        <option value="Bacacay">Bacacay</option>
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
                <h4>AKBAY PROGRAM STATUS MONITORING</h4>    
                </div>
            
            <table class="table" id="beneficiaries-table">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Beneficiary</th>
                    <th scope="col">Barangay</th>
                    <th scope="col">City</th>
                    <th scope="col">Project</th>
                    <th scope="col">Term 'Months'</th>
                    <th scope="col">Repayment Schedule</th>
                    <th scope="col">Date of Maturity</th>
                    <th scope="col">Loan Amount</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Incoming Loan Status</th>
                    <th scope="col">Current Loan Status</th>
                    <th scope="col" class="no-print">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($akbayBeneficiaries as $akbayBeneficiary)
                    {{-- Modal View for Add --}}
                    <div id="add-value-popup-{{ $akbayBeneficiary->id }}" class="add-value-popup">
                        <div class="add-value-popup-content">
                            <span class="add-value-popup-close"
                                onclick="hideAddValuePopup({{ $akbayBeneficiary->id }})">&times;</span>
                            <h2>Add Beneficiary</h2>
                            <form action="{{ route('akbayprojectcoordinator.progressAdd') }}" enctype="multipart/form-data"
                                method="post">
                                @csrf

                                <input type="hidden" name="userId" value="{{ $akbayBeneficiary->id }}">

                                <label for="name">Beneficiary Name:</label>
                                <input type="text" id="name" name="name"
                                    value="{{ $akbayBeneficiary->first_name }} {{ $akbayBeneficiary->middle_name }} {{ $akbayBeneficiary->last_name }}"
                                    readonly>
                                <label for="project">Project:</label>
                                <input type="text" id="project" name="project" required>
                                @error('project')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                                <label for="amount">Loan Amount ₱:</label>
                                <input type="number" id="amount" name="amount" required>
                                @error('amount')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                                <label for="term">Loan Term 'months'</label>
                                <input type="number" id="term" name="term" required>
                                @error('term')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                                <label for="repaymentSched">Repayment Schedule</label>
                                <input type="date" id="repaymentSched" name="repaymentSched" required>
                                @error('repaymentSched')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                                <label for="maturity">Date of maturity</label>
                                <input type="date" id="maturity" name="maturity" required>
                                @error('maturity')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror

                                <button type="submit" class="add">Save Changes</button>
                            </form>
                        </div>
                    </div>

                    {{-- Modal View for Update --}}
                    <div id="update-status-popup-{{ $akbayBeneficiary->id }}" class="update-status-popup">
                        <div class="update-status-popup-content">
                            <span class="update-status-popup-close"
                                onclick="hideUpdateStatusPopup({{ $akbayBeneficiary->id }})">&times;</span>
                            <h2>Beneficiary Progress Details</h2>
                            <p><strong>Beneficiary Name:</strong> <span>{{ $akbayBeneficiary->first_name }}
                                    {{ $akbayBeneficiary->middle_name }} {{ $akbayBeneficiary->last_name }}</span></p>
                            @if ($akbayBeneficiary->loan)
                                <p><strong>Project:</strong> <span>{{ $akbayBeneficiary->loan->project }}</span></p>
                                <p><strong>Amount:</strong> <span>₱ {{ $akbayBeneficiary->loan->loan_amount }}</span></p>
                                <p><strong>Repayment Schedule:</strong> <span>{{ $akbayBeneficiary->loan->repayment_schedule }}</span></p>
                                <p><strong>Loan Term 'months':</strong> <span>{{ $akbayBeneficiary->loan->loan_term_in_months }}</span></p>
                                <p><strong>Last Updated:</strong>
                                    <span>{{ $akbayBeneficiary->loan->updated_at }}</span>
                                </p>
                            @endif

                            <form action="{{ route('akbayprojectcoordinator.progressUpdate') }}"
                                enctype="multipart/form-data" method="post">
                                @csrf

                                <input type="hidden" name="userId" value="{{ $akbayBeneficiary->id }}">

                                @if ($akbayBeneficiary->loan)
                                    <input type="hidden" name="loanId" value="{{ $akbayBeneficiary->loan->id }}">
                            
                                    <label for="update-status-dropdown">Incoming Loan Status:</label>
                                    <select id="update-status-dropdown" name="inputLoanUpdate">
                                        @php
                                            $currentLoanStatusId = $akbayBeneficiary->loan->loanstatus_id;
                                            $nextLoanStatusId = null;
                                            $foundCurrentStatus = false;
                                        @endphp
                            
                                        @foreach ($filteredLoanStatuses as $filteredLoanStatus)
                                            @php
                                                if ($foundCurrentStatus) {
                                                    $nextLoanStatusId = $filteredLoanStatus->id;
                                                    break;
                                                }
                            
                                                $isSelected = ($filteredLoanStatus->id == $currentLoanStatusId);
                                                $foundCurrentStatus = $isSelected;
                            
                                            @endphp
                            
                                            <option value="{{ $filteredLoanStatus->id }}" {{ $isSelected ? 'selected' : '' }} {{ $isSelected ? 'disabled' : '' }}>
                                                {{ $filteredLoanStatus->loan_status_name }}
                                            </option>
                                        @endforeach
                            
                                        @if ($nextLoanStatusId !== null)
                                            <option value="{{ $nextLoanStatusId }}">{{ App\Models\Loanstatus::find($nextLoanStatusId)->loan_status_name }}</option>
                                        @endif
                                    </select>
                                @endif

                                <button type="submit" class="add">Save Changes</button>
                            </form>

                            <form action="{{ route('akbayprojectcoordinator.currentLoanUpdate') }}"
                                enctype="multipart/form-data" method="post">
                                @csrf

                                <input type="hidden" name="userId" value="{{ $akbayBeneficiary->id }}">

                                @if ($akbayBeneficiary->loan)
                                    <input type="hidden" name="loanId"
                                        value="{{ $akbayBeneficiary->loan->id }}">

                                    <label for="update-status-dropdown">Current Loan Status:</label>
                                    <select id="update-status-dropdown" name="inputCurrentLoanUpdate">
                                        @foreach ($filteredCurrentLoanStatuses as $filteredCurrentLoanStatus)
                                            <option value="{{ $filteredCurrentLoanStatus->id }}">
                                                {{ $filteredCurrentLoanStatus->current_loan_status_name }}</option>
                                        @endforeach
                                    </select>
                                @endif

                                <button type="submit" class="add">Save Changes</button>
                            </form>

                        </div>
                    </div>

                    {{-- Modal View for Update Repayments --}}
                    <div id="update-repayment-popup-{{ $akbayBeneficiary->id }}" class="update-repayment-popup">
                        <div class="update-repayment-popup-content">
                            <span class="update-status-popup-close"
                                onclick="hideUpdateRepaymentPopup({{ $akbayBeneficiary->id }})">&times;</span>
                            <h2>Repayment Details</h2>
                            <p><strong>Beneficiary Name:</strong> <span>{{ $akbayBeneficiary->first_name }}
                                    {{ $akbayBeneficiary->middle_name }} {{ $akbayBeneficiary->last_name }}</span></p>
                            @if ($akbayBeneficiary->loan)
                                <p><strong>Project:</strong> <span>{{ $akbayBeneficiary->loan->project }}</span></p>
                                <p><strong>Amount:</strong> <span>₱ {{ $akbayBeneficiary->loan->loan_amount }}</span></p>
                                <p><strong>Remaining Balance:</strong> <span>₱ {{ $akbayBeneficiary->loan->remaining_loan_balance }}</span></p>
                                <p><strong>Loan Term 'months':</strong> <span>{{ $akbayBeneficiary->loan->loan_term_in_months }}</span></p>
                                <p><strong>Last Updated:</strong>
                                    <span>{{ $akbayBeneficiary->loan->updated_at }}</span>
                                </p>
                            @endif

                            <form action="{{ route('akbayprojectcoordinator.progressUpdateRepayment') }}"
                                enctype="multipart/form-data" method="post">
                                @csrf

                                <input type="hidden" name="userId" value="{{ $akbayBeneficiary->id }}">

                                @if ($akbayBeneficiary->loan)
                                    <input type="hidden" name="loanId"
                                        value="{{ $akbayBeneficiary->loan->id }}">

                                    <label for="inputRepayment">Repayment Amount</label>
                                    <input type="number" name="inputRepayment" id="inputRepayment" min="0" max="{{ $akbayBeneficiary->loan->remaining_loan_balance }}">
                                    @error('inputRepayment')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                @endif

                                <button type="submit" class="add">Save Changes</button>
                            </form>
                        </div>
                    </div>

                    {{-- Modal View Reject--}}
                    <div class="modal fade" id="ModalBlacklist{{ $akbayBeneficiary->id }}" tabindex="-1" data-backdrop="false"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title">Reject a Project</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col profile">
                                            <div class="col-md-12">
                                                <img class="profile ht-50 wd-50 rounded-circle"
                                                    src="{{ !empty($akbayBeneficiary->photo)
                                                        ? ($akbayBeneficiary->role->role_name === 'itstaff'
                                                            ? url('Uploads/ITStaff_Images/' . $akbayBeneficiary->photo)
                                                            : (in_array($akbayBeneficiary->role->role_name, [
                                                                'projectcoordinator',
                                                                'abakaprojectcoordinator',
                                                                'agripinayprojectcoordinator',
                                                                'akbayprojectcoordinator',
                                                                'leadprojectcoordinator',
                                                            ])
                                                                ? url('Uploads/Coordinator_Images/' . $akbayBeneficiary->photo)
                                                                : url('Uploads/Beneficiary_Images/' . $akbayBeneficiary->photo)))
                                                        : url('Uploads/user-icon-png-person-user-profile-icon-20.png') }}"
                                                    alt="profile">
                                            </div>
                                            <br>
                                            <span class="name h4 ms-3">{{ $akbayBeneficiary->first_name }} {{ $akbayBeneficiary->middle_name }}
                                                {{ $akbayBeneficiary->last_name }}</span>
                                            <br><br>
                                        </div>
                                        <form action="{{ route('akbayprojectCoordinator.RejectProject', $akbayBeneficiary->id) }}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf
                                        <div class="col-md-12 mb-4">
                                        <label for="remarks">Remarks:</label>
                                        <div class="form-outline">
                                            <textarea name="remarks" id="remarks" rows="5" style="width: 100%; padding:10px"></textarea>
                                        </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="add">Reject this Project</button>
                                        </div>
                                </div>
                                </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div> 

                    <tr>
                          <td class="user-id-column">
                        <span class="expand-row-icon">&#43;</span>
                        {{ $binhiBeneficiary->id }}</td>
                        <td>{{ $akbayBeneficiary->first_name }} {{ $akbayBeneficiary->middle_name }}
                            {{ $akbayBeneficiary->last_name }}</td>
                        <td>{{ $akbayBeneficiary->barangay }}</td>
                        <td>{{ $akbayBeneficiary->city }}</td>
                        @if ($akbayBeneficiary->loan)
                            <td>{{ $akbayBeneficiary->loan->project }}</td>
                            <td>{{ $akbayBeneficiary->loan->loan_term_in_months }}</td>
                            <td>{{ $akbayBeneficiary->loan->repayment_schedule }}</td>
                            <td>{{ $akbayBeneficiary->loan->date_of_maturity }}</td>
                            <td>₱ {{ $akbayBeneficiary->loan->loan_amount }}</td>
                            <td>₱ {{ $akbayBeneficiary->loan->remaining_loan_balance }}</td>
                            @if ($akbayBeneficiary->loanstatus->loan_status_name == 'disbursed')
                                <td style="color: lightgreen;">{{ $akbayBeneficiary->loanstatus->loan_status_name }}</td>
                            @else
                                <td style="color: orange;">{{ $akbayBeneficiary->loanstatus->loan_status_name }}</td>
                            @endif
                            @if ($akbayBeneficiary->currentloanstatus->current_loan_status_name == 'active')
                                <td style="color: orange;">{{ $akbayBeneficiary->currentloanstatus->current_loan_status_name }}</td>
                            @elseif ($akbayBeneficiary->currentloanstatus->current_loan_status_name == 'paid')
                                <td style="color: lightgreen;">{{ $akbayBeneficiary->currentloanstatus->current_loan_status_name }}</td>
                            @else
                                <td style="color: red;">{{ $akbayBeneficiary->currentloanstatus->current_loan_status_name }}</td>   
                            @endif
                            
                            <td class="no-print">
                                <button class="tooltip-button" data-tooltip="Add"
                                    onclick="showAddValuePopup({{ $akbayBeneficiary->id }})" disabled
                                    style="opacity: 0.5; cursor: not-allowed;"><i
                                        class="fa-solid fa-plus fa-2xs"></i></button>
                                        <button class="tooltip-button" data-tooltip="Update"
                                        onclick="showUpdateStatusPopup({{ $akbayBeneficiary->id }})"><i
                                            class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                                @if ($akbayBeneficiary->loan->remaining_loan_balance == 0 || $akbayBeneficiary->loan->loanstatus_id != 5)
                                
                                    <button class="tooltip-button" data-tooltip="Repayment"
                                    onclick="showUpdateRepaymentPopup({{ $akbayBeneficiary->id }})" disabled
                                    style="opacity: 0.5; cursor: not-allowed;"><i
                                        class="fa-solid fa-cash-register fa-2xs"></i></button>
                                    <button class="tooltip-button" data-tooltip="Notify"
                                    onclick="sendRepaymentNotification({{ $akbayBeneficiary->id }})" disabled
                                    style="opacity: 0.5; cursor: not-allowed;"><i
                                        class="fa-solid fa-bell fa-2xs"></i></button>
                                        <button class="tooltip-button" data-tooltip="Reject" class="add-modal" data-bs-toggle="modal"
                data-bs-target="#ModalBlacklist{{ $akbayBeneficiary->id }}" disabled
                style="opacity: 0.5; cursor: not-allowed;"><i class="fa-solid fa-ban fa-2xs"></i></button>
                                @else
                                    <button class="tooltip-button" data-tooltip="Repayment"
                                    onclick="showUpdateRepaymentPopup({{ $akbayBeneficiary->id }})"><i
                                        class="fa-solid fa-cash-register fa-2xs"></i></button>
                                    <button class="tooltip-button" data-tooltip="Notify"
                                    onclick="sendRepaymentNotification({{ $akbayBeneficiary->id }})"><i
                                        class="fa-solid fa-bell fa-2xs"></i></button>
                                        <button class="tooltip-button" data-tooltip="Reject" class="add-modal" data-bs-toggle="modal"
                data-bs-target="#ModalBlacklist{{ $akbayBeneficiary->id }}"><i class="fa-solid fa-ban fa-2xs"></i></button>
                                @endif
                            </td>
                        @else
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td style="color: red;">{{ $loanUnsettledStatus->loan_status_name }}</td>
                            <td>N/A</td>
                            <td class="no-print">
                                <button class="tooltip-button" data-tooltip="Add"
                                    onclick="showAddValuePopup({{ $akbayBeneficiary->id }})"><i
                                        class="fa-solid fa-plus fa-2xs"></i></button>
                                <button class="tooltip-button" data-tooltip="Update"
                                    onclick="showUpdateStatusPopup({{ $akbayBeneficiary->id }})" disabled
                                    style="opacity: 0.5; cursor: not-allowed;"><i
                                        class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                                <button class="tooltip-button" data-tooltip="Repayment"
                                onclick="showUpdateRepaymentPopup({{ $akbayBeneficiary->id }})" disabled style="opacity: 0.5; cursor: not-allowed;"><i
                                    class="fa-solid fa-cash-register fa-2xs"></i></button>

                            
                        @endif
                @endforeach
            </tbody>
        </table>

        <div class="signature-section">
                <div class="left-section">
                    <div class="signature-line">
                        <span>AKBAY Coordinator</span>
                    </div>
                    <div class="signature-line">
                        <span>Date</span>
                    </div>
                </div>
                <div class="right-section">
                    <div class="signature-line">
                            <span>Provincial Agriculturist</span>
                    </div>
                        <div class="signature-line">
                            <span>Date</span>
                        </div>
                    </div>
                </div>
</div>
        <div class="pagination">
            <button id="prev-page">Previous</button>
            <div id="page-numbers"></div>
            <button id="next-page">Next</button>
        </div>

        <div id="pagination-message"></div>
            <div class="button-container">
                <button id="printButton" class="button_top"> <i class="fa-solid fa-print" style="color: #ffffff;"></i> Print</button>
                <button id="exportButton" class="button_top"> <i class="fa-solid fa-file-arrow-down" style="color: #fafafa;"></i> Export</button>
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

    <script src="{{ asset('Assets/js/progressAkbay.js') }}"></script>

    {{-- apex charts cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        var totalActiveAndInactiveCount = {!! json_encode($totalActiveAndInactiveCount) !!};

        var benefLoanStatuses = {!! json_encode($benefLoanStatuses) !!};
        var benefCurrentLoanStatuses = {!! json_encode($benefCurrentLoanStatuses) !!};

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
            series: benefLoanStatuses,
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

        // -------------------------------- Pie chart----------------------
        var options = {
            series: benefCurrentLoanStatuses,
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

            ],
            labels: ['Active', 'Paid', 'Overdue'],
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

        var chart = new ApexCharts(document.querySelector("#pie-chart3"), options);
        chart.render();
    </script>
@endsection
