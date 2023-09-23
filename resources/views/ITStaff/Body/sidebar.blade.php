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
            @auth
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}" class="{{ request()->is('ITStaff/register') ? 'active' : '' }}">
                            <i class="uil uil-user-plus"></i>
                            <span class="link-name">Registration</span>
                        </a>
                    </li>
                @endif
            @endauth

            <div class="mode-toggle">

            </div>
            </li>

        </ul>
        <ul class="logout-mode">


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
        <div class="profile-dropdown">
            <a href="#">
                <i><img src="{{ !empty($userProfileData->photo) ? url('Uploads/ITStaff_Images/' . $userProfileData->photo) : url('Uploads/user-icon-png-person-user-profile-icon-20.png') }}"
                        class="rounded-circle"></i>

            </a>
            <ul class="sub-menus">
                <li class="profile-info">
                    <div class="profile-image">
                        <img src="{{ !empty($userProfileData->photo) ? url('Uploads/ITStaff_Images/' . $userProfileData->photo) : url('Uploads/user-icon-png-person-user-profile-icon-20.png') }}"
                            class="rounded-circle">
                    </div>
                    <span class="linkname">{{ $userProfileData->first_name }} {{ $userProfileData->last_name }}</span>
                </li>
                <li>
                    <a href="{{ route('itstaff.viewprofile') }}">
                        <i class="uil uil-user"></i> Profile
                    </a>
                </li>
                <li><a href="{{ route('itstaff.viewchangepassword') }}"><i class="uil uil-lock"></i> Change
                        Password</a></li>
            </ul>
        </div>





    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Hide the name and submenus initially
            $(".sub-menus").hide();

            // Add a click event handler to the image
            $("i img").click(function() {
                // Toggle the visibility of the name and submenus
                $(".sub-menus").toggle();
            });
        });
    </script>

    <script src="{{ asset('Assets/js/itstaff.js') }}"></script>
