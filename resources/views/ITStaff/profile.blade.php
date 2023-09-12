<!DOCTYPE html>
<html>
<head>
    <title>Account Profile</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('Assets/css/UserProfile.css') }}">



   
</head>
@php
        //Access the authenticated user's id
$id = Illuminate\Support\Facades\AUTH::user()->id;

//Access the specific row data of the user's id
        //when using a model in blade.php, indicate the direct path of the model
        $userProfileData = App\Models\User::find($id);
    @endphp
<body class="profile"><div class="main-content">
    <!-- Top navbar -->
    
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="max-height: 150px; background-image: url('/images/background.png'); background-size: cover; background-position: center top;">


      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
     
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2">Hello {{ $userProfileData->first_name }}!</h1>
            <a href="{{ route('itstaff.home') }}" class="btn btn-info ">Back to Home</a>
           
         
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="\images\logo.png" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">{{ $userProfileData->first_name }} </span>
                      <span class="description">Given Name</span>
                    </div>
                    <div>
                      <span class="heading">{{ $userProfileData->middle_name }}</span>
                      <span class="description">Midldle Name</span>
                    </div>
                    <div>
                      <span class="heading"> {{ $userProfileData->last_name }}</span>
                      <span class="description">Last Name</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                {{ $userProfileData->email }}<span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">

                  <i class="ni location_pin mr-2"></i>Email Address<br>
                </div>

                <h3>
                {{ $userProfileData->phone }}<span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">

                  <i class="ni location_pin mr-2"></i>Phone Number<br>
                </div>
          

                <h3>
                {{ $userProfileData->primary_address }}, {{ $userProfileData->city }}, {{ $userProfileData->province }}, {{ $userProfileData->zip }}<span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">

                  <i class="ni location_pin mr-2"></i>Address<br>
                </div>
          
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My Account</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                <div class="form-group">     
                 
                    <label class="form-control-label" for="input-ProfileImage">Profile Image</label>
                  
                  
                    <div class="header1">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="input-ProfileImage" accept="image/*">
                      <label class="custom-file-label" for="input-ProfileImage"></label>
                    </div>
                    <div class="mt-2">
                      <!-- Image Preview -->
                      <img id="image-preview" src="{{ asset('path_to_user_image.jpg') }}" alt="" class="img-fluid">
                      <button type="button" id="delete-image" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Delete</button>
                    </div>
                  </div>
                    </div>
                
                  
                <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-FirstName">First Name</label>
                        <input type="text" id="nput-FirstName" class="form-control form-control-alternative" placeholder="FirstName" contenteditable="true" value= {{ $userProfileData->first_name }}>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-MiddleName">Middle Name</label>
                        <input type="text" id="input-MiddleName" class="form-control form-control-alternative" placeholder="MiddleName"  contenteditable="true" value= {{ $userProfileData->middle_name }}>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-LastName">Last Name</label>
                        <input type="text" id="input-LastName" class="form-control form-control-alternative" placeholder="LastName" contenteditable="true" value= {{ $userProfileData->last_name }}>
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    
                  <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="Email Address" value="{{ $userProfileData->email }}" readonly>
                  </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-Role">Role</label>
                      <input type="text" id="input-Role" class="form-control form-control-alternative" placeholder="Role" value="{{ $userProfileData->role }}" readonly>
                    </div>
                  </div>
                    
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-Phone">Phone Number</label>
                        <input type="number" class="form-control form-control-alternative" placeholder="Phone" contenteditable="true" value= {{ $userProfileData->phone }} >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Address"  type="text" contenteditable="true"  value= {{ $userProfileData->primary_address }}>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" contenteditable="true" value={{ $userProfileData->city}}>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-province">Country</label>
                        <input type="text" id="input-province" class="form-control form-control-alternative" placeholder="Province" contenteditable="true" value={{ $userProfileData->province }}>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-postal-code">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code" contenteditable="true" value={{ $userProfileData->zip }}>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <div class="button-container">
                  <button>Save Changes</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageInput = document.getElementById('input-ProfileImage');
        const imagePreview = document.getElementById('image-preview');
        const deleteImageBtn = document.getElementById('delete-image');
        
        // Listen for file input change
        imageInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };
                
                reader.readAsDataURL(this.files[0]);
            }
        });
        
        // Listen for delete image button click
        deleteImageBtn.addEventListener('click', function () {
            imageInput.value = ''; // Clear the file input
            imagePreview.src = '{{ asset('path_to_user_image.jpg') }}'; // Replace with the default image path
        });
    });
</script>
</body>