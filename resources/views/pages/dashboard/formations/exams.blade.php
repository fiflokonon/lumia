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
                    <a class="btn btn-info" href="{{ route('add_exam', $formation->id) }}">Ajouter une évaluation</a>
                </div>
                <div class="row">
                    @if($formation->exams->isNotEmpty())
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
                                                @if(!$exam->available)
                                                    <a href="{{ route('change_exam_availability', $exam->id) }}"
                                                       class="btn btn-primary">Publier l'examen</a>
                                                @endif
                                                <a href="{{ route('exam_details', $exam->id) }}"
                                                   class="btn btn-secondary">Voir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-danger text-center">Il n'existe pas encore d'évaluation pour cette formation</p>
                    @endif
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
                                                    @if($enrolment->evaluations->where('pass', true)->where('formation_exam_id', $exam->id)->first() !== null)
                                                        <button class="btn btn-outline-success">Passé avec {{ $enrolment->evaluations->where('pass', true)->where('formation_exam_id', $exam->id)->first()->score }} sur {{ $exam->total_points }}</button>
                                                    @else
                                                        <a href="{{ route('get_evaluation', ['id' => $enrolment->id, 'specific' => $exam->id]) }}"
                                                           class="btn btn-primary">Passer l'examen</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p class="text-danger text-center">Il n'existe pas encore d'évaluation pour cette formation</p>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection
<!--**********************************
            Content body end
***********************************-->
