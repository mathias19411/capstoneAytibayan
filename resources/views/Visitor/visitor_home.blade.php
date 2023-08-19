<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albay Provincial Agricultural Office - Region V</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- Font-Awesome Link -->
    <script src="https://kit.fontawesome.com/b530089f5c.js" crossorigin="anonymous"></script>

    <!-- BoxIcons Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- google icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- css link -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('Assets/css/visitor.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

    {{-- toastr CSS --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}

{{-- 
    Take Backup and Restore in Localhost 
    php artisan config:cache
    php artisan cache:clear
    php artisan view:clear
    php artisan optimize
    --}}

{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}

<body>
    <div class="grid-container">

        <!-- header -->
        <!-- partial:partials/_header.html -->
        @include('Visitor.Body.navbar')
        <!-- header -->


        <!-- Header -->
        @include('Visitor.Body.header')
        <!-- Header -->

        <!-- main content -->
        @yield('visitor')
        <!-- main content -->


        <!-- footer -->
        @include('Visitor.Body.footer')
        <!-- footer -->

    </div>

    <!-- Apex Charts Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.41.0/apexcharts.min.js"></script>

    <!-- custom JS -->
    <script src="{{ asset('Assets/js/visitor.js') }}"></script>

    {{-- toastr js --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ", 'Info!', {
                        timeOut: 12000
                    });
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ", 'Success!', {
                        timeOut: 12000
                    });
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ", 'Warning!', {
                        timeOut: 12000
                    });
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ", 'Error!', {
                        timeOut: 12000
                    });
                    break;
            }
        @endif
    </script>

    {{-- Add Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/js/code/code.js') }}"></script>

</body>

<!-- <script>
    let menuBtn = document.querySelector('#menuBtn');
    let sidebar = document.querySelector('.sidebar');

    menuBtn.onclick = function() {
        sidebar.classList.toggle('active');
    };
</script> -->

</html>
