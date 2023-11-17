@extends('Visitor.visitor_home')
@section('visitor')
    <button id="scrollToTopButton">Scroll to Top</button>

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
            <div class="beneficiay-chart-section1">
                <div class="beneficiay-chart-section-charts-card">
                    <div class="chart-title">
                        <h4>Monthly Beneficiaries</h4>
                    </div>
                    <div id="line-chart"></div>
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
                    <a href="https://www.facebook.com/apao.albay2023" target="_blank" rel="noopener noreferrer"
                        class="read-more-button">Read More ></a>
                </div>
            </div>
            <div class="description-section">
                <p>In the province of Albay, located in Bicol Region Philippines, the Albay Provincial Agricultural Office 
                    (APAO) is the office assigned in implementing sustainable livelihood programs and is responsible for 
                    promoting agricultural development in Albay. There are currently five different SLPs operating in its 
                    office; the Abaka Mo Piso Mo Cash Incentive Scheme, Binhi ng Pag-asa Program, AgriPinay, Livelihood
                     Enhancement Agricultural Development (LEAD) Program, and the Agrikultura: Kaagapay ng Bayang Pinoy 
                     (AkBay) program. Each program requires APAO to gather data in marginalized communities, especially 
                     farmers in which it includes their demographic profile. 
                </p>
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
                            @foreach($announcement->reverse() as $announcement)
                            <span class="announcement-time">{{ $announcement->date }}</span>
                        </div>
                        <p>{{ $announcement->message }}</p>
                        @endforeach

                    </div>
                </div>
                <div class="announcements-read-more">
                <button type="button" class="btn read-more-button" data-bs-toggle="modal" data-bs-target="#read_announcement">Read Announcement</button>
                    <!--
                    <a href="https://chat.openai.com/" target="_blank" rel="noopener noreferrer"
                        class="read-more-button">More Announcements></a>
-->
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

    <section class="about" id="aboutSection">

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
            <div class="box_about lightbox" onclick="openImage(this)">
                <h2>Organizational Chart</h2>
                <img src="\images\apao_orgchart.png">
            </div>

            <div class="main">
                <h2> Vision </h2>
                <div class="line"></div>
                <p>A developed countryside and sustainable production areas led by strong, organized and self-reliant farmers and fisherfolk equipped
                    with modern technologies and entrepreneurial capability ensuring steady supply of farm produceto meet food sufficiency.
                </p>
                <h2> Mission </h2>
                <div class="line"></div>
                <p>To have an available and affordable food for Albayanos.</p>
                <h2 id="missionHeader"> Objectives </h2>
                <div class="line"></div>
                <p>To sustain production od staple foods(rice, corn, and root crops) and high value crops through the transfer of cost-effective,
                environment-friendly technologies to small farmers as well as increase in production areas.
                </p>
                <p>To improve financial food security through enhanced production, entrepreneurship, and greater market access.
                </p>
                <p>To encourage climate change adaptation measures in agriculture and fisheries to ensure food security through extension services, technical assistance,
                    and on-site research and demonstration farms.
                </p>
            </div>

            <div class="box_about lightbox" onclick="openImage(this)">
                <h2>History</h2>
                <img src="\images\history.png" alt="History Image" class="history">
                <div class="txt_history">APAO started in 2009 and drives to established agricultural development in Albay, it has been pivotal in 
                    implementing transformative programs. With a focus on data-driven decisions, 
                    APAO gathers demographic information from farmers to tailor effective initiatives, showcasing a history 
                    marked by adaptability and commitment to sustainable growth in Albay's agricultural sector.</div>
            </div>

        </div><script type="module" src=""></script>
    </section>

    <!------------------ PROGRAM ---------------------->

    <section class="programs_view" id="programsView">
        <div class="title">
            <h1>PROGRAMS</h1>
        </div>
        <div class="container">
            @foreach($programs as $program)
                <div class="box" id="agripinay">
                    <div class="content">
                        <img src="{{ !empty($program->image) ? url('Uploads/Program_images/' . $program->image) : url('Uploads/no-image.jpg') }}" alt="{{ $program->program_name }} logo">
                        <h3>{{ $program->program_name }}</h3>
                        <a href="{{ route('visitor.programsView', $program->id) }}" class="custom-link">
                            <button class="custom-button">View</button>
                        </a>
                    </div>
                </div>
                <!-- Replace 'column_name' with the actual column name you want to display -->
            @endforeach
            {{-- <div class="box" id="binhi-ng-pagasa">

                <div class="content">
                    <img src="\images\Logo_BinhiNgPagasa.png" alt="Image 1">
                    <h3>binhi ng pag-asa</h3>
                    <button onclick="showCategory('binhi-ng-pagasa')" id="binhiButton">View</button>
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
            </div> --}}
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
    <section class="contact" id="contact">
    
        <div class="row">
            <div class="col" id="title" style="margin-left: 10px; margin-top: 10px;">
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
                                    <img src="{{ URL('images/default.png') }}" class="img-fluid" alt=""
                                        id="coordinator_img">
                                </div>
                                <div id="c_description">
                                    <div id="c_name">Marife S. Azares</div>
                                    <div id="c_program">BINIHI NG PAG-ASA</div>
                                    <div id="phone"><i class="fa fa-phone" id="phone_icon"></i>XXXXXXXXXXX</div>
                                    <div id="email"><i class="fa fa-envelope" id="email_icon"></i>email.com</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" id="coordinators">
                            <div class="row">
                                <div>
                                    <img src="{{ URL('images/default.png') }}" class="img-fluid" alt=""
                                        id="coordinator_img">
                                </div>
                                <div id="c_description">
                                    <div id="c_name">Marife S. Azares</div>
                                    <div id="c_program">AKBAY</div>
                                    <div id="phone"><i class="fa fa-phone" id="phone_icon"></i>XXXXXXXXXXX</div>
                                    <div id="email"><i class="fa fa-envelope" id="email_icon"></i>email.com</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" id="coordinators">
                            <div class="row">
                                <div>
                                    <img src="{{ URL('images/default.png') }}" class="img-fluid" alt=""
                                        id="coordinator_img">
                                </div>
                                <div id="c_description">
                                    <div id="c_name">Marife S. Azares</div>
                                    <div id="c_program">LEAD</div>
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
                                    <img src="{{ URL('images/default.png') }}" class="img-fluid" alt=""
                                        id="coordinator_img">
                                </div>
                                <div id="c_description">
                                    <div id="c_name">Marife S. Azares</div>
                                    <div id="c_program">AGRIPINAY</div>
                                    <div id="phone"><i class="fa fa-phone" id="phone_icon"></i>XXXXXXXXXXX</div>
                                    <div id="email"><i class="fa fa-envelope" id="email_icon"></i>email.com</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" id="coordinators">
                            <div class="row">
                                <div>
                                    <img src="{{ URL('images/default.png') }}" class="img-fluid" alt=""
                                        id="coordinator_img">
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
                    <form method="post" action="{{ route('visitor.inquiry') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col">
                            <div class="row">
                                <div class="col-6">
                                    <label id="label_">Full Name:</label>
                                    <input class="form-control" type="text" id="textbox" name="fullname" required>
                                </div>
                                <div class="col-6">
                                    <label id="label_">Email:</label>
                                    <input class="form-control" type="text" name="email" id="textbox" required>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-6">
                                    <label id="label_">Contact Number:</label>
                                    <input class="form-control" type="text" name="contacts" id="textbox" required>
                                </div>
                                <div class="col-6">
                                    <label id="label_">To:</label>
                                    <select class="form-control" type="text" name="to" id="textbox" required>
                                        <option value="ABAKA">ABAKA</option>
                                        <option value="AGRIPINAY">AGRIPINAY</option>
                                        <option value="AKBAY">AKBAY</option>
                                        <option value="BINHI">BINHI</option>
                                        <option value="LEAD">LEAD</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div class="col">
                                <div class="row">
                                        <div class="col-6">
                                            <label id="label_">Date:</label>
                                            <input class="form-control" type="date" name="date" id="textbox" required>
                                        </div>
                                        <div class="col-6">
                                            <label id="label_">Attach File(Optional)</label>
                                            <input class="form-control" type="file" name="attachments" id="textbox">
                                        </div>
                                 </div>
                            </div>
                           
                       
                       
                            <div class="col-12" style="margin: 5px;">
                                <label id="label_">Message:</label>
                                <input class="form-control" type="text" name="message" id="textbox_m" required>
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

<!-- Read Announcement Modal -->
<div class="modal fade" id="read_announcement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="announcements-card">
                    <div class="announcements-card-date-time">
                        <div class="announcements-card-date-time-title">
                            <span class="material-symbols-outlined">
                            </span>
                            <span class="announcement-time"> </span>
                        </div>
                    </div>
        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="closee" data-bs-dismiss="modal">Close</button>
                <button type="button" class="add" id="save-schedule-button">Save</button>
            </div>
        </div>
    </div>
</div>
   <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS Bundle (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var programNames = {!! json_encode($programNames) !!};
        var beneficiaryCounts = {!! json_encode($beneficiaryCounts) !!};
        var months = {!! json_encode($months) !!};
        var monthCount = {!! json_encode($monthCount) !!};
    </script>
@endsection
