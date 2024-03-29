@php use Carbon\Carbon; @endphp
@extends('pages.dashboard.index')
@section('page_title', 'Les formations auxquelles vous êtes inscrits')
<!--**********************************
    Content body start
***********************************-->
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="mb-3 text-end">
                <a class="btn btn-info" href="{{ route('formations') }}">Consulter le catalogue de formations</a>
            </div>
            <!-- Row -->
            <div class="row">
                @if(auth()->user()->enrolments->isNotEmpty())
                    @foreach(auth()->user()->enrolments as $enrolment)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <!-- Image illustrative -->
                                <img src="/storage/formations/{{$enrolment->formation->image}}" class="card-img-top"
                                     alt="Image illustrative">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <!-- Étoiles -->
                                        <div>
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="fas fa-star{{ $i < 4 ? ' text-warning' : '' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <!-- Titre et description -->
                                    <h5 class="card-title">{{ $enrolment->formation->title }}</h5>
                                    <p class="card-text text-danger mb-2">{{ $enrolment->formation->type_formation->title }}</p>
                                    <!-- Liste des détails de la formation -->
                                    <ul class="list-group list-group-flush mb-1">
                                        <li class="list-group-item py-1">
                                            <b>Spécialité:</b> {{ $enrolment->formation->field_speciality->title }}</li>
                                        <li class="list-group-item py-1"><b>Date de
                                                début:</b> {{ Carbon::parse($enrolment->formation->start_date)->locale('fr')->translatedFormat('d F Y')  }}
                                        </li>
                                        <li class="list-group-item py-1"><b>Date de
                                                fin:</b> {{ Carbon::parse($enrolment->formation->end_date)->locale('fr')->translatedFormat('d F Y')  }}
                                        </li>
                                        <li class="list-group-item py-1"><b>Prix:</b> {{ $enrolment->formation->price }}
                                            Franc CFA
                                        </li>
                                    </ul>
                                    @if($enrolment->payment_status != 'validated')
                                        <a href="{{ $enrolment->payment_link }}" class="btn btn-danger">Payer les
                                            frais</a>
                                    @else
                                        @if($enrolment->resource_access)
                                            <a class="btn btn-secondary" href="{{ route('formation_resources', $enrolment->formation->id) }}">Ressources</a>
                                        @else
                                            <button type="button" class="btn btn-dark toastr-danger-top-full-width-resource">Ressources</button>
                                        @endif
                                            @if($enrolment->formation->type_formation->code == 'certificated' && $enrolment->formation->exams->where('available', true)->first() !== null)
                                                @if($enrolment->evaluations->where('pass', true)->first())
                                                    @if($enrolment->formation->progress_status == 'closed')
                                                        <a class="btn btn-info" href="{{ route('generate_certificate', $enrolment->id) }}">Certificat</a>
                                                    @else
                                                        <button class="btn text-light toastr-danger-top-full-width-formation-no-closed" style="background-color: lightslategray">Certificat</button>
                                                    @endif
                                                @else
                                                    <a class="btn btn-info" href="{{ route('get_evaluation', $enrolment->id) }}">Passer l'examen</a>
                                                @endif
                                            @elseif($enrolment->formation->type_formation->code == 'specific' && $enrolment->formation->exams->where('available', true)->first() !== null)
                                                @dd($enrolment->formation->exams->where('available', true) );
                                                @php
                                                    $pass_exam = 0;
                                                    if (isset($enrolment->formation->exams)){
                                                        foreach ($enrolment->formation->exams->where('available', true) as $exam)
                                                        {
                                                        if (isset($enrolment->evaluations) && $enrolment->evaluations->where('pass', true)->first()){
                                                            $pass_exam++;
                                                        }
                                                    }
                                                    }
                                                @endphp
                                                @if($pass_exam == $enrolment->formation->exams->where('available', true)->count())
                                                    @if($enrolment->formation->progress_status == 'closed')
                                                        <a class="btn btn-info" href="{{ route('generate_certificate', $enrolment->id) }}">Certificat</a>
                                                    @else
                                                        <button class="btn text-light toastr-danger-top-full-width-formation-no-closed" style="background-color: lightslategray">Certificat</button>
                                                    @endif
                                                @else
                                                    <a class="btn btn-info" href="{{ route('formation_exam_list', $enrolment->formation->id) }}">Passer les examens</a>
                                                @endif
                                            @else
                                                @if(isset($enrolment->evaluations) && $enrolment->evaluations->where('pass', true)->first())
                                                    @if($enrolment->formation->progress_status == 'closed')
                                                        <a class="btn btn-info" href="{{ route('generate_certificate', $enrolment->id) }}">Certificat</a>
                                                    @else
                                                        <button class="btn text-light toastr-danger-top-full-width-formation-no-closed" style="background-color: lightslategray">Certificat</button>
                                                    @endif
                                                @else
                                                    @if(isset($enrolment->formation->exams) && $enrolment->formation->exams->where('available', true)->first() !== null)
                                                        <a class="btn btn-info" href="{{ route('get_evaluation', $enrolment->id) }}">Passer l'examen</a>
                                                    @endif
                                                @endif
                                            @endif
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body pb-xl-4 pb-sm-3 pb-0">
                                <p class="text-danger text-center fw-bolder">Vous n'êtes pas encore pas inscrit à une
                                    formation !</p>
                                <div class="text-center"><a class="btn btn-info" href="{{ route('formations') }}">Consulter le catalogue de formations</a></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

<!--**********************************
            Content body end
***********************************-->
