<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="\images\Logo_BinhiNgPagasa.png" alt="">
        </div>

        <span class="logo_name">BINHI NG PAG-ASA</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li>
                <a href="" class="">
                    <i class="uil uil-home"></i>
                    <span class="link-name">Home</span>
                </a>
            </li>
            <li>
                <a href="" class="">
                    <i class="uil uil-schedule"></i>
                    <span class="link-name">Schedule</span>
                </a>
            </li>
            <li>
                <a href="" class="">
                    <i class="uil uil-process"></i>
                    <span class="link-name">Update</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="uil uil-user-circle"></i>
                    <span class="link-name">Profile</span>
                </a>
            </li>

           

            <div class="mode-toggle">

            </div>
            </li>

        </ul>
        <ul class="logout-mode">


            <li><a href="{{ route('projectCoordinator.logout') }}">
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
        <div class="icons">
        <div class="notification-icon" id="notification-button">
                <i class="uil uil-bell"></i>
                <!-- Notification Dropdown -->
                <div class="notification-dropdown" id="notification-dropdown">
                <h2>Notifications</h2>
                <ul>
                        <li><a href="#">An announcement was posted!</a></li>
                        <li><a href="#">An event was added!</a></li>
                        <li><a href="#">A Progress was Updated!</a></li>
                        <li><a href="#">Your schedule has been set </a></li>
                    </ul>
                </div>
            </div>
            <div class="message-icon">
                <a href="#">
                    <i class="uil uil-comment-dots"></i>
                </a>
            </div>
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
                    <span class="linkname">Beneficiary</span>
                </li>
                <li>
                    <a href="">
                        <i class="uil uil-user"></i> Account
                    </a>
                </li>
                <li><a href="#"><i class="uil uil-lock"></i> Change Password</a></li>
            </ul>
        </div>





    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  



    <script src="{{ asset('Assets/js/beneficiary.js') }}"></script>
