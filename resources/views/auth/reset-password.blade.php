{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    {{-- toastr CSS --}}
    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css> --}}
</head>

<body class="login">
    <div class="form-container">

        <form class="row g-3 login-form" method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="col-md-4 side-image">
                <img id="image" src="/images/APAO logo.png">
            </div>
            <div class="col-md-8 form">
                <div class="input-form">
                    <p> Reset your Password </p>
                    {{-- Email --}}
                    <div class="col-md-12 input">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" :value="old('email', $request->email)"
                        required autofocus autocomplete="username">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    {{-- Password --}}
                    <div class="col-md-12 input">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
                        <button type="button" id="showPasswordBtn1" class="btn btn-secondary" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye-slash"></i> <!-- Show Password Icon -->
                        </button>
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    {{-- Confirm Password --}}
                    <div class="col-md-12 input">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                        <button type="button" id="showPasswordBtn2" class="btn btn-secondary" onclick="togglePasswordVisibilityConfirmed()">
                            <i class="fas fa-eye-slash"></i> <!-- Show Password Icon -->
                        </button>
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    
                    <button type="submit" class="button log-button-item" style="margin-top: 1.5rem; font-size: 13px;">Reset Password</button>

                    {{-- <div class="col-12 login-button">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div> --}}

                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var showPasswordBtn = document.getElementById("showPasswordBtn1");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>'; // Show Password Icon
        } else {
            passwordInput.type = "password";
            showPasswordBtn.innerHTML = '<i class="fas fa-eye-slash"></i>'; // Hide Password Icon
        }
    }

    function togglePasswordVisibilityConfirmed() {
        var passwordInput = document.getElementById("password_confirmation");
        var showPasswordBtn = document.getElementById("showPasswordBtn2");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>'; // Show Password Icon
        } else {
            passwordInput.type = "password";
            showPasswordBtn.innerHTML = '<i class="fas fa-eye-slash"></i>'; // Hide Password Icon
        }
    }
</script>




</body>

</html>
