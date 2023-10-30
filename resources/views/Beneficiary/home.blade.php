@extends('Beneficiary.beneficiary_main')

@section('content')
@include('beneficiary.Body.sidebar')

    <div class="title">
        <h1>Home</h1>
    </div>

    <div class="card-container">

                    <!-- Card 1 -->
        <div class="row">
            <div class="col-md-4">
                <div class="card-progress">
                    <h2 class="card-title">PROGRESS</h2>
                    <div class="card-content">
                    <div class="chart">
                    </div>

                    <div class="progressbar">
                        <ul>
                            <li>
                                <div class="progress one">
                                    <p>1</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">Lorem Ipsum</p>
                            </li>
                            <li>
                                <div class="progress two">
                                    <p>2</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">Fill Details</p>
                            </li>
                            <li>
                                <div class="progress three">
                                    <p>3</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">Make Payment</p>
                            </li>
                            <li>
                                <div class="progress four">
                                    <p>4</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">Order in Progress</p>
                            </li>
                            <li>
                                <div class="progress five">
                                    <p>5</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">Order Arrived</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <!-- Special Announcement -->
        <div class="col-md-8">
          <div class="card-project">
              <h2 class="card-title">PROJECTS</h2>
              <div class="card-content">
                <div class="project-info">
                    <div class="project-image">
                    <img src="/images/binhi_funrun.png">
                    </div> 
                    <div class="project-body">
                        <div class="project-title">Binhi ng Pag-asa Fun Run 2022</div> 
                        <div class="project-text"> This is some sample text for project. You can add more content here. </div>
                    </div>
                </div> 
                <div class="project-info">
                    <div class="project-image">
                    <img src="/images/binhi_funrun.png">
                    </div> 
                    <div class="project-body">
                        <div class="project-title">Binhi ng Pag-asa Fun Run 2022</div> 
                        <div class="project-text"> This is some sample text for project. You can add more content here. </div>
                    </div>
                </div> 
                <div class="project-info">
                    <div class="project-image">
                    <img src="/images/binhi_funrun.png">
                    </div> 
                    <div class="project-body">
                        <div class="project-title">Binhi ng Pag-asa Fun Run 2022</div> 
                        <div class="project-text"> This is some sample text for project. You can add more content here. </div>
                    </div>
                </div> 
              </div>
          </div>


        <div class="row">
            <div class="col-md-6">
                <div class="card-announcement">
                    <h2 class="card-title">ANNOUNCEMENT</h2>
                    <div class="card-content">
                      <div class="announcement-info">
                          <div class="announcement-title">From: Binhi ng Pag-asa Coordinator</div>
                          <div class="announcement-text">This is some sample text for annoucement. You can add more content here.</div>
                          <div class="time">3:35 AM</div>
                      </div>
                      <div class="announcement-info">
                          <div class="announcement-title">From: Binhi ng Pag-asa Coordinator</div>
                          <div class="announcement-text">This is some sample text for annoucement. You can add more content here.</div>
                          <div class="time">3:35 AM</div>
                      </div>
                      <div class="announcement-info">
                          <div class="announcement-title">From: Binhi ng Pag-asa Coordinator</div>
                          <div class="announcement-text">This is some sample text for annoucement. You can add more content here.</div>
                          <div class="time">3:35 AM</div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-event">
                    <h2 class="card-title">EVENT</h2>
                    <div class="card-content">     
                        <div class="event-info">
                            <div class="event-date">     
                                <div class="date">12</div>
                                <div class="month">Dec</div>
                            </div>   
                                <div class="event-title">Title: Seminar</div>
                                <div class="event-text">This is some sample text for event</div>
                                <div class="time">3:35 AM</div>
                        </div>
                        <div class="event-info">
                            <div class="event-date">     
                                <div class="date">12</div>
                                <div class="month">Dec</div>
                            </div>   
                                <div class="event-title">Title: Seminar</div>
                                <div class="event-text">This is some sample text for event</div>
                                <div class="time">3:35 AM</div>
                        </div>
                        <div class="event-info">
                            <div class="event-date">     
                                <div class="date">12</div>
                                <div class="month">Dec</div>
                            </div>   
                                <div class="event-title">Title: Seminar</div>
                                <div class="event-text">This is some sample text for event</div>
                                <div class="time">3:35 AM</div>
                        </div>
                        <div class="event-info">
                            <div class="event-date">     
                                <div class="date">12</div>
                                <div class="month">Dec</div>
                            </div>   
                                <div class="event-title">Title: Seminar</div>
                                <div class="event-text">This is some sample text for event</div>
                                <div class="time">3:35 AM</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>