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

<div class="banner-area events-bg">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Explorez <span class="text-lowercase">nos formations</span></h2>
                    <ul>
                        <li>
                            <a href="index.html"> Accueil </a>
                            <i class="flaticon-fast-forward"></i>
                            <p class="active"> Nos formations </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="events">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-events">
                    <div class="events-img">
                        <a href="single-events.html">
                            <img src="assets/images/events/img1.png" alt="events" />
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
                            <h2>Soccer completed successfully</h2>
                        </a>
                        <p class="text">
                            Spécialité : Management de projet
                            <br>
                            Fin des inscriptions : 01 April, 2021
                            <br>
                            Date de début : 01 April, 2021
                            <br>
                            Date de fin : 01 April, 2021
                            <br>
                            Prix : 80 000 FCFA
                        </p>
                        <a href="single-events.html" class="btn btn-primary text-light">S'inscrire</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <ul class="pagination">
                    <li class="page-item"></li>
                    <li class="page-item">
                        <a class="page-link" href="events.html#"><i class="flaticon-left-arrow"></i></a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="events.html#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="events.html#">2</a></li>
                    <li class="page-item"><a class="page-link" href="events.html#">3</a></li>
                    <li class="page-item"></li>
                    <li class="page-item">
                        <a class="page-link" href="events.html#"><i class="flaticon-next"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="shape-ellips">
    <img src="assets/images/shape.png" alt="shape"/>
</div>

<span class="left-shape">
        <img src="assets/images/left-shape.png" alt="shape"/>
</span>

{{----}}
@include('partials.landing.contact')

@include('partials.landing.footer')

@include('partials.landing.scripts_included')

</body>

</html>

