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

<div class="banner-area admission">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Inscription à la formation</h2>
                    <ul>
                        <li>
                            <a href="index.html"> Accueil </a>
                            <i class="flaticon-fast-forward"></i>
                            <p class="active">Inscriptions aux formations</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="admission-area">
    <div class="container">
        <div class="section-tittle">
            <h2>Inscription <span class="text-lowercase">à la formation intitulée</span> {{ $formation->title }}</h2>
        </div>
        <div class="admission-form">
            <h2>Renseignez ce formulaire et soumettez votre candidature</h2>
            <form method="POST" action="">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Prénoms</label>
                        <input type="text" class="form-control" id="inputEmail14" value="{{ auth()->user()->first_name }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nom</label>
                        <input type="text" class="form-control" id="inputEmail15" value="{{ auth()->user()->last_name }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" id="inputEmail16" value="{{ auth()->user()->email }}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Téléphone</label>
                        <input type="tel" class="form-control" id="inputEmail17" value="{{ auth()->user()->phone }}" />
                    </div>
                    @foreach($formation->enrolment_questions() as $question)
                        <div class="form-group col-md-6">
                            <label>{{ $question->question_text }}</label>
                            <input type="text" class="form-control" id="inputEmail15"/>
                        </div>
                    @endforeach
                </div>
                <button class="box-btn" type="submit">Registration<button>
            </form>
        </div>
    </div>
</section>
<div class="shape-ellips">
    <img src="/assets/images/shape.png" alt="shape"/>
</div>

<span class="left-shape">
        <img src="/assets/images/left-shape.png" alt="shape"/>
</span>

{{----}}
@include('partials.landing.contact')

@include('partials.landing.footer')

@include('partials.landing.scripts_included')

</body>

</html>

