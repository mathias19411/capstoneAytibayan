<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contacts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    /* Add custom styles for responsiveness */
    @media (max-width: 767px) {
      .col-md-5 {
        margin-left: 0;
      }
    }
    #title {
        margin-top: 10px;
        border: transparent;
        background-color: white;
        border-radius: 10px;
        padding-top: 10px;
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.3);
    }
    #location_ {
        margin: 10px;
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
		height: 30rem;
    }
	#location_img {
		height: 480px;
		border-radius: 10px;
	}
    #marker_style {
        font-size: 16px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #f0a60f;
        color: white;
    }

    #marker_icon {
        font-size: 24px;
        border: transparent;
        padding: auto;
        border-radius: 50%;
        background-color: #f0a60f;
        color: white;
        margin: auto;
    }
    #address {
        font-size: 16px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: auto;
    }
    #fb_icon {
    	font-size:24px; 
    	color: white; 
    	margin: auto; 
    	border: auto; 
    	padding-top: 4px; 
    	padding-bottom: 4px; 
    	padding-left: 8px; 
    	padding-right: 8px; 
    	border-radius: 50%; 
    	background-color: #f0a60f;
    }
    #ig_icon {
    	font-size: 24px; 
    	color: white; 
    	margin: auto; 
    	border: transparent; 
    	padding: 4px; 
    	border-radius: 50%; 
    	background-color: #f0a60f;
    }
    #tw_icon {
    	font-size:24px; 
    	color: white; 
    	margin: auto; 
    	border: transparent; 
    	padding: 4px; 
    	border-radius: 50%; 
    	background-color: #f0a60f;
    }
    #left_ {
    	border: transparent; 
    	background-color: #7bb701; 
    	border-radius: 10px; 
    	box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.3); 
    	margin-bottom: 10px; 
    	padding-top: 10px; 
    	padding-bottom: 10px;
    }
    #proj_coordinator {
    	text-align: center; 
    	color: white; 
    	white-space: nowrap; 
    	overflow: hidden;
    	text-overflow: ellipsis;
    }
    #coordinators {
    	border: transparent; 
    	background-color: white; 
    	border-radius: 10px; 
    	box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.3); 
    	margin-bottom: 10px; 
		width: fill;
		height: fit-content;
    }
	#profile {
		display: flex;
        justify-content: center;
        align-items: center;
	}
    #coordinator_img {
    	border: solid; 
    	border-radius: 10px; 
    	border-color: #7bb701; 
    	size: fill; 
    	height: 65px; 
    	width: 65px;
		margin: 10px;
    }
    #c_description {
    	margin-top: 10px; 
    	margin-bottom: 10px;
    	margin-left: 10px;
    }
    #c_name {
    	color: #7bb701; 
    	font-size: 12px;
    	white-space: nowrap; 
    	overflow: hidden; 
    	text-overflow: ellipsis;
    }
    #c_program {
    	font-size: 10px; 
    	white-space: nowrap; 
    	overflow: hidden;
    	text-overflow: ellipsis;
    }
    #phone {
    	font-size: 10px; 
    	white-space: nowrap; 
    	overflow: hidden;
    	text-overflow: ellipsis;
    }
    #phone_icon {
    	border: transparent; 
    	padding: 2px; 
    	border-radius: 50%; 
    	background-color: #f0a60f; 
    	color: white; 
    	margin: auto;
    }
    #email {
    	font-size: 10px; 
    	white-space: nowrap; 
    	overflow: hidden;
    	text-overflow: ellipsis;
    }
    #email_icon {
    	border: transparent; 
    	padding: 2px; 
    	border-radius: 50%; 
    	background-color: #f0a60f; 
    	color: white; 
    	margin: auto;
    }
    #inquiry {
    	border: transparent; 
    	border-radius: 10px; 
    	background-color: white; 
    	box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.3);
    }
    #inquiry_ {
    	padding-top: 10px;
    }
    #label_ {
    	white-space: nowrap; 
    	overflow: hidden;
    	text-overflow: ellipsis;
    }
    #textbox {
    	background-color: #f2f2f2; 
    	border-radius: 10px;
    }
    #textbox_m {
    	background-color: #f2f2f2; 
    	border-radius: 10px; 
    	padding-bottom: 80px
    }
    #button_ {
    	text-align-last: end; 
    	padding-top: 10px; 
    	padding-bottom: 10px;
    }
    #send_ {
    	margin: auto; 
    	background-color: #f0a60f; 
    	color: white; 
    	border-radius: 20px; 
    	padding: auto; 
    	text-align: center;
    }
  </style>
</head>
<body class="container-fluid" style="background-color: #f2f2f2; margin-bottom: 10px;">
	<div class="row">
		<div class="col" id="title">
			<h4><b>Location</b></h4>
			<div id="location_">
				<img src="{{ URL('googlemap/APAO.png') }}" class="img-fluid" id="location_img">
			</div>
			<div class="col">
			<div class="row" style="margin: 10px;">
				<div id="marker_style"><i class="fa fa-map-marker" id="marker_icon"></i></div>
				<div class="col" id="address">Albay Farmer's Village Complex, Camalig, Philippines</div>
			</div>
			</div>
			
			<div style="text-align: end; margin: 10px">
			<i class="fa fa-facebook" id="fb_icon"></i>
			<i class="fa fa-instagram" id="ig_icon"></i>
			<i class="fa fa-twitter" id="tw_icon"></i>
			</div>
		</div>
		<div class="col" style="margin-left: 10px; margin-top: 10px;">
			<div class="col-12" id="left_">
				<div id="proj_coordinator">Program Coordinators</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="col-12" id="coordinators">
						<div class="row">
							<div>
								<img src="{{ URL('googlemap/default.png') }}" class="img-fluid" alt="" id="coordinator_img">
							</div>
							<div id="c_description">
								<div id="c_name">Marife S. Azares</div>
								<div id="c_program">BINIHI NG PAG-ASA PROGRAM</div>
								<div id="phone"><i class="fa fa-phone" id="phone_icon"></i>XXXXXXXXXXX</div>
								<div id="email"><i class="fa fa-envelope" id="email_icon"></i>email.com</div>
							</div>
						</div>
					</div>
					<div class="col-12" id="coordinators">
						<div class="row">
							<div>
								<img src="{{ URL('googlemap/default.png') }}" class="img-fluid" alt="" id="coordinator_img">
							</div>
							<div id="c_description">
								<div id="c_name">Marife S. Azares</div>
								<div id="c_program">AKBAY PROGRAM</div>
								<div id="phone"><i class="fa fa-phone" id="phone_icon"></i>XXXXXXXXXXX</div>
								<div id="email"><i class="fa fa-envelope" id="email_icon"></i>email.com</div>
							</div>
						</div>
					</div>
					<div class="col-12" id="coordinators">
						<div class="row">
							<div>
								<img src="{{ URL('googlemap/default.png') }}" class="img-fluid" alt="" id="coordinator_img">
							</div>
							<div id="c_description">
								<div id="c_name">Marife S. Azares</div>
								<div id="c_program">LEAD PROGRAM</div>
								<div id="phone"><i class="fa fa-phone" id="phone_icon"></i>XXXXXXXXXXX</div>
								<div id="email"><i class="fa fa-envelope" id="email_icon"></i>email.com</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="col-12" id="coordinators">
						<div class="row">
							<div>
								<img src="{{ URL('googlemap/default.png') }}" class="img-fluid" alt="" id="coordinator_img">
							</div>
							<div id="c_description">
								<div id="c_name">Marife S. Azares</div>
								<div id="c_program">AGRIPINAY PROGRAM</div>
								<div id="phone"><i class="fa fa-phone" id="phone_icon"></i>XXXXXXXXXXX</div>
								<div id="email"><i class="fa fa-envelope" id="email_icon"></i>email.com</div>
							</div>
						</div>
					</div>
					<div class="col-12" id="coordinators">
						<div class="row">
							<div>
								<img src="{{ URL('googlemap/default.png') }}" class="img-fluid" alt="" id="coordinator_img">
							</div>
							<div id="c_description">
								<div id="c_name">Marife S. Azares</div>
								<div id="c_program">ABAKA MO, PISO MO</div>
								<div id="phone"><i class="fa fa-phone" id="phone_icon"></i>XXXXXXXXXXX</div>
								<div id="email"><i class="fa fa-envelope" id="email_icon"></i>email.com</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col" id="inquiry">
				<h5 id="inquiry_">Inquiry</h5>
				<form method="post">
					<div class="col">
						<div class="row">
							<div class="col-6">
								<label id="label_">Full Name:</label>
								<input class="form-control" type="text" id="textbox">
							</div>
							<div class="col-6">
								<label id="label_">Email:</label>
								<input class="form-control" type="text" name="email" id="textbox">
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<div class="col-6">
								<label id="label_">Contact Number:</label>
								<input class="form-control" type="text" name="contact" id="textbox">
							</div>
							<div class="col-6">
								<label id="label_">To:</label>
								<select class="form-control" type="text" name="to" id="textbox">
								</select>
							</div>
						</div>
					</div>
					<div>
					<div class="col-12" style="margin: 5px;">
						<label id="label_">Message:</label>
						<input class="form-control" type="text" name="message" id="textbox_m">
					</div>
					<div class="col" id="button_">
						<input type="submit" class="btn" value="Send" id="send_">
					</div>
					</div>
			   	</form>
			</div>
		</div>
		
	</div>
</body>
</html>