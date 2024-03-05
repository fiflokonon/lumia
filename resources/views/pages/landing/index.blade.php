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

<section class="slider-area">
    <div class="home-slider owl-carousel owl-theme" data-bs-ride="carousel">
        <div class="single-slider single-slider-bg-1">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container" style="padding-bottom: 25px!important;">
                        <div class="row align-items-center">
                            <div class="col-lg-12 text-center">
                                <div class="slider-tittle one">
                                    <h1>
                                        Faites-vous former chez nous<span> et obtenez votre certifications</span>
                                    </h1>
                                    {{--                                    <p>
                                        In addition to these core schools, students in a given country may also
                                        attend schools before and after primary elementary in the and secondary
                                        middle school in the us education. Kindergarten or preschool.
                                    </p>--}}
                                </div>
                                <div class="slider-btn bnt2">
                                    <a href="{{ route('formations') }}" class="box-btn">Nos formations</a>
                                    <a href="#" class="border-btn">Jobs & Emplois</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider single-slider-bg-2">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12 text-center">
                                <div class="slider-tittle two">
                                    <h1>
                                        Accédez à une multitide d' <span>opportunités d'emploi</span>
                                    </h1>
                                    {{--<p>
                                    In addition to these core schools, students in a given country may also
                                    attend schools before and after primary elementary in the and secondary
                                    middle school in the us education. Kindergarten or preschool.
                                </p>--}}
                                </div>
                                <div class="slider-btn bnt2">
                                    <a href="{{ route('formations') }}" class="box-btn">Nos formations</a>
                                    <a href="#" class="border-btn">Jobs & Emplois</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="service-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single-service text-center">
                    {{--<div class="service-icon">
                        <i class="flaticon-clock"></i>
                    </div>--}}
                    <div class="service-content">
                        <h2>Experts formateurs</h2>
                        <p>Nous concevons et dispensons des formations spécialisées pour transmettre des connaissances,
                            des compétences et des bonnes pratiques à des professionnels ou des étudiants</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-service text-center">
                    {{--<div class="service-icon">
                        <i class="flaticon-pin"></i>
                    </div>--}}
                    <div class="service-content">
                        <h2>Construisez votre réseau</h2>
                        <p>Rencontrez des personnes, soyez curieux et impliquez-vous dans des activités pour établir des
                            relations utiles pour votre carrière.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="single-service text-center sst-10">
                    {{--<div class="service-icon">
                        <i class="flaticon-telephone"></i>
                    </div>--}}
                    <div class="service-content">
                        <h2>Nos missions</h2>
                        <p>Former les humanitaires, sauver des vies: Nous donnons le pouvoir d’agir aux femmes et aux
                            hommes qui se mobilisent partout dans le monde avec des formations adaptées et
                            reconnues.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="shape-ellips">
    <img src="assets/images/shape.png" alt="shape"/>
</div>

<section class="home-ragular-course pb-100">
    <div class="container">
        <div class="section-tittle text-center">
            <h2>Nos formations à venir</h2>
            <p>
                Ici la liste des formations dont les insciprions sont toujours ouvertes pour les semaines à venir. Vous
                pouvez vous y inscrire!
            </p>
        </div>
        @php
        $formations = \App\Models\Formation::all();
        @endphp
        {{--
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-ragular-course">
                    <div class="course-img">
                        <img src="assets/images/courses/img1.png" alt="ragular"/>
                        <h2>Formations en Gestion des D3E</h2>
                    </div>
                    <div class="course-content">
                        <p>
                            A classroom is a learning space, a room in which both children and adults learn.Parts of
                            education.
                        </p>
                        <a href="single-class.html" class="border-btn">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-ragular-course">
                    <div class="course-img">
                        <img src="assets/images/courses/img2.png" alt="ragular"/>
                        <h2>Initiation aux concepts de E-santé</h2>
                    </div>
                    <div class="course-content">
                        <p>
                            A classroom is a learning space, a room in which both children and adults learn.Parts of
                            education.
                        </p>
                        <a href="single-class.html" class="border-btn">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sst-10">
                <div class="single-ragular-course">
                    <div class="course-img">
                        <img src="assets/images/courses/img3.png" alt="ragular"/>
                        <h2>Cours spécial sur la planification des projets</h2>
                    </div>
                    <div class="course-content">
                        <p>
                            A classroom is a learning space, a room in which both children and adults learn.Parts of
                            education.
                        </p>
                        <a href="single-class.html" class="border-btn">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-ragular-course">
                    <div class="course-img">
                        <img src="assets/images/courses/img1.png" alt="ragular"/>
                        <h2>Formations en Gestion des D3E</h2>
                    </div>
                    <div class="course-content">
                        <p>
                            A classroom is a learning space, a room in which both children and adults learn.Parts of
                            education.
                        </p>
                        <a href="single-class.html" class="border-btn">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-ragular-course">
                    <div class="course-img">
                        <img src="assets/images/courses/img2.png" alt="ragular"/>
                        <h2>Initiation aux concepts de E-santé</h2>
                    </div>
                    <div class="course-content">
                        <p>
                            A classroom is a learning space, a room in which both children and adults learn.Parts of
                            education.
                        </p>
                        <a href="single-class.html" class="border-btn">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sst-10">
                <div class="single-ragular-course">
                    <div class="course-img">
                        <img src="assets/images/courses/img3.png" alt="ragular"/>
                        <h2>Cours spécial sur la planification des projets</h2>
                    </div>
                    <div class="course-content">
                        <p>
                            A classroom is a learning space, a room in which both children and adults learn.Parts of
                            education.
                        </p>
                        <a href="single-class.html" class="border-btn">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>--}}

    </div>
</section>
<section class="events">
    <div class="container bg-white">
        <div class="row">
            @foreach($formations as $formation)
                <div class="col-lg-4 col-md-6">
                    <div class="single-events">
                        <div class="events-img">
                            <a href="single-events.html">
                                <img src="/storage/formations/{{ $formation->image }}" alt="events" />
                            </a>
                        </div>

                        <div class="content">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <!-- Étoiles -->
                                <div>
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star{{ $i < 4 ? ' text-warning' : '' }}"></i>
                                    @endfor
                                </div>
                            </div>
                            <a href="single-events.html">
                                <h2>{{ $formation->title }}</h2>
                            </a>
                            <p class="text">
                                Spécialité : {{ $formation->field_speciality->title }}
                                <br>
                                Fin des inscriptions : {{ \Carbon\Carbon::parse($formation->enrolment_date)->locale('fr')->translatedFormat('d F Y')  }}
                                <br>
                                Date de début : {{ \Carbon\Carbon::parse($formation->start_date)->locale('fr')->translatedFormat('d F Y')  }}
                                <br>
                                Date de fin : {{ \Carbon\Carbon::parse($formation->end_date)->locale('fr')->translatedFormat('d F Y')  }}
                                <br>
                                Prix : {{ $formation->price }} FCFA
                            </p>
                            <a href="{{ route('enrol_formation', $formation->id) }}" class="btn btn-primary text-light">S'inscrire</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


{{--<section class="choose-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 ps-0">
                <div class="home-choose-img">
                    <img src="assets/images/choose1.png" alt="choose"/>
                </div>
            </div>
            <div class="col-lg-6 home-choose">
                <div class="home-choose-content">
                    <div class="section-tittle">
                        <h2>Why Choose Edvi?</h2>
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
                                <li><i class="flaticon-check-mark"></i>Great Behaviour</li>
                                <li><i class="flaticon-check-mark"></i>Helpful & Kindnesss</li>
                                <li><i class="flaticon-check-mark"></i>Learning With Fun</li>
                                <li><i class="flaticon-check-mark"></i>Children Safety</li>
                            </ul>
                        </div>
                        <div class="col-lg-8 col-sm-12 col-md-7">
                            <div class="choose-list-home">
                                <ul>
                                    <li><i class="flaticon-check-mark"></i>Eco Freindly Environment</li>
                                    <li><i class="flaticon-check-mark"></i>Healthy Food & Water in Canteen</li>
                                    <li><i class="flaticon-check-mark"></i>Health Care With Certified Dorctors</li>
                                    <li><i class="flaticon-check-mark"></i>Huge Playground With Children Park</li>
                                    <li><i class="flaticon-check-mark"></i>Physically Fit Buses With Experienced
                                        Driver
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="index.html" class="box-btn">Know More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}


{{--<section class="home-admission">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-addmission">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="admission-circle">
                                <h2>Admission <span> on Going</span></h2>
                                <div class="admission-shape1">
                                    <img src="assets/images/admission/shape1.png" alt="shape"/>
                                </div>
                                <div class="admission-shape2">
                                    <img src="assets/images/admission/shape2.png" alt="shape"/>
                                </div>
                                <div class="admission-shape3">
                                    <img src="assets/images/admission/shape3.png" alt="shape"/>
                                </div>
                                <div class="admission-shape4">
                                    <img src="assets/images/admission/shape4.png" alt="shape"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="admission-content">
                                <h2>Spring Term 2021 Admission for All Standard</h2>
                                <p>Admission will Close 30th March 2021. Time Remaining:</p>
                                <ul class="admission-list">
                                    <li>
                                        <p id="days">21</p>
                                        <span>Days</span>
                                    </li>
                                    <li>
                                        <p id="hours">15</p>
                                        <span>Hours</span>
                                    </li>
                                    <li>
                                        <p id="minutes">10</p>
                                        <span>Minute</span>
                                    </li>
                                    <li>
                                        <p id="seconds">50</p>
                                        <span>Seconds</span>
                                    </li>
                                </ul>
                                <a href="admission.html" class="box-btn">Admission Now</a>
                            </div>
                        </div>
                    </div>
                    <span class="loon">
                            <img src="assets/images/admission/shape5.png" alt="shape"/>
                        </span>
                </div>
            </div>
        </div>
    </div>
</section>--}}


<section class="home-special-course">
    <div class="container-fluid">
        <div class="section-tittle text-center">
            <h2>Nos domaines de formation</h2>
            <p>Ici le liste des domaines dans lesquels nous offrons des formations certifiantes.
                Après avoir suivi une formation dans un de ces domaines chez nous, vous aurez un certificat
                professionnel.
            </p>
        </div>
        <div class="home-course-slider owl-carousel owl-theme">
            <div class="single-home-special-course">
                <div class="course-img">
                    <img src="assets/images/courses/img4.png" alt="course"/>
                    <div class="course-content">
                        <h2>RH et finances</h2>
                        <p>
                            Paint lessons are a type of formal instruction in playing a musical instrument or
                            singing.
                        </p>
                        <a href="#" class="box-btn">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="single-home-special-course">
                <div class="course-img">
                    <img src="assets/images/courses/img5.png" alt="course"/>
                    <div class="course-content">
                        <h2>Management de santé</h2>
                        <p>
                            Science lessons are a type of formal instruction in playing a musical instrument or
                            singing.
                        </p>
                        <a href="#" class="box-btn">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="single-home-special-course">
                <div class="course-img">
                    <img src="assets/images/courses/img6.png" alt="course"/>
                    <div class="course-content">
                        <h2>Leadership</h2>
                        <p>
                            Science lessons are a type of formal instruction in playing a musical instrument or
                            singing.
                        </p>
                        <a href="#" class="box-btn">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="single-home-special-course">
                <div class="course-img">
                    <img src="assets/images/courses/img7.png" alt="course"/>
                    <div class="course-content">
                        <h2>Protection de l'enfance</h2>
                        <p>
                            Science lessons are a type of formal instruction in playing a musical instrument or
                            singing.
                        </p>
                        <a href="#" class="box-btn">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="course-slider-area">
    <div class="container">
        <div class="course-slider owl-carousel owl-theme">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5">
                    <div class="course-slider-img">
                        <img src="assets/images/courses/slider-img.png" alt="course"/>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="course-slider-content">
                        <h2>Cultural Program 01 April 2021</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                            Risus commodo viverra maecenas accumsan lacus vel facilisis suspendisse ultrices
                            gravida.
                        </p>
                        <div class="course-slider-btn">
                            <a href="index.html" class="box-btn">Registation Now</a>
                            <a href="index.html" class="border-btn">See More Events</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5">
                    <div class="course-slider-img">
                        <img src="assets/images/courses/slider-img2.png" alt="course"/>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="course-slider-content">
                        <h2>Annual Program 01 April 2021</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                            Risus commodo viverra maecenas accumsan lacus vel facilisis suspendisse ultrices
                            gravida.
                        </p>
                        <div class="course-slider-btn">
                            <a href="index.html" class="box-btn">Registation Now</a>
                            <a href="index.html" class="border-btn">See More Events</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<span class="left-shape">
        <img src="assets/images/left-shape.png" alt="shape"/>
    </span>

{{----}}

<section class="home-news pb-100 pt-100">
    <div class="container">
        <div class="section-tittle text-center">
            <h2>Nos dernières opportunités d'emploi</h2>
            <p>
                A college course is a class offered by a college or university. These courses are usually part of a
                program leading.
            </p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-home-news">
                    {{-- <a href="single-news.html">
                    <img src="assets/images/news/img1.png" alt="news"/>
                </a>--}}
                    <div class="single-home-content">
                        <h2>Assistant de direction</h2>
                        <p class="calender">
                            <i class="flaticon-calendar"></i> 01 April, 2021
                        </p>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content
                            of a page.
                        </p>
                        <a href="single-news.html" class="line-bnt">En savoir plus<i class="flaticon-next"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-home-news">
                    {{-- <a href="single-news.html">
                    <img src="assets/images/news/img2.png" alt="news"/>
                </a>--}}
                    <div class="single-home-content">
                        <h2>Analyste financier</h2>
                        <p class="calender">
                            <i class="flaticon-calendar"></i> 01 April, 2021
                        </p>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content
                            of a page.
                        </p>
                        <a href="single-news.html" class="line-bnt">En savoir plus<i class="flaticon-next"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sst-10">
                <div class="single-home-news">
                    {{--<a href="single-news.html">
                    <img src="assets/images/news/img3.png" alt="news"/>
                </a>--}}
                    <div class="single-home-content">
                        <h2>Aide-soignant</h2>
                        <p class="calender">
                            <i class="flaticon-calendar"></i> 01 April, 2021
                        </p>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content
                            of a page.
                        </p>
                        <a href="single-news.html" class="line-bnt">En savoir plus<i class="flaticon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-teachers-area">
    <div class="container">
        <div class="section-tittle text-center">
            <h2>Nos meilleurs formateurs</h2>
            <p>
                A college course is a class offered by a college or university. These courses are usually part of a
                program leading.
            </p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-home-teacher">
                    <div class="teacher-img">
                        <a href="single-teacher.html">
                            <img src="assets/images/teachers/img9.png" alt="teacher"/></a>
                    </div>
                    <div class="teachers-content">
                        <h2>John Doe</h2>
                        <p>Assistant Teacher</p>
                    </div>
                    <div class="teacher-social">
                        <ul>
                            <li>
                                <a href="index.html#"><i class="flaticon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-twitter"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-envelope"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-right-arrow"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-home-teacher">
                    <div class="teacher-img">
                        <a href="single-teacher.html">
                            <img src="assets/images/teachers/img8.png" alt="teacher"/></a>
                    </div>
                    <div class="teachers-content">
                        <h2>Evana Doe</h2>
                        <p>Teacher</p>
                    </div>
                    <div class="teacher-social">
                        <ul>
                            <li>
                                <a href="index.html#"><i class="flaticon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-twitter"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-envelope"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-right-arrow"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-home-teacher">
                    <div class="teacher-img">
                        <a href="single-teacher.html">
                            <img src="assets/images/teachers/img3.png" alt="teacher"/></a>
                    </div>
                    <div class="teachers-content">
                        <h2>Smith Doe</h2>
                        <p>English Teacher</p>
                    </div>
                    <div class="teacher-social">
                        <ul>
                            <li>
                                <a href="index.html#"><i class="flaticon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-twitter"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-envelope"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-right-arrow"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-home-teacher">
                    <div class="teacher-img">
                        <a href="single-teacher.html">
                            <img src="assets/images/teachers/img12.png" alt="teacher"/></a>
                    </div>
                    <div class="teachers-content">
                        <h2>Marida Doe</h2>
                        <p>Cultuaral Advisor</p>
                    </div>
                    <div class="teacher-social">
                        <ul>
                            <li>
                                <a href="index.html#"><i class="flaticon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-twitter"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-envelope"></i></a>
                            </li>
                            <li>
                                <a href="index.html#"><i class="flaticon-right-arrow"></i></a>
                            </li>
                        </ul>
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
