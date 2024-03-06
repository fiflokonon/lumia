@extends('pages.dashboard.index')
@section('page_title', "$formation->title : Liste des ressources")
<!--**********************************
    Content body start
***********************************-->
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            @foreach($formation->resources as $resource)
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">{{ $resource->title }}</h5>
                                @if($resource->type === 'fichier')
                                    <i class="fas fa-file"></i>
                                @else
                                    <i class="fas fa-link"></i>
                                @endif
                            </div>
                            <p class="card-text">{{ $resource->description }}</p>
                            <div class="text-center">
                                @if($resource->type === 'file')
                                    <a href="{{ asset('storage/resources/' . $resource->fichier) }}" class="btn btn-primary" target="_blank">Télécharger</a>
                                @else
                                    <a href="{{ $resource->lien }}" class="btn btn-primary" target="_blank">Voir</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--**********************************
            Footer start
        ***********************************-->
    </div></div>
@endsection

<!--**********************************
            Content body end
***********************************-->
