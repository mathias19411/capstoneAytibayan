<!DOCTYPE html>
<html>

<head>
    <title>Edit Program</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('Assets/css/itstaff.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('Assets/css/UserProfile.css') }}">

    {{-- Jquery CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="program-form">
        <form method="POST" id="myForm" action="{{ route('itstaff.updateProgram') }}">
            @csrf
            <h1>Program Information</h1>

            <div class="form-row">
                <div class="input-group">
                    <label for="name">Project Coordinator:</label>
                    <input type="text" id="name" placeholder="Project Coordinator"
                        value="{{ $program->coordinators->first()->first_name }} {{ $program->coordinators->first()->middle_name }} {{ $program->coordinators->first()->last_name }}"
                        readonly>
                </div>
                <div class="input-group">
                    <label for="programnameInput">Name of the Program:</label>
                    <input type="text" id="programnameInput" value="{{ $program->program_name }}"
                        contenteditable="true" name="programnameInput">
                    @error('programnameInput')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="password">New Program Key:</label>
                    <input type="password" id="password" placeholder="" name="password" placeholder="########">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" id="password_confirmation" placeholder="########"
                        name="password_confirmation">
                </div>

            </div>

            <div class="form-row">
                <div class="input-group">
                    <label for="inputLocation">Location:</label>
                    <input type="text" id="inputLocation" placeholder="Location" value="{{ $program->location }}"
                        contenteditable="true" name="inputLocation">
                    @error('inputLocation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="inputEmail">Email Address:</label>
                    <input type="email" id="inputEmail" placeholder="Email Address" value="{{ $program->email }}"
                        contenteditable="true" name="inputEmail">
                    @error('inputEmail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="inputContact">Contact Number:</label>
                    <input type="tel" id="inputContact" placeholder="Contact Number"
                        value="{{ $program->contact }}" contenteditable="true" name="inputContact">
                    @error('inputContact')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="inputInfo">Program Information:</label>
                    <textarea id="inputInfo" contenteditable="true" name="inputInfo" placeholder="{{ $program->description }}">{{ $program->description }}</textarea>
                    @error('inputInfo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="form-row1">
                <div class="input-group">
                    <label for="inputApply">How to Apply:</label>
                    <textarea id="inputApply" contenteditable="true" name="inputApply" placeholder="{{ $program->quiry }}">{{ $program->quiry }}</textarea>
                    @error('inputApply')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="inputReqs">Guidelines and Requirements:</label>
                    <textarea id="inputReqs" contenteditable="true" name="inputReqs" placeholder="{{ $program->requirements }}">{{ $program->requirements }}</textarea>
                    @error('inputReqs')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="input-ProfileImage">Program Image:</label>
                    <input type="file" class="custom-file-input form-control form-control-alternative"
                        id="input-ProfileImage" name="programPhoto">
                </div>
                <div class="image-container">
                    <img id="image-preview"
                        src="{{ !empty($program->image) ? url('Uploads/Program_images/' . $program->image) : url('Uploads/no-image.jpg') }}"
                        alt="User Profile Image" class="img-fluid-small  rounded-circle">
                    {{-- <span class="delete-icon" id="delete-image-btn">×</span> --}}
                </div>
            </div>


            <button type="submit" class="btn btn-primary me-2">Save Your Changes</button>


        </form>


        <div class="center1">
            <a href="{{ route('itstaff.home') }}" class="button discard-button">Discard</a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const imageInput = $('#input-ProfileImage');
            const imagePreview = $('#image-preview');
            const deleteImageBtn = $('#delete-image-btn');

            // Additional script for image input change (if needed)
            $('#input-ProfileImage').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
</body>

</html>
