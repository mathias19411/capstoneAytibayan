
@include('beneficiary.Body.sidebar')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('Assets/css/beneficiary.css') }}">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>
<body class="programprofile">
<div class="title">
        <h1>program profile</h1>
    </div>
    <aside class="profile-card">
  <div class="mask-shadow"></div>
  <header>


    <a href="">
      <img src="\images\Logo_BinhiNgPagasa.png">
    </a>


    <h1>{{ $userProfileData->first_name }} {{ $userProfileData->middle_name }} {{ $userProfileData->last_name }}</h1>

    <h2>{{ $userProfileData->program->program_name }}</h2>

  </header>

@if ($userProfileData->assistance)
  <div class="profile-bio">
    <h1>Target Project Module:</h1>

    <p>{{ $userProfileData->assistance->project }}</p>

  </div>
  <div class="profile-bio">
    <h1>Organization:</h1>

    <p>None</p>

</div>
@elseif ($userProfileData->loan)
  <div class="profile-bio">
    <h1>Target Project Module:</h1>

    <p>{{ $userProfileData->loan->project }}</p>

  </div>
  <div class="profile-bio">
    <h1>Organization:</h1>

    <p>None</p>
@else
  <div class="profile-bio">
    <h1>Target Project Module:</h1>

    <p>None</p>

  </div>
  <div class="profile-bio">
    <h1>Organization:</h1>

    <p>None</p>
@endif
  
  <div class="profile-bio">
    <h1>Address:</h1>

    <p>{{ $userProfileData->barangay }}, {{ $userProfileData->city }}</p>

  </div>
  <div class="profile-bio">
    <h1>Contact Number:</h1>

    <p>{{ $userProfileData->phone }}</p>

  </div>
  <div class="profile-bio">
    <h1>Email:</h1>

    <p>{{ $userProfileData->email }}</p>

  </div>

 
 

</aside>
 
</body>
</html>