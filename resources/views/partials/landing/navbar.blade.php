<!--Start:Navbar-->
<div class="navbar-area">
    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="/assets/images/logo-1.png" class="main-logo" alt="logo" style="height: 50px"/>
            <img src="/assets/images/logo-1.png" class="white-logo" alt="logo" style="height: 50px"/>
        </a>
    </div>
    <div class="main-nav" style="padding-top: 5px; padding-bottom: 5px;">
        <div class="container" >
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.html">
                    <img src="/assets/images/logo-1.png" class="main-logo" alt="logo" style="height: 50px"/>
                    <img src="/assets/images/logo-1.png" class="white-logo" alt="logo" style="height: 50px"/>
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav text-right">
                        <li class="nav-item">
                            <a href="/" class="nav-link active">Acceuil</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('formations') }}" class="nav-link dropdown-toggle">Formations</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('formations') }}" class="nav-link">Nos formations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="special-class.html" class="nav-link">Cours spéciaux</a>
                                </li>
                                <li class="nav-item">
                                    <a href="single-class.html" class="nav-link">Coaching</a>
                                </li>
                            </ul>
                        </li>

                        {{--<li class="nav-item">
                            <a href="index.html#" class="nav-link dropdown-toggle">Formateurs</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="single-teacher.html" class="nav-link">Tous nos formateurs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="single-teacher.html" class="nav-link">Formateurs honorés</a>
                                </li>
                            </ul>
                        </li>--}}
                        <li class="nav-item">
                            <a href="index.html" class="nav-link">Jobs & Emplois</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.html#" class="nav-link dropdown-toggle">Contenus scientifiques</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="news.html" class="nav-link">Acticles écrits</a>
                                </li>
                                <li class="nav-item">
                                    <a href="single-news.html" class="nav-link">Mémoires souténus</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link">À propos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">Contactez-nous</a>
                        </li>
                        @if(auth()->user())
                            <li class="nav-item" style="background-color: #ffe000; border: none;">
                                <a href="" class="nav-link dropdown-toggle">
                                   {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('show_profile') }}" class="nav-link">Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard') }}" class="nav-link">Tableau <span class="text-lowercase">de bord</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        <button type="submit" class="btn nav-link text-dark">Déconnexion</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="">
                                <a href="{{ route('login') }}" class="btn btn-info bg-none rounded-pill text-dark text-center" style="background-color: #ffe000; border: none; margin-top: 10px;">Espace membre</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!--End:Navbar-->
