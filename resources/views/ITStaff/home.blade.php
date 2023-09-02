<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('Assets/css/itstaff.css') }}">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body class="home">

    @include('ITStaff.Body.sidebar')

    <div class="dash-content">
        <div class="picture">
            <img src="\images\background.png" alt="Logo">
        </div>

        <div class="user-stats">
            <div class="total-users">
                <div class=name>
                    <h1>Beneficiaries</h1>
                </div>
                <p>Number of beneficiaries in the Sustainable Livelihood Program. </p>
                <div class="number-box1">
                    <div class="label-number">
                        <span class="label">Total Users</span>
                        <span class="number">1500 Beneficiaries</span>
                    </div>
                    <div class="number-line total-line"></div>
                </div>
            </div>
            <div class="inactive-active-users">
                <div class=name>
                    <h1>Accounts</h1><br>
                </div>
                <p>Number of beneficiaries who have accounts.<br> Active and Inactive Accounts </p>

                <div class="active">
                    <div class="number-box2">
                        <div class="label-number">
                            <span class="label">Active</span>
                            <span class="number">700 Beneficiaries</span>
                        </div>
                        <div class="number-line active-line"></div>
                    </div>
                </div>
                <div class="inactive">
                    <div class="number-box2">
                        <div class="label-number">
                            <span class="label">Inactive</span>
                            <span class="number">800 Beneficiaries</span>
                        </div>
                        <div class="number-line inactive-line"></div>
                    </div>
                </div>
            </div>
            `
        </div>


        <div class="overview">


            <div class="boxes">
                <div class="box box1">
                    <img src="\images\Logo_BinhiNgPagasa.png" alt="Image 1">
                    <span class="text">binhi ng pag-asa</span>
                    <span class="label">Total</span>
                    <span class="totalnumber">700 Beneficiaries</span>
                    <div class="number-line totalline"></div>

                    <span class="label">Active</span>
                    <span class="activenumber">400 Beneficiaries</span>
                    <div class="number-line activeline"></div>

                    <span class="label">Inactive</span>
                    <span class="inactivenumber">300 Beneficiaries</span>
                    <div class="number-line inactiveline"></div>

                    <a href="{{ url('/ITStaff/edit_program') }}" class="custom-link">
                        <button class="custom-button">View</button>
                    </a>


                </div>
                <div class="box box1">
                    <img src="\images\Logo_AgriPinay.png" alt="Image 2">
                    <span class="text">agripinay</span>
                    <span class="label">Total</span>
                    <span class="totalnumber">700 Beneficiaries</span>
                    <div class="number-line totalline"></div>

                    <span class="label">Active</span>
                    <span class="activenumber">400 Beneficiaries</span>
                    <div class="number-line activeline"></div>

                    <span class="label">Inactive</span>
                    <span class="inactivenumber">300 Beneficiaries</span>
                    <div class="number-line inactiveline"></div>

                    <a href="{{ url('/ITStaff/edit_program') }}" class="custom-link">
                        <button class="custom-button">View</button>
                    </a>
                </div>
                <div class="box box1">
                    <img src="\images\Logo_Akbay.png" alt="Image 3">
                    <span class="text">akbay</span>
                    <span class="label">Total</span>
                    <span class="totalnumber">700 Beneficiaries</span>
                    <div class="number-line totalline"></div>

                    <span class="label">Active</span>
                    <span class="activenumber">400 Beneficiaries</span>
                    <div class="number-line activeline"></div>

                    <span class="label">Inactive</span>
                    <span class="inactivenumber">300 Beneficiaries</span>
                    <div class="number-line inactiveline"></div>

                    <a href="{{ url('/ITStaff/edit_program') }}" class="custom-link">
                        <button class="custom-button">View</button>
                    </a>
                </div>
                <div class="box box1">
                    <img src="\images\Logo_AbacaMoPisoMo.png" alt="Image 4">
                    <span class="text">abaka mo, piso mo</span>
                    <span class="label">Total</span>
                    <span class="totalnumber">700 Beneficiaries</span>
                    <div class="number-line totalline"></div>

                    <span class="label">Active</span>
                    <span class="activenumber">400 Beneficiaries</span>
                    <div class="number-line activeline"></div>

                    <span class="label">Inactive</span>
                    <span class="inactivenumber">300 Beneficiaries</span>
                    <div class="number-line inactiveline"></div>

                    <a href="{{ url('/ITStaff/edit_program') }}" class="custom-link">
                        <button class="custom-button">View</button>
                    </a>
                </div>
                <div class="box box1">
                    <img src="\images\Logo_LEAD.png" alt="Image 4">
                    <span class="text">LEAD</span>
                    <span class="label">Total</span>
                    <span class="totalnumber">700 Beneficiaries</span>
                    <div class="number-line totalline"></div>

                    <span class="label">Active</span>
                    <span class="activenumber">400 Beneficiaries</span>
                    <div class="number-line activeline"></div>

                    <span class="label">Inactive</span>
                    <span class="inactivenumber">300 Beneficiaries</span>
                    <div class="number-line inactiveline"></div>

                    <a href="{{ url('/ITStaff/edit_program') }}" class="custom-link">
                        <button class="custom-button">View</button>
                    </a>
                </div>

                <a href="{{ url('/ITStaff/addprogram') }}" class="add-button">
                    <button class="plus-button">+</button>
                </a>
            </div>
        </div>

        <div class="coord">
            <div class="box">
                <span class="text">Coordinator</span>
                <span class="number">5</span>
                <button>View</button>
            </div>
        </div>

    </div>
</body>

</html>
