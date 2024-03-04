<!DOCTYPE html>
<html lang="fr">
@include('partials.landing.head')
<body>

<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
        </div>
    </div>
</div>

<!--Start:Navbar-->
@include('partials.landing.navbar')
<!--End:Navbar-->

<div class="banner-area about">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>À propos</h2>
                    <ul>
                        <li>
                            <a href="index.html"> Accueil </a>
                            <i class="flaticon-fast-forward"></i>
                            <p class="active"> À propos</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="shape-ellips">
    <img src="/assets/images/shape.png" alt="shape"/>
</div>

<span class="left-shape">
        <img src="/assets/images/left-shape.png" alt="shape"/>
    </span>

{{----}}


<section class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="single-about">
                    <div class="about-img">
                        <img src="/assets/images/about-img.png" alt="about" />
                    </div>
                    <div class="about-contnet">
                        <h2>Edvi National Children School & Center</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.typesetting. Remaining
                            essentially
                            unchanged. It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more recently with desktop publishing software like
                            Aldus PageMaker including versions of Lorem Ipsum.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>
                    <div class="about-btn">
                        <a href="about.html" class="box-btn">Know More</a>
                        <a href="https://www.youtube.com/watch?v=_ysd-zHamjk" class="video-pop">
                            <span class="video"> <i class="fa fa-play"></i> </span> Quick View at Edvi
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="about-content-right">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control about-search" placeholder="Search..." />
                        </div>
                        <button type="submit"> <i class="flaticon-search"></i></button>
                    </form>
                    <p class="visit">Visit More</p>
                    <ul class="about-list">
                        <li>
                            <a href="about.html"> <i class="flaticon-next"></i>Classes</a>
                        </li>
                        <li>
                            <a href="about.html"> <i class="flaticon-next"></i>Admission</a>
                        </li>
                        <li>
                            <a href="about.html"> <i class="flaticon-next"></i>Special Courses</a>
                        </li>
                        <li>
                            <a href="about.html"> <i class="flaticon-next"></i>Events</a>
                        </li>
                        <li>
                            <a href="about.html"> <i class="flaticon-next"></i>News</a>
                        </li>
                        <li>
                            <a href="about.html"> <i class="flaticon-next"></i>Teachers</a>
                        </li>
                    </ul>
                    <div class="consultation-area">
                        <h2>Get Free Consultation</h2>
                        <form class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Full name" />
                                </div>
                                <div class="col-md-12">
                                    <input type="email" class="form-control" placeholder="Your Email" />
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Phone" />
                                </div>
                                <div class="col-md-12">
                                    <textarea placeholder="Message" class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
                        <a href="about.html#" class="box-btn">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="choose-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 ps-0">
                <div class="home-choose-img">
                    <img src="/assets/images/choose1.png" alt="choose" />
                </div>
            </div>
            <div class="col-lg-6 home-choose">
                <div class="home-choose-content">
                    <div class="section-tittle">
                        <h2>Pourquoi nous choisir ?</h2>
                        <p>
                            School choice theory assumes that parents are rational actors that can gather and
                            consume information to find a school that matches their child's needs. Parents' desires
                            and ability to choose quality schools.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-12 col-md-5">
                            <ul class="choose-list-left">
                                <li><i class="flaticon-check-mark"></i>Top 10 Rated School</li>
                                <li> <i class="flaticon-check-mark"></i>Great Behaviour</li>
                                <li><i class="flaticon-check-mark"></i>Helpful & Kindnesss</li>
                                <li><i class="flaticon-check-mark"></i>Learning With Fun</li>
                                <li><i class="flaticon-check-mark"></i>Children Safety</li>
                            </ul>
                        </div>
                        <div class="col-lg-8 col-sm-12 col-md-7">
                            <div class="choose-list-home">
                                <ul>
                                    <li> <i class="flaticon-check-mark"></i>Eco Freindly Environment</li>
                                    <li> <i class="flaticon-check-mark"></i>Healthy Food & Water in Canteen</li>
                                    <li> <i class="flaticon-check-mark"></i>Health Care With Certified Dorctors</li>
                                    <li><i class="flaticon-check-mark"></i>Huge Playground With Children Park</li>
                                    <li><i class="flaticon-check-mark"></i>Physically Fit Buses With Experienced
                                        Driver</li>
                                </ul>
                            </div>
                        </div>
                        <a href="about.html" class="box-btn">Know More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.landing.contact')

@include('partials.landing.footer')

@include('partials.landing.scripts_included')

</body>

</html>


