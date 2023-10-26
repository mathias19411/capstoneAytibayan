<nav id='menu'>
    <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>

    <div class="nav-left">
        <div class="nav-title">
            <div class="nav-brand">
                <a href="#" class="apao-logo">
                    <img src="{{ asset('images/APAO-R5.jpg') }}">
                    <span class="nav-item">APAO R-V</span>
                </a>
            </div>

        </div>
    </div>

    <div class="nav-right">
        <ul>
            <li><a href='{{ route('visitor.home') }}' class="scrollToTopButton">Home</a></li>
            {{-- <li><a class='dropdown-arrow' href='http://'>Products</a>
            <ul class='sub-menus'>
                <li><a href='http://'>Products 1</a></li>
                <li><a href='http://'>Products 2</a></li>
                <li><a href='http://'>Products 3</a></li>
                <li><a href='http://'>Products 4</a></li>
            </ul>
        </li> --}}
            <li><a href='#aboutSection'>About</a></li>
            <li><a class='dropdown-arrow' href='#programsView'>Programs</a>
            </li>
            <li><a href='#contact'>Contact Us</a></li>
            @if (Route::has('login'))
                @auth
                    @php
                        // Access the authenticated user
                        $user = auth()->user();
                        
                        // Access the role_name using the defined relationship
                        $roleName = $user->role->role_name;
                    @endphp
                    @if ($roleName === 'itstaff')
                        <li><a href="{{ url('/ITStaff/home') }}">Back to Dashboard</a></li>
                    @elseif($roleName === 'projectcoordinator')
                        <li><a href="{{ url('/BINHI_ProjectCoordinator/home') }}">Back to Dashboard</a></li>
                    @elseif($roleName === 'abakaprojectcoordinator')
                        <li><a href="{{ url('/ABAKA_ProjectCoordinator/home') }}">Back to Dashboard</a></li>
                    @elseif($roleName === 'agripinayprojectcoordinator')
                        <li><a href="{{ url('/AGRIPINAY_ProjectCoordinator/home') }}">Back to Dashboard</a></li>
                    @elseif($roleName === 'akbayprojectcoordinator')
                        <li><a href="{{ url('/AKBAY_ProjectCoordinator/home') }}">Back to Dashboard</a></li>
                    @elseif($roleName === 'leadprojectcoordinator')
                        <li><a href="{{ url('/LEAD_ProjectCoordinator/home') }}">Back to Dashboard</a></li>
                    @elseif($roleName === 'beneficiary')
                        <li><a href="{{ url('/Beneficiary/home') }}">Back to Dashboard</a></li>
                    @endif
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endauth
            @endif
        </ul>
    </div>

</nav>
