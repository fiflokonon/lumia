<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Lumia consulting, connexion" />

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/meanmenu.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.min.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css" />

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />

    <link rel="stylesheet" href="assets/css/dark.css" />

    <link rel="stylesheet" href="assets/css/responsive.css" />
    <title>Lumia Consulting - Connexion</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.ico">
    <style>
        .buy-now-btn {
            display: none !important;
        }
        body{
            background-color: #fef6f6;
        }
    </style>
</head>

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


<section class="signup-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="signup-form">
                    <div class="img-fix text-center">
                        <img src="assets/images/lumia.png" alt="logo" width="200px">
                    </div>
                    <h2 class="text-center">Heureux de vous revoir!</h2>
                    <h5 class="text-center">Connectez-vous!</h5>
                    <p></p>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Entrez votre email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Entrez votre mot de passe">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button  type="submit" class="box-btn">
                                    Connectez-vous
                                </button>
                            </div>
                            <span class="already">Vous n'avez pas encore de compte ! <a href="{{ route('register') }}">Inscrivez-vous</a></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sign-up-img">
                    <img src="assets/images/signup.svg" alt="singup">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="copy-area">
    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <div class="copy">
                    <p>
                        Copyright @Fifonsi. All Rights Reserved by
                        <a href="https://fifonsi.net/" target="_blank"> Fifonsi.net</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<a href="signin.html#" class="scroll-top wow animate__animated animate__bounceInDown">
    <i class="fas fa-angle-double-up"></i>
</a>

<script src="assets/js/jquery.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.meanmenu.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>

<script src="assets/js/owl.carousel.min.js"></script>

<script src="assets/js/wow.min.js"></script>

<script src="assets/js/isotope.pkgd.min.js"></script>

<script src="assets/js/form-validator.min.js"></script>

<script src="assets/js/contact-form-script.js"></script>

<script src="assets/js/main.js"></script>
</body>

</html>
