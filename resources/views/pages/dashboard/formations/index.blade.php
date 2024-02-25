@extends('pages.dashboard.index')
@section('page_title', 'Liste des formations')
<!--**********************************
    Content body start
***********************************-->
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title flex-wrap">
                    <div class="input-group search-area mb-md-0 mb-3">
                        <input type="text" class="form-control" placeholder="Search here...">
                        <span class="input-group-text"><a href="javascript:void(0)">
                                    <svg width="15" height="15" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.5605 15.4395L13.7527 11.6317C14.5395 10.446 15 9.02625 15 7.5C15 3.3645 11.6355 0 7.5 0C3.3645 0 0 3.3645 0 7.5C0 11.6355 3.3645 15 7.5 15C9.02625 15 10.446 14.5395 11.6317 13.7527L15.4395 17.5605C16.0245 18.1462 16.9755 18.1462 17.5605 17.5605C18.1462 16.9747 18.1462 16.0252 17.5605 15.4395V15.4395ZM2.25 7.5C2.25 4.605 4.605 2.25 7.5 2.25C10.395 2.25 12.75 4.605 12.75 7.5C12.75 10.395 10.395 12.75 7.5 12.75C4.605 12.75 2.25 10.395 2.25 7.5V7.5Z" fill="#01A3FF"/>
                                    </svg>
                                </a></span>
                    </div>
                    <div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">
                            + Nouvelle formation
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Image illustrative -->
                    <img src="/static/akademi/images/card/1.png" class="card-img-top" alt="Image illustrative">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <!-- Étoiles -->
                            <div>
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star{{ $i < 4 ? ' text-warning' : '' }}"></i>
                                @endfor
                            </div>
                            <!-- Dropdown pour les options -->
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-reddit dropdown-toggle" data-bs-toggle="dropdown">Acions</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
                                </div>
                            </div>
                        </div>
                        <!-- Titre et description -->
                        <h5 class="card-title">Titre de la formation 1</h5>
                        <p class="card-text mb-2">Description de la formation 1...</p>
                        <!-- Liste des détails de la formation -->
                        <ul class="list-group list-group-flush mb-1">
                            <li class="list-group-item py-1">Spécialité: </li>
                            <li class="list-group-item py-1">Clôture des inscriptions: 21 Mars 2023</li>
                            <li class="list-group-item py-1">Date de début: 28 Mars 2023</li>
                            <li class="list-group-item py-1">Date de fin: 28 Mai 2023</li>
                            <li class="list-group-item py-1">Prix: $200</li>
                            <li class="list-group-item py-1">Date de création: 28 Mai 2023</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Répétez cette structure pour chaque formation supplémentaire -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/static/akademi/images/card/1.png" class="card-img-top" alt="Image illustrative">
                    <div class="card-body">
                        <h5 class="card-title">Titre de la formation 2</h5>
                        <p class="card-text">Description de la formation 2...</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Date de clôture des inscriptions: 21 Mars 2023</li>
                            <li class="list-group-item">Date de début: 28 Mars 2023</li>
                            <li class="list-group-item">Date de fin de la formation: 28 Mai 2023</li>
                            <li class="list-group-item">Prix: $250</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Footer start
        ***********************************-->
    </div></div>
@endsection

<!--**********************************
            Content body end
***********************************-->
