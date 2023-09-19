<!DOCTYPE html>
<html>
<head>
    <title>Edit Program</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('Assets/css/itstaff.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
<div class="program-form">
    <form id="myForm" action="{{ route('edit_program') }}" method="post">
        @csrf
    <h1>Program Information</h1>
    
    <div class="form-row">
        <div class="input-group">
            <label for="name">Project Coordinator:</label>
            <input type="text" id="name" placeholder="Project Coordinator" value="John Doe" contenteditable="true">
        </div>
        <div class="input-group">
            <label for="program_name">Name of the Program:</label>
            <input type="text" id="program_name" placeholder="Program Name" value="Lorem Ipsum Program" contenteditable="true">
        </div>
        <div class="input-group">
            <label for="program_key">Program Key:</label>
            <input type="text" id="program_key" placeholder="" name="program_key"value="binhi">
        </div>
        <div class="input-group">
            <label for="loc">Location:</label>
            <input type="text" id="loc" placeholder="Location" value="City, Country" contenteditable="true">
        </div>

    </div>
    
    <div class="form-row">
        <div class="input-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" placeholder="Email Address" value="john@example.com" contenteditable="true">
        </div>
        <div class="input-group">
            <label for="contact">Contact Number:</label>
            <input type="tel" id="contact" placeholder="Contact Number" value="123-456-7890" contenteditable="true">
        </div>
        <div class="input-group">
            <label for="info">Program Information:</label>
            <textarea id="info" placeholder="Program Information" contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec aliquam nisi.</textarea>
        </div>
       
    </div>
    
    <div class="form-row1">
        <div class="input-group">
            <label for="apply">How to Apply:</label>
            <textarea id="apply" placeholder="How to Apply" contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel ultricies lacus.</textarea>
        </div>
        <div class="input-group">
            <label for="reqs">Guidelines and Requirements:</label>
            <textarea id="reqs" placeholder="Guidelines and Requirements" contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula arcu ac sapien dictum, vel commodo libero tristique.</textarea>
        </div>
        <div class="input-group">
            <label for="image">Image:</label>
            <input type="file" id="image" accept="image/*">
        </div>
    </div>
    </form>
    
    <div class="center">
        <input type="submit" value="Update">
    </div>
    <div class="center1">
    <a href="{{ url('/ITStaff/home') }}" class="button discard-button">Discard</a>
    </div>
</div>
</body>
</html>
