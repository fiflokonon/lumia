@extends('pages.dashboard.index')
@section('page_title', "$formation->title : Liste des ressources")
<!--**********************************
    Content body start
***********************************-->
@section('content')
@if(auth()->user()->isNotClient())
    <div class="content-body">
        @include('partials.back_message')
        <!-- row -->
        <div class="container-fluid">
            <div class="mb-3 text-end">
                <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#addResourceModal">Ajouter une ressource</button>
                <a href="{{ route('resource_access', $formation->id) }}" class="btn btn-success">Gérer les accès aux ressources</a>
            </div>
            <div class="row">
                @foreach($formation->resources as $index => $resource)
                    <div class="col-12 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-4">
                                            <h2>{{ $index + 1 }}</h2> <!-- Numérotation de la ressource -->
                                        </div>
                                        <div class="mx-2">
                                            <i class="fas fa-5x text-danger @if($resource->type === 'file') fa-file @else fa-link @endif"></i>
                                        </div>
                                        <div class="mx-2">
                                            <h5 class="card-title mb-1">{{ $resource->title }}</h5>
                                            <p class="card-text mb-0">{{ $resource->description }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        @if($resource->type === 'file')
                                            <a href="{{ asset('storage/resources/' . $resource->link) }}" class="btn btn-primary" target="_blank">Télécharger</a>
                                        @else
                                            <a href="{{ $resource->link }}" class="btn btn-primary" target="_blank">Voir</a>
                                        @endif
                                        <!-- Bouton pour rendre visible ou invisible aux étudiants -->
                                        <a  href="{{ route('change_resource_visibility', $resource->id) }}" class="btn btn-info">{{ $resource->visible_for_student ? 'Rendre invisible' : 'Rendre visible' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@else
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                @if($formation->resources->isNotEmpty())
                @foreach($formation->resources as $index => $resource)
                    @if($resource->visible_for_student)
                    <div class="col-12 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-4">
                                            <h2>{{ $index + 1 }}</h2> <!-- Numérotation de la ressource -->
                                        </div>
                                        <div class="mx-2">
                                            <i class="fas fa-5x text-danger @if($resource->type === 'file') fa-file @else fa-link @endif"></i>
                                        </div>
                                        <div class="mx-2">
                                            <h5 class="card-title mb-1">{{ $resource->title }}</h5>
                                            <p class="card-text mb-0">{{ $resource->description }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        @if($resource->type === 'file')
                                            <a href="{{ asset('storage/resources/' . $resource->link) }}" class="btn btn-primary" target="_blank">Télécharger</a>
                                        @else
                                            <a href="{{ $resource->link }}" class="btn btn-primary" target="_blank">Voir</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @else
                    <p class="text-danger text-center">Il n'existe pas encore de ressource pour cette formation</p>
                @endif
            </div>
        </div>
    </div>
@endif
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
@endsection
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
<!--**********************************
            Content body end
***********************************-->
