@extends('pages.dashboard.index')
@section('page_title', 'Liste des formations')
<!--**********************************
    Content body start
***********************************-->
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        @include('partials.back_message')
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
                            </a>
                        </span>
                    </div>
                    <div>
                        <!-- Button trigger modal -->
                        <a href="{{ route('add_formations') }}" class="btn btn-primary mb-2">
                            + Nouvelle formation
                        </a>
                    </div>
                </div>
            </div>
            @foreach($formations as $formation)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Image illustrative -->
                    <img src="/storage/formations/{{$formation->image}}" class="card-img-top" alt="Image illustrative">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <!-- Étoiles -->
                            <div>
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star{{ $i < 4 ? ' text-warning' : '' }}"></i>
                                @endfor
                            </div>
                            <!-- Dropdown pour les options -->
                            @if(isset($formation))
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-reddit dropdown-toggle" data-bs-toggle="dropdown">Actions</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);">Modifier</a>
                                    <a class="dropdown-item" href="{{ route('formation_enrolments', $formation->id) }}">Voir les inscriptions</a>
                                    <!-- Bouton pour ajouter une ressource -->
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addResourceModal">Ajouter une ressource</button>
                                    <a class="dropdown-item" href="{{ route('formation_resources', $formation->id) }}">Voir les ressources</a>
                                    @if($formation->type_formation->code == 'certified')
                                        @if(isset($formation->exams->first()->id))
                                            <a class="dropdown-item" href="{{ route('exam_details', $formation->exams->first->id) }}">Aperçu de l'examen</a>
                                        @else
                                            <a class="dropdown-item" href="{{ route('add_exam', $formation->id) }}">Ajouter l'évaluation</a>
                                        @endif
                                    @elseif($formation->type_formation->code == 'specific')
                                        <a class="dropdown-item" href="{{ route('formation_exam_list', $formation->id) }}">Liste des évaluations</a>
                                        <a class="dropdown-item" href="{{ route('add_exam', $formation->id) }}">Ajouter une évaluation</a>
                                    @else
                                        @if(isset($formation->exams->first()->id))
                                            <a class="dropdown-item" href="{{ route('exam_details', $formation->exams->first->id) }}">Aperçu de l'examen</a>
                                        @else
                                            <a class="dropdown-item" href="{{ route('add_exam', $formation->id) }}">Ajouter l'évaluation</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                        <!-- Titre et description -->
                        <h5 class="card-title">{{ $formation->title }}</h5>
                        <p class="card-text mb-2">{{ $formation->description }}</p>
                        <p class="card-text text-danger mb-2">{{ $formation->type_formation->title }}</p>
                        <!-- Liste des détails de la formation -->
                        <ul class="list-group list-group-flush mb-1">
                            <li class="list-group-item py-1"> <b>Spécialité:</b> {{ $formation->field_speciality->title }}</li>
                            @if(isset($formation->place))
                            <li class="list-group-item py-1"> <b>Lieu:</b> {{ $formation->place }}</li>
                            @endif
                            <li class="list-group-item py-1"> <b>Clôture des inscriptions:</b> {{ \Carbon\Carbon::parse($formation->enrolment_date)->locale('fr')->translatedFormat('d F Y')  }} </li>
                            <li class="list-group-item py-1"><b>Date de début:</b>  {{ \Carbon\Carbon::parse($formation->start_date)->locale('fr')->translatedFormat('d F Y')  }}</li>
                            <li class="list-group-item py-1"> <b>Date de fin:</b> {{ \Carbon\Carbon::parse($formation->end_date)->locale('fr')->translatedFormat('d F Y')  }}</li>
                            <li class="list-group-item py-1"><b>Prix:</b> {{ $formation->price }} Franc CFA</li>
                            <li class="list-group-item py-1"><b>Date de création:</b> {{ \Carbon\Carbon::parse($formation->created_at)->locale('fr')->translatedFormat('d F Y')  }}</li>
                        </ul>
                        @if($formation->progress_status != 'closed')
                            <a href="{{ route('close_formation', $formation->id) }}" class="btn text-light" style="background-color: darkred">Déclarer comme terminée</a>
                        @else
                            <button class="btn btn-outline-success text-center">Déjà terminée</button>

                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--**********************************
            Footer start
        ***********************************-->
    </div>
</div>
@if(isset($formation))
<!-- Modal pour ajouter une ressource -->
<div class="modal fade" id="addResourceModal" tabindex="-1" aria-labelledby="addResourceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addResourceModalLabel">Ajouter une ressource</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire pour ajouter une ressource -->
                <form method="POST" action="{{ route('add_resources', $formation->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="resourceTitle" class="form-label">Titre</label>
                        <input type="text" name="title" class="form-control" id="resourceTitle" placeholder="Titre de la ressource" value="{{ old('title') }}">
                    </div>
                    <div class="mb-3">
                        <label for="resourceDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="resourceDescription" rows="3" placeholder="Description de la ressource"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="resourceType" class="form-label">Type de ressource</label>
                        <select class="form-control" name="type" id="resourceType">
                            <option value="" selected disabled>Sélectionnez un type de ressource</option>
                            <option value="link">Lien</option>
                            <option value="file">Fichier</option>
                        </select>
                    </div>
                    <div class="mb-3" id="fileUploadContainer" style="display: none;">
                        <label for="resourceFile" class="form-label">Fichier</label>
                        <input type="file" name="file" value="{{ old('file') }}" class="form-control" id="resourceFile">
                    </div>
                    <div class="mb-3" id="linkInputContainer" style="display: none;">
                        <label for="resourceLink" class="form-label">Lien</label>
                        <input type="text" value="{{ old('link') }}" name="link" class="form-control" id="resourceLink" placeholder="Lien de la ressource">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Afficher/masquer le champ de téléchargement de fichier en fonction du type sélectionné
    document.getElementById('resourceType').addEventListener('change', function() {
        var fileUploadContainer = document.getElementById('fileUploadContainer');
        var linkInputContainer = document.getElementById('linkInputContainer');

        if (this.value === 'file') {
            fileUploadContainer.style.display = 'block';
            linkInputContainer.style.display = 'none';
        }else if (this.value === 'link') {
            fileUploadContainer.style.display = 'none';
            linkInputContainer.style.display = 'block';
        }else{
            fileUploadContainer.style.display = 'none';
            linkInputContainer.style.display = 'none';
        }
    });
</script>
@endif

@endsection


<!--**********************************
            Content body end
***********************************-->
