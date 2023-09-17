<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
     <!-- Modal -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                <button type="button" class="add-modal" data-bs-toggle="modal" data-bs-target="#modal_announcement" >View</button>
            </div>
        </div>

    </div>


   <!--MODAL COORDINATOR-->
<div class="modal fade" id="modal_announcement" tabindex="-1" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">COORDINATORS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="accordion" id="coordinator_info">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="coordinator1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="coordinator_img">
                                            <img src="\images\orly.png">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5> Orly Encabo </h5>
                                        <h6> Binhi ng Pag-asa </h6>
                                    </div>
                                </div>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="coordinator1" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card_coordinator_img">
                                                <img src="\images\Logo_BinhiNgPagasa.png" alt="Binhi ng Pag-asa Logo">
                                            </div>
                                            <div class="col" style="padding-top:5px">
                                            <h6>Binhi ng Pag-asa</h6>
                                            <p>Project Coordinator</p>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="logo col-auto ml-auto">
                                            <img src="\images\Logo_BinhiNgPagasa.png" alt="Binhi ng Pag-asa Logo">
                                        </div> -->
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col" style="padding-top:10px">
                                            <p>
                                                Di ko pa alam ano pa ilalagay dito.
                                                Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                    </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="coordinator2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="coordinator_img">
                                            <img src="\images\orly.png">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5> Orly Encabo </h5>
                                        <h6> Binhi ng Pag-asa </h6>
                                    </div>
                                </div>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="coordinator2" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card_coordinator_img">
                                                <img src="\images\Logo_BinhiNgPagasa.png" alt="Binhi ng Pag-asa Logo">
                                            </div>
                                            <div class="col" style="padding-top:5px">
                                            <h6>Binhi ng Pag-asa</h6>
                                            <p>Project Coordinator</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="padding-top:10px">
                                            <p>
                                                Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="coordinator3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="coordinator_img">
                                            <img src="\images\orly.png">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5> Orly Encabo </h5>
                                        <h6> Binhi ng Pag-asa </h6>
                                    </div>
                                </div>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="coordinator3" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card_coordinator_img">
                                                <img src="\images\Logo_BinhiNgPagasa.png" alt="Binhi ng Pag-asa Logo">
                                            </div>
                                            <div class="col" style="padding-top:5px">
                                            <h6>Binhi ng Pag-asa</h6>
                                            <p>Project Coordinator</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="padding-top:10px">
                                            <p>
                                                Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.
                                            </p>
                                        </div>
                                    </div>
                                </div>                           
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="coordinator4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseTrue">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="coordinator_img">
                                            <img src="\images\orly.png">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5> Orly Encabo </h5>
                                        <h6> Binhi ng Pag-asa </h6>
                                    </div>
                                </div>
                                </button>
                            </h2>
                            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="coordinator4" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card_coordinator_img">
                                                <img src="\images\Logo_BinhiNgPagasa.png" alt="Binhi ng Pag-asa Logo">
                                            </div>
                                            <div class="col" style="padding-top:5px">
                                            <h6>Binhi ng Pag-asa</h6>
                                            <p>Project Coordinator</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="padding-top:10px">
                                            <p>
                                                Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.
                                            </p>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="coordinator5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="coordinator_img">
                                            <img src="\images\orly.png">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5> Orly Encabo </h5>
                                        <h6> Binhi ng Pag-asa </h6>
                                    </div>
                                </div>
                                </button>
                            </h2>
                            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="coordinator5" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card_coordinator_img">
                                                <img src="\images\Logo_BinhiNgPagasa.png" alt="Binhi ng Pag-asa Logo">
                                            </div>
                                            <div class="col" style="padding-top:5px">
                                            <h6>Binhi ng Pag-asa</h6>
                                            <p>Project Coordinator</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="padding-top:10px">
                                            <p>
                                                Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.
                                            </p>
                                        </div>
                                    </div>
                                </div>                         
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer"> </div>
        
         </div>
    </div>
</div>


    <!--SA MODAL/POPUP TO AH --> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
