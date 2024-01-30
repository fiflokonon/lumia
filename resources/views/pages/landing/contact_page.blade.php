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

<div class="banner-area contact">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Contactez-nous</h2>
                    <ul>
                        <li>
                            <a href="index.html"> Acceuil </a>
                            <i class="flaticon-fast-forward"></i>
                            <p class="active">Conctez-nous</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


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

