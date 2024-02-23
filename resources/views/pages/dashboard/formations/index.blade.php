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
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/static/akademi/images/card/1.png" class="card-img-top" alt="Image illustrative">
                    <div class="card-body">
                        <h5 class="card-title">Titre de la formation 1</h5>
                        <p class="card-text">Description de la formation 1...</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Clôture des inscriptions: 21 Mars 2023</li>
                            <li class="list-group-item">Date de début: 28 Mars 2023</li>
                            <li class="list-group-item">Date de fin: 28 Mai 2023</li>
                            <li class="list-group-item">Prix: $200</li>
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
