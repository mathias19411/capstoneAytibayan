
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">APAO</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li>
                    <a href="{{ url('home') }}" class="{{ request()->is('home') ? 'active' : '' }}">
                        <i class="uil uil-home"></i>
                        <span class="link-name">Home</span>
                    </a>
                </li>
                <li>  
                    <a href="{{ url('') }}" class="{{ request()->is('') ? 'active' : '' }}">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Announcement</span>
                     </a>
                </li>
                <li>
                    <a href="{{ url('') }}" class="{{ request()->is('') ? 'active' : '' }}">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Event</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('') }}" class="{{ request()->is('') ? 'active' : '' }}">
                        <i class="uil uil-user-plus"></i>
                        <span class="link-name">Registration</span>
                    </a>
                </li>

                <div class="mode-toggle">
      
                </div>
            </li>
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