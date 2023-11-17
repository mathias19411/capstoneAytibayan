@extends('Beneficiary.beneficiary_main')

@section('content')
    @include('beneficiary.Body.sidebar')

    <div class="title">
        <h1>Home</h1>
    </div>

    @php
        //Access the authenticated user's id
$id = Illuminate\Support\Facades\AUTH::user()->id;

//Access the specific row data of the user's id
        //when using a model in blade.php, indicate the direct path of the model
        $userProfileData = App\Models\User::find($id);

        $authUser = Illuminate\Support\Facades\AUTH::user();

        $description = App\Models\FinancialAssistanceStatus::find(1)->description;

        $statusName = App\Models\FinancialAssistanceStatus::find(1)->financial_assistance_status_name;

        $descriptionStarted = App\Models\FinancialAssistanceStatus::find(2)->description;

        $descriptionPending = App\Models\FinancialAssistanceStatus::find(3)->description;

        $descriptionApproved = App\Models\FinancialAssistanceStatus::find(4)->description;

        $descriptionDisbursed = App\Models\FinancialAssistanceStatus::find(5)->description;

    @endphp

    <div class="card-container">

        <!-- Card 1 -->
        <div class="row">
            <div class="col-md-4">
                <div class="card-progress">
                    <h2 class="card-title">PROGRESS</h2>
                    <div class="card-content">
                        @if ($authUser->assistance)
                            <div class="chart" id="progressChart">
                            </div>
                            <h6>{{ ucwords($authUser->financialAssistanceStatus->financial_assistance_status_name) }}</h6>

                            <div class="progressbar">
                                <ul>
                                    @if ($authUser->assistance->financialassistancestatus_id === 2)
                                        <li>
                                            <div class="progress one active" style="cursor: auto;">
                                                <p>1</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionStarted }}</p>
                                        </li>
                                        <li>
                                            <div class="progress two" style="cursor: auto;">
                                                <p>2</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionPending }}</p>
                                        </li>
                                        <li>
                                            <div class="progress three" style="cursor: auto;">
                                                <p>3</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionApproved }}</p>
                                        </li>
                                        <li>
                                            <div class="progress four" style="cursor: auto;">
                                                <p>4</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionDisbursed }}</p>
                                        </li>
                                    @elseif ($authUser->assistance->financialassistancestatus_id === 3)
                                        <li>
                                            <div class="progress one active" style="cursor: auto;">
                                                <p>1</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionStarted }}</p>
                                        </li>
                                        <li>
                                            <div class="progress two active" style="cursor: auto;">
                                                <p>2</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionPending }}</p>
                                        </li>
                                        <li>
                                            <div class="progress three" style="cursor: auto;">
                                                <p>3</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionApproved }}</p>
                                        </li>
                                        <li>
                                            <div class="progress four" style="cursor: auto;">
                                                <p>4</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionDisbursed }}</p>
                                        </li>
                                    @elseif ($authUser->assistance->financialassistancestatus_id === 4)
                                        <li>
                                            <div class="progress one active" style="cursor: auto;">
                                                <p>1</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionStarted }}</p>
                                        </li>
                                        <li>
                                            <div class="progress two active" style="cursor: auto;">
                                                <p>2</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionPending }}</p>
                                        </li>
                                        <li>
                                            <div class="progress three active" style="cursor: auto;">
                                                <p>3</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionApproved }}</p>
                                        </li>
                                        <li>
                                            <div class="progress four" style="cursor: auto;">
                                                <p>4</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionDisbursed }}</p>
                                        </li>
                                    @elseif ($authUser->assistance->financialassistancestatus_id === 5)
                                        <li>
                                            <div class="progress one active" style="cursor: auto;">
                                                <p>1</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionStarted }}</p>
                                        </li>
                                        <li>
                                            <div class="progress two active" style="cursor: auto;">
                                                <p>2</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionPending }}</p>
                                        </li>
                                        <li>
                                            <div class="progress three active" style="cursor: auto;">
                                                <p>3</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionApproved }}</p>
                                        </li>
                                        <li>
                                            <div class="progress four active" style="cursor: auto;">
                                                <p>4</p>
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">{{ $descriptionDisbursed }}</p>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        @else
                            <div class="chart" id="progressChart">
                                <h4>{{ $statusName }}</h4>
                            </div>

                            <div class="progressbar">
                                <ul>
                                    <li>
                                        <h5>{{ $description }}</h5>
                                    </li>

                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <!-- Special Announcement -->
            <div class="col-md-8">
                <div class="card-project">
                    <h2 class="card-title">PROJECTS</h2>
                    <div class="card-content">
                        <div class="project-info">
                            <div class="project-image">
                                <img src="/images/binhi_funrun.png">
                            </div>
                            <div class="project-body">
                                <div class="project-title">Binhi ng Pag-asa Fun Run 2022</div>
                                <div class="project-text"> This is some sample text for project. You can add more content
                                    here. </div>
                            </div>
                        </div>
                        <div class="project-info">
                            <div class="project-image">
                                <img src="/images/binhi_funrun.png">
                            </div>
                            <div class="project-body">
                                <div class="project-title">Binhi ng Pag-asa Fun Run 2022</div>
                                <div class="project-text"> This is some sample text for project. You can add more content
                                    here. </div>
                            </div>
                        </div>
                        <div class="project-info">
                            <div class="project-image">
                                <img src="/images/binhi_funrun.png">
                            </div>
                            <div class="project-body">
                                <div class="project-title">Binhi ng Pag-asa Fun Run 2022</div>
                                <div class="project-text"> This is some sample text for project. You can add more content
                                    here. </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="card-announcement">
                            <h2 class="card-title">ANNOUNCEMENT</h2>
                            <div class="card-content">
                                @foreach($announcement->reverse() as $announcements)
                                <div class="announcement-info">
                                    <div class="announcement-title">From: {{ $programName }} Coordinator</div>
                                    <div class="announcement-text">{{ $announcements->message }}</div>
                                    <div class="footer">
                                    <div class="date">{{ $announcements->date }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-event">
                            <h2 class="card-title">EVENT</h2>
                            <div class="card-content">
                            @foreach($events->reverse() as $event)
                                <div class="event-info">
                                    <div class="event-date">
                                    @php
                                        $dayEvent = \Carbon\Carbon::parse($event->date)->format('d');
                                        $monthEvent = \Carbon\Carbon::parse($event->date)->format('M');
                                    @endphp
                                        <div class="date">{{ $dayEvent }}</div>
                                        <div class="month">{{ $monthEvent }}</div>
                                    </div>

                                    <div class="event-body">
                                        <div class="event-title">Title: {{ $event->title }}</div>
                                        <div class="event-text">{{ $event->message }}</div>
                                        
                                        <!--
                                        <div id="img-view">
                                            
                                            <img src="/images/image_icon.png" alt="Image Icon">
                                            <p>No Image Posted</p>
                                        </div>
                                        -->
                                        <div class="footer">
                                        <div class="time">3:35 AM</div>
                                        </div>
                                    </div>
                                </div>  
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
