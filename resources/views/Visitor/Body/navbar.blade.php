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
            <li><a href='{{ route('visitor.dashboard') }}' class="scrollToTopButton">Home</a></li>
            {{-- <li><a class='dropdown-arrow' href='http://'>Products</a>
            <ul class='sub-menus'>
                <li><a href='http://'>Products 1</a></li>
                <li><a href='http://'>Products 2</a></li>
                <li><a href='http://'>Products 3</a></li>
                <li><a href='http://'>Products 4</a></li>
            </ul>
        </li> --}}
            <li><a href='#aboutSection'>About</a></li>
            <li><a class='dropdown-arrow' href='#missionHeader'>Programs</a>
                <ul class='sub-menus'>
                    <li><a href='http://'>BINHI NG PAG-ASA</a></li>
                    <li><a href='http://'>AKBAY</a></li>
                    <li><a href='http://'>LEAD</a></li>
                    <li><a href='http://'>AGRIPINAY</a></li>
                    <li><a href='http://'>ABAKA MO, PISO MO</a></li>
                </ul>
            </li>
            <li><a href='#binhiButton'>Contact Us</a></li>
            @if (Route::has('login'))
                @auth
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endauth
            @endif
        </ul>
    </div>

</nav>
