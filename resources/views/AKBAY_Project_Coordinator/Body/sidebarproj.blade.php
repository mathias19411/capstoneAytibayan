<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="\images\Logo_BinhiNgPagasa.png" alt="">
        </div>

        <span class="logo_name">AKBAY</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li>
                <a href="{{ route('akbayprojectcoordinator.beneficiaries') }}" class="{{ request()->is('AKBAY_Project_Coordinator/beneficiary') ? 'active' : '' }}">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Beneficiaries</span>
                </a>
            </li>
            <li>
                <a href="{{ route('akbayprojectcoordinator.announcement') }}" class="{{ request()->is('AKBAY_Project_Coordinator/announcement') ? 'active' : '' }}">
                    <i class="uil uil-bell"></i>
                    <span class="link-name">Announcement</span>
                </a>
            </li>
            <li>
                <a href="{{ route('akbayprojectcoordinator.event') }}" class="{{ request()->is('AKBAY_Project_Coordinator/event') ? 'active' : '' }}">
                    <i class="uil uil-calendar-alt"></i>
                    <span class="link-name">Event</span>
                </a>
            </li>
            <li>
                <a href="{{ route('akbayprojectcoordinator.inquiry') }}" class="{{ request()->is('AKBAY_Project_Coordinator/inquiry') ? 'active' : '' }}">
                    <i class="uil uil-question-circle"></i>
                    <span class="link-name">Inquiry</span>
                </a>
            </li>

            <li>
                <a href="{{ route('akbayprojectcoordinator.progress') }}" class="{{ request()->is('AKBAY_Project_Coordinator/progress') ? 'active' : '' }}">
                    <i class="uil uil-check-circle"></i>
                    <span class="link-name">Progress</span>
                </a>
            </li>
            <li>
                <a href="" class="">
                    <i class="uil uil-user-plus"></i>
                    <span class="link-name">Registration</span>
                </a>
            </li>

            <div class="mode-toggle">

            </div>
            </li>

        </ul>
        <ul class="logout-mode">


            <li><a href="{{ route('akbayprojectCoordinator.logout') }}">
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
                <i><img src="\images\logo.png" alt=""></i>

            </a>
            <ul class="sub-menus">
                <li class="profile-info">
                    <div class="profile-image">
                        <img src="\images\logo.png" alt="">
                    </div>
                    <span class="linkname">Project Coordinator 1</span>
                </li>
                <li>
                    <a href="">
                        <i class="uil uil-user"></i> Profile
                    </a>
                </li>
                <li><a href="#"><i class="uil uil-lock"></i> Change Password</a></li>
            </ul>
        </div>





    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="{{ asset('Assets/js/coordinator.js') }}"></script>
