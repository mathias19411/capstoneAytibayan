<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="\images\logo.png" alt="">
        </div>

        <span class="logo_name">APAO</span>
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
            <li>
                <a href="{{ route('itstaff.home') }}" class="{{ request()->is('ITStaff/home') ? 'active' : '' }}">
                    <i class="uil uil-home"></i>
                    <span class="link-name">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('itstaff.announcement') }}"
                    class="{{ request()->is('ITStaff/announcement') ? 'active' : '' }}">
                    <i class="uil uil-bell"></i>
                    <span class="link-name">Announcement</span>
                </a>
            </li>
            <li>
                <a href="{{ route('itstaff.event') }}" class="{{ request()->is('ITStaff/event') ? 'active' : '' }}">
                    <i class="uil uil-calendar-alt"></i>
                    <span class="link-name">Event</span>
                </a>
            </li>
            <li>
                <a href="{{ route('itstaff.registration') }}"
                    class="{{ request()->is('ITStaff/registration') ? 'active' : '' }}">
                    <i class="uil uil-user-plus"></i>
                    <span class="link-name">Registration</span>
                </a>
            </li>

            <div class="mode-toggle">

            </div>
            </li>

        </ul>
        <ul class="logout-mode">
      <li class="mode">
    <div class="profile-dropdown">
        <a href="#">
            <i><img src="\images\logo.png" alt=""></i>
            <span class="link-name">{{ $userProfileData->first_name }}</span>
            <i class="uil uil-angle-down"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="{{ route('itstaff.editProfile') }}">
                    <i class="uil uil-edit"></i>
                    <span class="link-name">Edit Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('itstaff.changePassword') }}">
                    <i class="uil uil-lock"></i>
                    <span class="link-name">Change Password</span>
                </a>
            </li>
        </ul>
    </div>
</li>


            <li><a href="{{ route('itstaff.logout') }}">
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
    </div>

    <script src="{{ asset('Assets/js/itstaff.js') }}"></script>
