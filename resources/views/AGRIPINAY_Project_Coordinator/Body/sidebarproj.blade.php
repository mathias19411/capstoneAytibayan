<nav>
    <div class="logo-name">
    <div class="logo-image">
            <a href="{{ route('visitor.home') }}">
                @if(!empty($programLogo))
                <img src="{{ asset('Uploads/images/'.$programLogo) }}" alt="Logo">
                @else
                <img src="\images\logo.png" alt="Logo">
                @endif
            </a>
        </div>

        <span class="logo_name">AGRIPINAY</span>
    </div>

    @php
        //Access the authenticated user's id
$id = Illuminate\Support\Facades\AUTH::user()->id;

//Access the specific row data of the user's id
        //when using a model in blade.php, indicate the direct path of the model
        $userProfileData = App\Models\User::find($id);
    @endphp

    <div class="menu-items">
        <ul class="nav-links">
        <li class="{{ Route::currentRouteName() == 'agripinayprojectcoordinator.beneficiaries' ? 'active' : '' }}">
                <a href="{{ route('agripinayprojectcoordinator.beneficiaries') }}">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Beneficiaries</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'agripinayprojectcoordinator.announcement' ? 'active' : '' }}">
                <a href="{{ route('agripinayprojectcoordinator.announcement') }}" >
                    <i class="uil uil-bell"></i>
                    <span class="link-name">Announcement</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'agripinayprojectcoordinator.event' ? 'active' : '' }}">
                <a href="{{ route('agripinayprojectcoordinator.event') }}" >
                    <i class="uil uil-calendar-alt"></i>
                    <span class="link-name">Event</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'agripinayprojectcoordinator.inquiry' ? 'active' : '' }}">
                <a href="{{ route('agripinayprojectcoordinator.inquiry') }}">
                    <i class="uil uil-question-circle"></i>
                    <span class="link-name">Inquiry</span>
                </a>
            </li>

            <li class="{{ Route::currentRouteName() == 'agripinayprojectcoordinator.progress' ? 'active' : '' }}">
                <a href="{{ route('agripinayprojectcoordinator.progress') }}">
                    <i class="uil uil-check-circle"></i>
                    <span class="link-name">Progress</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'agripinayprojectcoordinator.BlacklistView' ? 'active' : '' }}">
                <a href="{{ route('agripinayprojectCoordinator.BlacklistView') }}">
                    <i class="uil uil-x"></i>
                    <span class="link-name">Blacklisted</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'agripinayprojectcoordinator.registerView' ? 'active' : '' }}">
                <a href="{{ route('agripinayprojectcoordinator.registerView') }}" >
                    <i class="uil uil-user-plus"></i>
                    <span class="link-name">Registration</span>
                </a>
            </li>

            <div class="mode-toggle">

            </div>
            </li>

        </ul>
        <ul class="logout-mode">


            <li><a href="{{ route('agripinayprojectCoordinator.logout') }}">
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
                    <a href="{{ route('agripinayprojectcoordinator.viewprofile') }}">
                        <i class="uil uil-user"></i> Profile
                    </a>
                </li>
                <li><a href="{{ route('agripinayprojectcoordinator.viewchangepassword') }}"><i class="uil uil-lock"></i> Change Password</a></li>
            </ul>
        </div>





    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="{{ asset('Assets/js/coordinator.js') }}"></script>
