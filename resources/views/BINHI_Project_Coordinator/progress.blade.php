<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Progress Page</title>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('Assets/css/coordinator.css') }}">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   
</head>
<body>
@include('BINHI_Project_coordinator.Body.sidebarproj')

    <div class="title">
        <h1>Progress</h1>
    </div>
    
         <div class="boxes">
            <div class="box box-1">
                <h1>Beneficiaries</h1>
                <p>360</pathinfo>
            </div>
            <div class="box box-1 ">
                <h1>Active</h1>
                <p>298</pathinfo>
            </div>
            <div class="box box-2">
                <h1>Inactive</h1>
                <p>62</pathinfo>
            </div>
            <div class="box box-3">
                <h1>Progress %</h1>
                <div class="progress-bar"></div>
                <p></pathinfo>
            </div>
         </div>
         <div class="progress-container">
        <div class="progress-line">
        
            <!-- Steps with numbers will be added dynamically here -->
        </div>
        <ul id="progress-num" class="progress-num"></ul>

        </div>

         <div class="progress-section">
            <h2>Process</h2>
            <ul id="progress-list">
            <!-- Steps will be added dynamically here -->
            </ul>
            
            <div id="progress-percent"></div>
            <button id="add-step">Add Step</button>
        </div>

        
       
</div>

      


       
<script src="{{ asset('Assets/js/progress.js') }}"></script>
</body>
</html>
