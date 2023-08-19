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
@endsection
