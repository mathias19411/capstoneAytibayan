<nav>
    <div class="logo-name">
    <div class="logo-image">
            <a href="{{ route('visitor.home') }}">
                @if(!empty($programLogo))
                <img src="{{ asset('Uploads/Program_images/'.$programLogo) }}" alt="Logo">
                @else
                <img src="\images\logo.png" alt="Logo">
                @endif
            </a>
        </div>

        <span class="logo_name">LEAD</span>
    </div>

    @php
        //Access the authenticated user's id
$id = Illuminate\Support\Facades\AUTH::user()->id;

//Access the specific row data of the user's id
        //when using a model in blade.php, indicate the direct path of the model
        $userProfileData = App\Models\User::find($id);
        // Count unread announcements
        use App\Models\inquiries;
        use App\Models\Program;
        use App\Models\Updates;
        use Illuminate\Support\Facades\Auth;
        $userProgramId = AUTH::user()->program->id;
        $programName = trim(implode(' ', Program::where('id', $userProgramId)->pluck('program_name')->toArray()));
        $unreadCount = Inquiries::where('is_unread', true)->where('to', $programName)->count();
        $unviewedCount = Updates::where('is_viewed', false)->where('benef_of', $programName)->count();
    @endphp

    <div class="menu-items">
        <ul class="nav-links">
        <li class="{{ Route::currentRouteName() == 'leadprojectcoordinator.beneficiaries' ? 'active' : '' }}">
                <a href="{{ route('leadprojectcoordinator.beneficiaries') }}">
                    <i class="uil uil-users-alt">
                    @if ($unviewedCount > 0)
                    <span class="badge badge-light" style="color: orange; font-weight: bold;position: absolute; top: -1px; right: 0; padding-right:75%"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                        </svg>
                    </span>
                    @endif</i>
                    <span class="link-name">Beneficiaries</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'leadprojectcoordinator.announcement' ? 'active' : '' }}">
                <a href="{{ route('leadprojectcoordinator.announcement') }}" >
                    <i class="uil uil-bell"></i>
                    <span class="link-name">Announcement</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'leadprojectcoordinator.event' ? 'active' : '' }}">
                <a href="{{ route('leadprojectcoordinator.event') }}" >
                    <i class="uil uil-calendar-alt"></i>
                    <span class="link-name">Event</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'leadprojectcoordinator.inquiry' ? 'active' : '' }}">
                <a href="{{ route('leadprojectcoordinator.inquiry') }}">
                    <i class="uil uil-question-circle">
                    @if ($unreadCount > 0)
                    <span class="badge badge-light" style="color: orange; font-weight: bold;position: absolute; top: -1px; right: 0; padding-right: 62%"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                        </svg>
                    </span>
                    @endif</i>
                    <span class="link-name">Inquiry</span>
                </a>
            </li>

            <li class="{{ Route::currentRouteName() == 'leadprojectcoordinator.progress' ? 'active' : '' }}">
                <a href="{{ route('leadprojectcoordinator.progress') }}">
                    <i class="uil uil-check-circle"></i>
                    <span class="link-name">Progress</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'leadprojectcoordinator.LoanReplenishView' ? 'active' : '' }}">
           
                <a href="{{ route('leadprojectcoordinator.LoanReplenishView') }}">
                    <i class="uil uil-clock"></i>
                    <span class="link-name">Loan Replenishes</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'leadprojectCoordinator.BlacklistView' ? 'active' : '' }}">
           
                <a href="{{ route('leadprojectCoordinator.BlacklistView') }}">
                    <i class="uil uil-x"></i>
                    <span class="link-name">Blacklisted</span>
                </a>
            </li>
            
            <li class="{{ Route::currentRouteName() == 'leadprojectcoordinator.registerView' ? 'active' : '' }}">
                <a href="{{ route('leadprojectcoordinator.registerView') }}" >
                    <i class="uil uil-user-plus"></i>
                    <span class="link-name">Registration</span>
                </a>
            </li>

            <div class="mode-toggle">

            </div>
            </li>

        </ul>
        <ul class="logout-mode">


            <li><a href="{{ route('leadprojectCoordinator.logout') }}">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

        </ul>

    </div>
</nav>
<div class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        <div class="heading">
            <h1>ALBAY PROVINCIAL AGRICULTURAL OFFICE</h1>
        </div>
        <div class="profile-dropdown">
            <a href="#">
                <i><img src="{{ !empty($userProfileData->photo) ? url('Uploads/Coordinator_Images/' . $userProfileData->photo) : url('Uploads/user-icon-png-person-user-profile-icon-20.png') }}"
                    class="rounded-circle" alt="User Profile Image"></i>

            </a>
            <ul class="sub-menus">
                <li class="profile-info">
                    <div class="profile-image">
                        <img src="{{ !empty($userProfileData->photo) ? url('Uploads/Coordinator_Images/' . $userProfileData->photo) : url('Uploads/user-icon-png-person-user-profile-icon-20.png') }}"
                            class="rounded-circle" alt="User Profile Image">
                    </div>
                    <span class="linkname">{{ $userProfileData->first_name }} {{ $userProfileData->last_name }}</span>
                </li>
                <li>
                    <a href="{{ route('leadprojectcoordinator.viewprofile') }}">
                        <i class="uil uil-user"></i> Profile
                    </a>
                </li>
                <li><a href="{{ route('leadprojectcoordinator.viewchangepassword') }}"><i class="uil uil-lock"></i> Change Password</a></li>
            </ul>
        </div>





    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="{{ asset('Assets/js/coordinator.js') }}"></script>
