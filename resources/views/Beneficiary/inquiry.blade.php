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
<body class="inquiry">
@include('beneficiary.Body.sidebar')
<div class="title">
        <h1>inquiry</h1>
    </div>
  <div class="inquiry-container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Albay Farmer's Village Complex </div>
          <div class="text-two">Camalig, Albay, Philippines</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+0098 9893 5647</div>
          <div class="text-two">+0096 3434 5678</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">APAO_albay@gmail.com</div>
          <div class="text-two">info.apao@gmail.com</div>
        </div>
      </div>
      <div class="right-side">

        <p></p>
      <form action="#">
      <div class="input-box">
      <label for="full-name" class="label">Full Name:</label>
      <input type="text" id="full-name" placeholder="" required>
    </div>
    <div class="input-box">
      <label for="email" class="label" >Personal Email:</label>
      <input type="email" id="email" placeholder="juandelacruz@gmail.com" required>
    </div>
    <div class="input-box">
      <label for="contact-number" class="label">Contact Number:</label>
      <input type="number" id="contact-number" placeholder="09xxxxxxxxx" required>
    </div>
    <div class="input-box">
      <label for="to" class="label">To:</label>
      <input type="text" id="to" placeholder="To" value="Binhi ng Pag-Asa Program" readonly>
    </div>
    <div class="input-box message-box">
      <label for="message" class="label">Message:</label>
      <textarea id="message" placeholder="" required></textarea>
    </div>

        <div class="button">
          <input type="button" value="Send" >
        </div>
      </form>
    </div>
    </div>
  </div>
</body>
</html>