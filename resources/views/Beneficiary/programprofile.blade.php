
@php
        // Access the authenticated user's id
    $id = Illuminate\Support\Facades\Auth::user()->id;

// Access the specific row data of the user's id
// When using a model in blade.php, indicate the direct path of the model
$userProfileData = App\Models\User::find($id);

$authUser = Illuminate\Support\Facades\Auth::user();

$description = App\Models\Financialassistancestatus::find(1)->description;

        $statusName = App\Models\Financialassistancestatus::find(1)->financial_assistance_status_name;

if ($authUser->assistance) {
    $userAssistanceStatus = auth()->user()->financialAssistanceStatus->financial_assistance_status_name;
}
elseif ($authUser->loan){
    $userAssistanceStatus = auth()->user()->loanstatus->loan_status_name;
}
else {
    $userAssistanceStatus = $statusName;
}

        

        

        $descriptionStarted = App\Models\Financialassistancestatus::find(2)->description;

        $descriptionPending = App\Models\Financialassistancestatus::find(3)->description;

        $descriptionApproved = App\Models\Financialassistancestatus::find(4)->description;

        $descriptionDisbursed = App\Models\Financialassistancestatus::find(5)->description;

        $descriptionLoan = App\Models\Loanstatus::find(1)->description;

        $statusNameLoan = App\Models\Loanstatus::find(1)->loan_status_name;

        $descriptionStartedLoan = App\Models\Loanstatus::find(2)->description;

        $descriptionPendingLoan = App\Models\Loanstatus::find(3)->description;

        $descriptionApprovedLoan = App\Models\Loanstatus::find(4)->description;

        $descriptionDisbursedLoan = App\Models\Loanstatus::find(5)->description;


    @endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Program Profile</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('Assets/css/beneficiary.css') }}">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>
<body class="programprofile">
@include('Beneficiary.Body.sidebar')
  <div class="title">
        <h1>program profile</h1>
    </div>
    <aside class="profile-card">
  <div class="mask-shadow"></div>
  <header>


    <a href="">
    @if(!empty($programLogo))
                <img src="{{ asset('Uploads/Program_images/'.$programLogo) }}" alt="Logo">
                @else
                <img src="\images\logo.png" alt="Logo">
                @endif
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
          </div>
        @else
          <div class="profile-bio">
            <h1>Target Project Module:</h1>

            <p>None</p>

          </div>
          <div class="profile-bio">
            <h1>Organization:</h1>

            <p>None</p>
          </div>
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

 
 


 
</body>
</html>