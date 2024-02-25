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

@php
    $fields = \App\Models\Field::all();
@endphp
<section class="signup-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="signup-form">
                    <div class="img-fix text-center">
                        <img src="assets/images/lumia.png" alt="logo" width="200px">
                    </div>
                    <h2 class="text-center">Inscrivez-vous !</h2>
                    <h5 class="text-center">Renseignez vos informations</h5>
                    <p></p>
                    @include('partials.back_message')
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="last_name" class="form-control" placeholder="Entrez votre nom" value="{{ old('last_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control" placeholder="Entrez votre/vos prénom(s)" value="{{ old('first_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select name="sex" class="form-control">
                                        <option value="" disabled>Sélectionnez votre sexe</option>
                                        <option value="M" {{ old('sex') == 'M' ? 'selected' : '' }}>Masculin</option>
                                        <option value="F" {{ old('sex') == 'F' ? 'selected' : '' }}>Féminin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Entre votre email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="tel" name="phone" class="form-control" placeholder="Entre votre numéro de télépone" value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select name="field" id="" class="form-control">
                                        <option value="" selected disabled>Sélectionnez votre secteur d'activité</option>
                                        @foreach($fields as $field)
                                        <option value="{{ $field->id }}">{{ $field->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-file-label mb-1">Entrez votre diplôme</label>
                                    <input type="file"  name="graduation" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password"  name="password_confirmation" class="form-control" placeholder="Confirmez votre mot de passe">
                                </div>
                            </div>
                            {{--
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkme">
                                    <label class="form-check-label" for="checkme">Remember me</label>
                                </div>
                            </div>--}}
                            <div class="col-lg-12">
                                <button type="submit" class="box-btn">Enregistrer</button>
                            </div>
                            <span class="already">Avez-vous déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a></span>
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

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
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
