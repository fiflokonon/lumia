@extends('pages.dashboard.index')
@section('page_title', "$formation->title : Liste des ressources")
<!--**********************************
    Content body start
***********************************-->
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="mb-3 text-end">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection

<!--**********************************
            Content body end
***********************************-->
