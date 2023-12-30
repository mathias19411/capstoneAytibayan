{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Albay Provincial Agricultural Office - Region V</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('Assets/css/authentication.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" />
</head>

<body class="register">
    <div class="form-container">
        @php
        //Access the authenticated user's id
$userRole = Illuminate\Support\Facades\AUTH::user()->role->role_name;

$userProgram = Illuminate\Support\Facades\AUTH::user()->program->id;


//Access the specific row data of the user's id
        //when using a model in blade.php, indicate the direct path of the model
        // $userProfileData = App\Models\User::find($id);
    @endphp

        @if ($userRole === 'itstaff')
            <form class="row g-3 registration-form" method="POST" action="{{ route('register') }}">
                @csrf
                <h3> Albay Provincial Agricultural Office </h3>
                <div class="side-image">
                    <img src="/images/APAO logo.png">
                </div>
                <div class="col-md-4">
                    <label for="inputFirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="first_name"
                        placeholder="Firstname" required>
                    @error('first_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputMiddleName" class="form-label">Middle Initial</label>
                    <input type="text" class="form-control" id="inputMiddleName" name="middle_name"
                        placeholder="M.I.">
                    @error('middle_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Lastname"
                        required>
                    @error('last_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                        placeholder="example@gmail.com" required>
                    @error('inputEmail')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    {{-- <input type="hidden" name="password" value="ApaoAlbay2023"> --}}
                </div>
                <div class="col-md-6">
                    <label for="inputNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="inputNumber" name="phone_number"
                        placeholder="+63 9** *** ***9" required>
                    @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputRole" class="form-label">Role</label>
                    <select id="inputRole" class="form-select" name="inputRole">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ ucwords($role->role_name) }}</option>
                        @endforeach
                    </select>
                    @error('inputRole')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="col-md-6">
                    <label for="inputPrimaryAddress" class="form-label">Barangay</label>
                    <input type="text" class="form-control" id="inputPrimaryAddress" name="primaryAddress"
                        placeholder="Barangay" required>
                    @error('primaryAddress')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputProgram" class="form-label">Program</label>
                    <select id="inputProgram" class="form-select" name="inputProgram">
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">{{ ucwords($program->program_name) }}</option>
                        @endforeach
                    </select>
                    @error('inputProgram')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="col-md-4">
                    <label for="inputCity" class="form-label">City</label>
                    <select id="inputCity" class="form-select" name="inputCity">
                    <option value=""selected></option>
                        <option value="Camalig">Camalig</option>
                        <option value="Daraga">Daraga</option>
                        <option value="Guinobatan">Guinobatan</option>
                        <option value="Jovellar">Jovellar</option>
                        <option value="Legazpi City">Legazpi City</option>
                        <option value="Libon">Libon</option>
                        <option value="Ligao">Ligao</option>
                        <option value="Malilipot">Malilipot</option>
                        <option value="Malinao">Malinao</option>
                        <option value="Manito">Manito</option>
                        <option value="Oas">Oas</option>
                        <option value="Pioduran">Pioduran</option>
                        <option value="Sto.Domingo">Sto. Domingo</option>
                        <option value="Tabaco City">Tabaco City</option>
                        <option value="Tiwi">Tiwi</option>
                        <option value="Bacacay">Bacacay</option>
                    </select>
                    @error('inputCity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputProvince" class="form-label">Province</label>
                    <input type="text" class="form-control" id="inputProvince" name="inputProvince" value="Albay" readonly>
                    @error('inputProvince')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="inputZip" name="inputZip" placeholder="4500" value="4500"
                       >
                    @error('inputZip')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="inputStatus" class="form-label">Status</label>
                    <select id="inputStatus" class="form-select" name="inputStatus">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                        @endforeach
                    </select>
                    @error('inputStatus')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 register-button">
                    <button type="submit" class="button">Register</button>
                </div>
                <div class="col-lg-12 col-md-10" style="text-align: center;">
                    <h1 class="display-2"></h1>
                    <a href="{{ route('itstaff.home') }}" class="btn btn-info ">Back to Home</a>
                </div>
            </form>
        @else
            <form class="row g-3 registration-form" method="POST" action="{{ route('register') }}">
                @csrf
                <h3> Albay Provincial Agricultural Office </h3>
                <div class="side-image">
                    <img src="/images/APAO logo.png">
                </div>
                <div class="col-md-4">
                    <label for="inputFirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="first_name"
                        placeholder="John Sammi" required>
                    @error('first_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputMiddleName" class="form-label">Middle Initial</label>
                    <input type="text" class="form-control" id="inputMiddleName" name="middle_name"
                        placeholder="Diwally">
                    @error('middle_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Beatosai"
                        required>
                    @error('last_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                        placeholder="example@gmail.com" required>
                    @error('inputEmail')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    {{-- <input type="hidden" name="password" value="ApaoAlbay2023"> --}}
                </div>
                <div class="col-md-6">
                    <label for="inputNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="inputNumber" name="phone_number"
                        placeholder="9** *** ***9" required>
                    @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputRole" class="form-label">Role</label>
                    <select id="inputRole" class="form-select" name="inputRole" readonly>
                        @foreach ($roles as $role)
                            @if ($role->role_name === 'beneficiary')
                                <option value="{{ $role->id }}" selected>{{ ucwords($role->role_name) }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('inputRole')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <select id="inputCity" class="form-select" name="inputCity">
                        <option value=""selected></option>
                        <option value="Bacacay">Bacacay</option>
                        <option value="Camalig">Camalig</option>
                        <option value="Daraga">Daraga</option>
                        <option value="Guinobatan">Guinobatan</option>
                        <option value="Jovellar">Jovellar</option>
                        <option value="Legazpi City">Legazpi City</option>
                        <option value="Libon">Libon</option>
                        <option value="Ligao">Ligao</option>
                        <option value="Malilipot">Malilipot</option>
                        <option value="Malinao">Malinao</option>
                        <option value="Manito">Manito</option>
                        <option value="Oas">Oas</option>
                        <option value="Pioduran">Pioduran</option>
                        <option value="Rapu-rapu">Rapu-rapu</option>
                        <option value="Sto.Domingo">Sto. Domingo</option>
                        <option value="Tabaco City">Tabaco City</option>
                        <option value="Tiwi">Tiwi</option>

                    </select>
                    @error('inputCity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="inputProgram" class="form-label">Program</label>
                    <select id="inputProgram" class="form-select" name="inputProgram" readonly>
                        @foreach ($programs as $program)
                            @if ($program->id === $userProgram)
                                <option value="{{ $program->id }}" selected>{{ ucwords($program->program_name) }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('inputProgram')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="col-md-4">
                    <label for="primaryAddress" class="form-label">Barangay</label>
                    <select id="primaryAddress" class="form-select" name="primaryAddress" required>
                        <!-- Barangay options will be dynamically populated here -->
                    </select>
                    @error('primaryAddress')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputProvince" class="form-label">Province</label>
                    <input type="text" class="form-control" id="inputProvince" name="inputProvince" value="Albay" readonly>
                    @error('inputProvince')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="inputZip" name="inputZip" placeholder="4500"
                        value="4500" >
                    @error('inputZip')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="inputStatus" class="form-label">Status</label>
                    <select id="inputStatus" class="form-select" name="inputStatus">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                        @endforeach
                    </select>
                    @error('inputStatus')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 register-button">
                    <button type="submit" class="button">Register</button>
                </div>
                <div class="col-lg-12 col-md-10" style="text-align: center;">
                    <h1 class="display-2"></h1>
                    @if ($userRole === 'binhiprojectcoordinator')
                        <a href="{{ route('BINHI_Project_Coordinator.beneficiary') }}" class="btn btn-info ">Back to Home</a>
                    @elseif ($userRole === 'abakaprojectcoordinator')
                        <a href="{{ route('abakaprojectcoordinator.beneficiaries') }}" class="btn btn-info ">Back to Home</a>
                    @elseif ($userRole === 'agripinayprojectcoordinator')
                        <a href="{{ route('agripinayprojectcoordinator.beneficiaries') }}" class="btn btn-info ">Back to Home</a>
                    @elseif ($userRole === 'akbayprojectcoordinator')
                        <a href="{{ route('akbayprojectcoordinator.beneficiaries') }}" class="btn btn-info ">Back to Home</a>
                    @elseif ($userRole === 'leadprojectcoordinator')
                        <a href="{{ route('leadprojectcoordinator.beneficiaries') }}" class="btn btn-info ">Back to Home</a>
                    @endif
                    
                </div>
            </form>
        @endif
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
<!-- Add this to the head of your HTML file -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Define the barangays for each city
        var barangays = {
            'Bacacay': ['Baclayon', 'Banao', 'Bariw', 'Basud', 'Bayandong', 'Bonga (Upper)', 'Buang', 'Cabasan', 'Cagbulacao', 'Cagraray', 'Cajogutan', 'Cawayan', 'Damacan', 'Gubat Ilawod', 'Gubat Iraya', 'Hindi', 'Igang', 'Langaton', 'Manaet', 'Mapulang Daga', 'Mataas', 'Misibis', 'Nahapunan', 'Namanday', 'Namantao', 'Napao', 'Panarayon', 'Pigcobohan', 'Pili Ilawod', 'Pili Iraya', 'Barangay 1 (Pob.)', 'Barangay 10 (Pob.)', 'Barangay 11 (Pob.)', 'Barangay 12 (Pob.)', 'Barangay 13 (Pob.)', 'Barangay 14 (Pob.)', 'Barangay 2 (Pob.)', 'Barangay 3 (Pob.)', 'Barangay 4 (Pob.)', 'Barangay 5 (Pob.)', 'Barangay 6 (Pob.)', 'Barangay 7 (Pob.)', 'Barangay 8 (Pob.)', 'Barangay 9 (Pob.)', 'Pongco (Lower Bonga)', 'Busdac (San Jose)', 'San Pablo', 'San Pedro', 'Sogod', 'Sula', 'Tambilagao (Tambognon)', 'Tambongon (Tambilagao)', 'Tanagan', 'Uson', 'Vinisitahan-Basud (Mainland)', 'Vinisitahan-Napao (Island)'],
            'Camalig': ['Anoling', 'Baligang', 'Bantonan', 'Bariw', 'Binanderahan', 'Binitayan', 'Bongabong', 'Cabagñan', 'Cabraran Pequeño', 'Calabidongan', 'Comun', 'Cotmon', 'Del Rosario', 'Gapo', 'Gotob', 'Ilawod Moroña Compound', 'Iluluan', 'Libod', 'Ligban', 'Mabunga', 'Magogon', 'Manawan', 'Maninila', 'Mina', 'Miti', 'Palanog', 'Panoypoy', 'Pariaan', 'Quinartilan', 'Quirangay', 'Quitinday', 'Salugan', 'Solong', 'Sua', 'Sumlang', 'Tagaytay', 'Tagoytoy', 'Taladong', 'Taloto', 'Taplacon', 'Tinago', 'Tumpa', 'Barangay 1 (Pob.)', 'Barangay 2 (Pob.)', 'Barangay 3 (Pob.)', 'Barangay 4 (Pob.)', 'Barangay 5 (Pob.)', 'Barangay 6 (Pob.)', 'Barangay 7 (Pob.)', 'Caguiba'],
            'Daraga': ['Alcala', 'Alobo', 'Anislag', 'Bagumbayan', 'Balinad', 'Bañadero', 'Bañag', 'Bascaran', 'Bigao', 'Binitayan', 'Bongalon', 'Budiao', 'Burgos', 'Busay', 'Cullat', 'Canaron', 'Dela Paz', 'Dinoronan', 'Gabawan', 'Gapo', 'Ibaugan', 'Ilawod Area Pob. (Dist.2)', 'Inarado', 'Kidaco', 'Kilicao', 'Kimantong', 'Kinawitan', 'Kiwalo', 'Lacag', 'Mabini', 'Malabog', 'Malobago', 'Maopi', 'Market Area Pob. (Dist. 1)', 'Maroroy', 'Matnog', 'Mayon', 'Mi-isi', 'Nabasan', 'Namantao', 'Pandan', 'Peñafrancia', 'Sagpon', 'Salvacion', 'San Rafael', 'San Ramon', 'San Roque', 'San Vicente Grande', 'San Vicente Pequeño', 'Sipi', 'Tabon-tabon', 'Tagas', 'Talahib', 'Villahermosa'],
            'Guinobatan': ['Agpay', 'Balite', 'Banao', 'Batbat', 'Binogsacan Lower', 'Bololo', 'Bubulusan', 'Marcial O. Rañola (Cabaloaon)', 'Calzada', 'Catomag', 'Doña Mercedes (Naologan)', 'Doña Tomasa (Magatol)', 'Ilawod', 'Inamnan Pequeño', 'Inamnan Grande', 'Inascan', 'Iraya', 'Lomacao', 'Maguiron (Libas)', 'Maipon', 'Malabnig', 'Malipo', 'Malobago', 'Maninila', 'Mapaco', 'Masarawag', 'Matanglad', 'Mauraro', 'Minto', 'Morera', 'Muladbucad Pequeño', 'Muladbucad Grande', 'Ongo', 'Palanas', 'Poblacion', 'Pood', 'Quitago', 'Quibongbongan', 'Salvacion', 'San Francisco', 'San Jose (Ogsong)', 'San Rafael', 'Sinungtan', 'Tandarora', 'Travesia', 'Binogsacan Upper'],
            'Jovellar': ['Aurora Poblacion (Barangay 6)', 'Bagacay', 'Bautista', 'Cabraran', 'Calzada Poblacion (Barangay 7)', 'Del Rosario', 'Estrella', 'Florista', 'Mabini Poblacion (Barangay 2)', 'Magsaysay Poblacion (Barangay 4)', 'Mamlad', 'Maogog', 'Mercado Poblacion (Barangay 5)', 'Plaza Poblacion (Barangay 3)', 'Quitinday Poblacion (Barangay 8)', 'Rizal Poblacion (Barangay 1)', 'Salvacion', 'San Isidro', 'San Roque', 'San Vicente', 'Sinagaran', 'Villa Paz', 'White Deer Poblacion (Barangay 9)'],
            'Legazpi City': ['Arimbay', 'Bagacay', 'Bagong Abre', 'Banquerohan', 'EMs Barrio', 'Maoyod Pob.', 'Tula-tula', 'Ilawod West', 'Ilawod', 'Ilawod East', 'Kawit-East Washington Drive', 'Rizal Sreet., Ilawod', 'Cabagñan', 'EMs Barrio South', 'Cabagñan West', 'Binanuahan West', 'Binanuahan East', 'Imperial Court Subd','Cabagñan East','Lapu-lapu','Dinagaan','Victory Village South','Victory Village North','Sabang','EMs Barrio East','Kapantawan','Pigcale','Centro-Baybay','PNR-Peñaranda St.-Iraya','Oro Site-Magallanes St.','Tinago','Bitano','Bonot','Sagpon Pob.','Sagmin Pob.','Bañadero Pob.','Baño','Bagumbayan','Pinaric','Bariis','Bigaa','Bogtong','Bogña','Buenavista','Buyuan','Cagbacong','Cruzada','Dap-dap','Dita','Estanza','Gogon','Homapon','Imalnod','Mabinit','Mariawa','Maslog','Padang','Pawa','Puro','Rawis','San Francisco','San Joaquin','San Roque','Tamaoyan','Taysan','Matanag','Cabugao', 'Rizal Street', 'Buraguis', 'Lamba'],
            'Libon': ['Alongong','Apud','Bacolod','Zone I (Pob.)','Zone II (Pob.)','Zone III (Pob.)','Zone IV (Pob.)','Zone V (Pob.)','Zone VI (Pob.)','Zone VII (Pob.)','Bariw','Bonbon','Buga','Bulusan','Burabod','Caguscos','East Carisac','West Carisac','Harigue','Libtong','Linao','Mabayawas','Macabugos','Magallang','Malabiga','Marayag','Matara','Molosbolos','Natasan','Nogpo','Pantao','Rawis','Sagrada Familia','Salvacion','Sampongan','San Agustin','San Antonio','San Isidro','San Jose','San Pascual','San Ramon','San Vicente','Santa Cruz','Niño Jesus (Santo Niño Jesus)','Talin-talin','Tambo','Villa Petrona'],
            'Ligao': ['Abella','Allang','Amtic','Bacong','Bagumbayan','Balanac','Baligang','Barayong','Basag','Batang','Bay','Binanowan','Binatagan (Pob.)','Bobonsuran','Bonga','Busac','Busay','Cabarian','Calzada (Pob.)','Catburawan','Cavasi','Culliat','Dunao','Francia','Guilid','Herrera','Layon','Macalidong','Mahaba','Malama','Maonon','Nasisi','Nabonton','Oma-oma','Palapas','Pandan','Paulba','Paulog','Pinamaniquian','Pinit','Ranao-ranao','San Vicente','Santa Cruz (Pob.)','Tagpo','Tambo','Tandarora','Tastas','Tinago','Tinampo','Tiongson','Tomolin','Tuburan','Tula-tula Grande','Tula-tula Pequeño','Tupas'],
            'Malilipot': ['Binitayan','Calbayog','Canaway','Barangay I (Pob.)','Barangay II (Pob.)','Barangay III (Pob.)','Barangay IV (Pob.)','Barangay V (Pob.)','Salvacion','San Antonio Santicon (Pob.)','San Antonio Sulong','San Francisco','San Isidro Ilawod','San Isidro Iraya','San Jose','San Roque','Santa Cruz','Santa Teresa'],
            'Malinao': ['Awang','Bagatangki','Balading','Balza','Bariw','Baybay','Bulang','Burabod','Cabunturan','Comun','Diaro','Estancia','Jonop','Labnig','Libod','Malolos','Matalipni','Ogob','Pawa','Payahan','Poblacion','Bagumbayan','Quinarabasahan','Santa Elena','Soa','Sugcad','Tagoytoy','Tanawan','Tuliw'],
            'Manito': ['Balabagon','Balasbas','Bamban','Buyo','Cabacongan','Cabit','Cawayan','Cawit','Holugan','It-Ba (Pob.)','Malobago','Manumbalay','Nagotgot','Pawa','Tinapian'],
            'Oas': ['Badbad','Badian','Bagsa','Bagumbayan','Balogo','Banao','Bangiawon','Bongoran','Bogtong','Busac','Cadawag','Cagmanaba','Calaguimit','Calpi','Calzada','Camagong','Casinagan','Centro Poblacion','Coliat','Del Rosario','Gumabao','Ilaor Norte','Ilaor Sur','Iraya Norte','Iraya Sur','Manga','Maporong','Maramba','Moroponros','Matambo','Mayag','Mayao','Nagas','San Pascual (Nale)','Obaliw-Rinas','Petoria','Pistola','Ramay','Rizal','Saban','San Agustin','San Antonio','San Isidro','San Jose','San Juan','San Miguel','San Ramon','San Vicente (Suca)','Talisay','Talongog','Tapel','Tobgon','Tobog','Tablon'],
            'Pioduran': ['Agol','Alabangpuro','Basicao','Coastal','Basicao','Interior','Banawan','(Binawan)','Binodegahan','Buenavista','Buyo','Caratagan','Cuyaoyao','Flores','Lawinon','Macasitas','Malapay','Malidong','Mamlad','Marigondon','Matanglad','Nablangbulod','Oringon','Palapas','Panganiran','Barangay I (Pob.)','Barangay II (Pob.)','Barangay III (Pob.)','Barangay IV (Pob.)','Barangay V (Pob.)','Rawis','Salvacion','Santo Cristo','Sukip','Tibabo','La Medalla'],
            'Rapu-rapu': ['Bagaobawan','Batan','Bilbao','Binosawa','Bogtong','Buenavista','Buhatan','Calanaga','Caracaran','Carogcog','Dap','dap','Gaba','Galicia','Guadalupe','Hamorawon','Lagundi','Liguan','Linao','Malobago','Mananao','Mancao','Manila','Masaga','Morocborocan','Nagcalsot','Pagcolbon','Poblacion','Sagrada','San Ramon','Santa Barbara','Tinocawan','Tinopan','Viga','Villahermosa'],
            'Sto.Domingo': ['Baloc','Buasao','Burgos','Cabugao','Casulucan','Comitang','Concepcion','Dolores','General Luna','Hulo','Mabini','Malasin','Malayantoc','Mambarao','Poblacion','Malaya (Pook Malaya)','Pulong Buli','Sagaba','San Agustin','San Fabian','San Francisco','San Pascual','Santa Rita','Santo Rosario'],
            'Tabaco City': ['Agnas (San Miguel Island)','Bacolod','Bangkilingan','Bantayan','Baranghawon','Basagan','Basud (Pob.)','Bogñabong','Bombon (Pob.)','Bonot','San Isidro','Buang','Buhian','Cabagñan','Cobo','Comon','Cormidal','Divino Rostro (Pob.)','Fatima','Guinobat','Hacienda (San Miguel Island)','Magapo','Malictay (San Miguel Island)','Mariroc','Matagbac','Oras','Oson','Panal','Pawa','Pinagbobong','Quinale Cabasan (Pob.)','Quinastillojan','Rawis (San Miguel Island)','Sagurong (San Miguel Island)','Salvacion','San Antonio','San Carlos','San Juan (Pob.)','San Lorenzo','San Ramon','San Roque','San Vicente','Santo Cristo (Pob.)','Sua-Igot','Tabiguian','Tagas','Tayhi (Pob.)','Visita (San Miguel Island)'],
            'Tiwi': ['Bagumbayan','Bariis','Baybay','Belen (Malabog)','Biyong','Bolo','Cale','Cararayan','Coro-coro','Dap-dap','Gajo','Joroan','Libjo','Libtong','Matalibong','Maynonong','Mayong','Misibis','Naga','Nagas','Oyama','Putsan','San Bernardo','Sogod','Tigbi (Poblacion)'],
            // Add barangays for other cities here
        };

        // Function to update barangay options based on the selected city
        function updateBarangays(city) {
            var barangaySelect = $('#primaryAddress');
            barangaySelect.empty(); // Clear existing options

            if (city in barangays) {
                // Populate barangay options based on the selected city
                $.each(barangays[city], function (index, value) {
                    barangaySelect.append('<option value="' + value + '">' + value + '</option>');
                });
            }
        }

        // Initial update when the page loads
        updateBarangays($('#inputCity').val());

        // Event listener for city selection changes
        $('#inputCity').change(function () {
            updateBarangays($(this).val());
        });
    });
</script>
