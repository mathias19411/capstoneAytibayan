@extends('Visitor.visitor_home')
@section('visitor')
    <div class="page-content">
        <div class="main-cards">
            <div class="image-section">
                <img src="{{ asset('images/image3.png') }}" alt="apao image" class="apao-big-image">
            </div>
            <div class="horizontal-scroll-image-section">
                <div class="horizontal-scroll-image-content">
                    <img src="{{ asset('images/history.png') }}" alt="apao image" class="apao-horizontal-images">
                    <img src="{{ asset('images/history.png') }}" alt="apao image" class="apao-horizontal-images">
                    <img src="{{ asset('images/history.png') }}" alt="apao image" class="apao-horizontal-images">
                    <img src="{{ asset('images/history.png') }}" alt="apao image" class="apao-horizontal-images">
                </div>

            </div>
            <div class="beneficiay-chart-section">
                <div class="beneficiay-chart-section-charts-card">
                    <div class="chart-title">
                        <h4>Number of Beneficiaries</h4>
                    </div>
                    <div id="bar-chart"></div>
                </div>
            </div>
            <div class="top-story-section">
                <div class="top-story-title">
                    <h3>Top Stories</h3>
                </div>
                <div class="stories-main">
                    <div class="story-card">
                        <div class="story-card-image">
                            <img src="{{ asset('images/APAO-R5.jpg') }}" alt="story image">
                        </div>
                        <div class="story-card-content">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat quidem
                                quibusdam
                                quasi
                                quidem quaerat quidem quibusdam quasi quidem quaerat quidem quibusdam quasi Lorem ipsum
                                dolor sit amet consectetur adipisicing elit. Quisquam quaerat quidem
                                quibusdam
                                quasi
                                quidem quaerat quidem quibusdam quasi quidem quaerat quidem quibusdam quasi</h5>
                        </div>
                    </div>
                    <div class="story-card">
                        <div class="story-card-image">
                            <img src="{{ asset('images/APAO-R5.jpg') }}" alt="story image">
                        </div>
                        <div class="story-card-content">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat quidem
                                quibusdam
                                quasi
                                quidem quaerat quidem quibusdam quasi quidem quaerat quidem quibusdam quasi</h5>
                        </div>
                    </div>
                </div>
                <div class="story-read-more">
                    <a href="https://chat.openai.com/" target="_blank" rel="noopener noreferrer"
                        class="read-more-button">Read More ></a>
                </div>
            </div>
            <div class="description-section">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo dolores, molestiae voluptatum rem
                    iure enim eos ut ex repellendus nobis ipsa suscipit odio. Repellat earum, eaque minus voluptatibus sed
                    cum sequi quod unde modi dignissimos provident numquam architecto odit culpa consequatur a temporibus
                    deleniti aspernatur, soluta maiores accusamus quisquam. Explicabo optio harum rerum culpa iste minima
                    eligendi totam labore voluptatem praesentium, libero sapiente quaerat repellat iure, dolores magnam
                    laborum tempora animi officiis cupiditate ex corporis eos veniam saepe. Qui, nam quaerat aut molestiae
                    sit ea id tenetur, minima, mollitia eveniet at doloribus ut. Qui, dolor fuga totam obcaecati nobis
                    repellat.</p>
            </div>
            <div class="announcements-section">
                <div class="announcements-title">
                    <h3>Announcements</h3>
                </div>

                <div class="announcements-card">
                    <div class="announcements-card-date-time">
                        <div class="announcements-card-date-time-title">
                            <span class="material-symbols-outlined">
                                schedule
                            </span>
                            <span class="announcement-time">3 min ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto consectetur dolore unde eius
                            praesentium distinctio dolor sunt, accusantium corporis voluptates labore officia veniam.
                            Obcaecati
                            explicabo harum aliquam blanditiis libero eaque?</p>

                    </div>
                </div>
                <div class="announcements-read-more">
                    <a href="https://chat.openai.com/" target="_blank" rel="noopener noreferrer"
                        class="read-more-button">More Announcements></a>
                </div>
            </div>
            <div class="events-section">
                <div class="events-title">
                    <h3>Upcoming Events</h3>
                </div>
                <div class="events-main">
                    <div class="events-card">
                        <div class="events-card-title-date">
                            <h2>11</h2>
                            <h4>MAR</h4>
                        </div>
                        <div class="events-card-content">
                            <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, iure.</h5>
                        </div>
                    </div>
                    <div class="events-card">
                        <div class="events-card-title-date">
                            <h2>11</h2>
                            <h4>MAR</h4>
                        </div>
                        <div class="events-card-content">
                            <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, iure.</h5>
                        </div>
                    </div>
                    <div class="events-card">
                        <div class="events-card-title-date">
                            <h2>11</h2>
                            <h4>MAR</h4>
                        </div>
                        <div class="events-card-content">
                            <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, iure.</h5>
                        </div>
                    </div>
                    <div class="events-card">
                        <div class="events-card-title-date">
                            <h2>11</h2>
                            <h4>MAR</h4>
                        </div>
                        <div class="events-card-content">
                            <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, iure.</h5>
                        </div>
                    </div>
                    <div class="events-card">
                        <div class="events-card-title-date">
                            <h2>11</h2>
                            <h4>MAR</h4>
                        </div>
                        <div class="events-card-content">
                            <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, iure.</h5>
                        </div>
                    </div>
                    <div class="events-card">
                        <div class="events-card-title-date">
                            <h2>11</h2>
                            <h4>MAR</h4>
                        </div>
                        <div class="events-card-content">
                            <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, iure.</h5>
                        </div>
                    </div>
                    <div class="events-card">
                        <div class="events-card-title-date">
                            <h2>11</h2>
                            <h4>MAR</h4>
                        </div>
                        <div class="events-card-content">
                            <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, iure.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about">

		<!--background slides!-->
		<div class="slides">
		<div class="slide slide1">
			<img id="img" src="\images\image1.png">
		</div>
		<div class="slide slide2">
			<img id="img" src="\images\image2.png">
		</div>
		<div class="slide slide3">
			<img id="img" src="\images\image3.png">
		</div>

	</div>

		<div class="container">
			<div class="box">
			    <h2>Organizational Chart</h2>
			    <img src="\images\orgchart.png">
			</div>

		 	<div class="main">
		  		<h2> About </h2>
				<div class="line"></div>
				<p>Lorem ipsum has no intelligible meaning Lorem ipsum has no intelligible meaning Lorem ipsum has no intelligible meaning Lorem ipsum has no intelligible meaningLorem ipsum has no intelligible meaning</p>
				<h2> Mandate </h2>
				<div class="line"></div>
				<p>Lorem ipsum has no intelligible meaning Lorem ipsum has no intelligible meaning Lorem ipsum has no intelligible meaning Lorem ipsum has no intelligible meaningLorem ipsum has no intelligible meaning</p>
				<h2> Mission </h2>
				<div class="line"></div>
				<p>Lorem ipsum has no intelligible meaning Lorem ipsum has no intelligible meaning Lorem ipsum has no intelligible meaning Lorem ipsum has no intelligible meaningLorem ipsum has no intelligible meaning</p>
			</div>

			<div class="box">
			    <h2>History</h2>
			    <img src="\images\history.png"> 
			    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
		  </div>
		</div>
</section>

<!------------------ PROGRAM ---------------------->
<div class="title">
        <h1>PROGRAMS</h1> 
    </div>
<section class="programs_view">
<div class="container">    
    <div class="box" id="binhi-ng-pagasa">

        <div class="content">
            <img src="\images\Logo_BinhiNgPagasa.png" alt="Image 1">
            <h3>binhi ng pag-asa</h3>
            <button onclick="showCategory('binhi-ng-pagasa')">View</button>
        </div>
    </div>
    <div class="box" id="agripinay">
        <div class="content">
            <img src="\images\Logo_AgriPinay.png" alt="Image 2">
            <h3>agripinay</h3>
            <button onclick="showCategory('agripinay')">View</button>
        </div>
    </div>
    <div class="box" id="akbay">
        <div class="content">
            <img src="\images\Logo_Akbay.png" alt="Image 3">
            <h3>akbay</h3>
            <button onclick="showCategory('akbay')">View</button>
        </div>
    </div>
    <div class="box" id="abaka-mo-piso-mo">
        <div class="content">
            <img src="\images\Logo_AbacaMoPisoMo.png" alt="Image 4">
            <h3>abaka mo, piso mo</h3>
            <button onclick="showCategory('abaka-mo-piso-mo')">View</button>
        </div>
    </div>
    <div class="box" id="lead">
        <div class="content">
            <img src="\images\Logo_Lead.png" alt="Image 5">
            <h3>LEAD</h3>
            <button onclick="showCategory('lead')">View</button>
        </div>
    </div>
</div>

<script>
function showCategory(category) {
    // Construct the URL for the category page with the selected category as a query parameter
    const url = "{{ route('Visitor.category.page', ['category' => ':category']) }}";
    const finalUrl = url.replace(':category', category);

    // Redirect the current window to the category page URL
    window.location.href = finalUrl;
}
</script>
</section>

<!------------------ CONTACT ---------------------->
<section class="contact">
<div class="grid-container">
</div>
	<div class="row">
		<div class="col" id="title">
			<h4><b>Location</b></h4>
			<div id="location_">
				<img src="{{ URL('images/APAO.png') }}" class="img-fluid" id="location_img">
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
								<img src="{{ URL('images/default.png') }}" class="img-fluid" alt="" id="coordinator_img">
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
								<img src="{{ URL('images/default.png') }}" class="img-fluid" alt="" id="coordinator_img">
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
								<img src="{{ URL('images/default.png') }}" class="img-fluid" alt="" id="coordinator_img">
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
								<img src="{{ URL('images/default.png') }}" class="img-fluid" alt="" id="coordinator_img">
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
								<img src="{{ URL('images/default.png') }}" class="img-fluid" alt="" id="coordinator_img">
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
</section>
@endsection
