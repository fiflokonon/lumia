@extends('pages.dashboard.index')
@section('page_title', "$formation->title : Liste des examens")
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
                <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#addResourceModal">Ajouter une évaluation</button>
                <a href="{{ route('resource_access', $formation->id) }}" class="btn btn-success">Gérer les accès aux ressources</a>
            </div>
            <div class="row">
                @foreach($formation->exams as $index => $exam)
                    <div class="col-12 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-4">
                                            <h2>{{ $index + 1 }}</h2> <!-- Numérotation de la ressource -->
                                        </div>
                                        <div class="mx-2">
                                            <h5 class="card-title mb-1">{{ $exam->title }}</h5>
                                            <p class="card-text mb-0">{{ $exam->description }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <!-- Bouton pour rendre visible ou invisible aux étudiants -->
                                        @if($exam->available)
                                            <a  href="{{ route('change_exam_availability', $exam->id) }}" class="btn btn-info">Publier l'examen</a>
                                        @endif
                                        <a  href="{{ route('exam_details', $exam->id) }}" class="btn btn-info">Voir</a>
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
                @if($formation->exams->isNotEmpty())
                @foreach($formation->exams as $index => $exam)
                    @if($exam->available)
                    <div class="col-12 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-4">
                                            <h2>{{ $index + 1 }}</h2> <!-- Numérotation de la ressource -->
                                        </div>
                                        <div class="mx-2">
                                            <h5 class="card-title mb-1">{{ $exam->title }}</h5>
                                            <p class="card-text mb-0">{{ $exam->description }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="" class="btn btn-primary">Passer l'examen</a>
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
@endsection
<!--**********************************
            Content body end
***********************************-->
