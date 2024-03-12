@extends('pages.dashboard.index')
@section('page_title', $evaluation->formation->title.": Aperçu de l'évaluation")
<!--**********************************
    Content body start
***********************************-->
@section('content')
    <div class="content-body">
        @include('partials.back_message')
        <div class="container-fluid">
            <div class="text-end">
                <a href="{{ route('edit_exam', $evaluation->id) }}" class="btn btn-secondary">Éditer l'évaluation</a>
            </div>
            <h2>{{ $evaluation->title }}</h2>
            <p>{{ $evaluation->description }}</p>
            <p class="text-dark"><b>Durée :</b> <span class="text-success">{{ $evaluation->duration }}</span> minutes</p>
            <p class="text-dark"><b>Note acceptée :</b> <span class="text-success">{{ $evaluation->accepted_score }}</span></p>
            <p class="text-dark"><b>Nombre total de points :</b> {{ $evaluation->total_points }}</p>

            <hr>
            <h3>Liste des questions</h3>
            @foreach($evaluation->questions as $question)
                <div class="question mb-3">
                    <button class="toggle-responses btn btn-sm btn-secondary">+</button>
                    <span>{{ $question->question }}</span> <span class="text-danger">{{ $question->points }} points</span>
                    <div class="responses mx-lg-5" style="display: none;">
                        <ul>
                            @foreach($question->answers as $option)
                                <li>
                                    @if($option->is_correct)
                                        <i class="fas fa-check text-success mx-2"></i>
                                    @else
                                        <i class="fas fa-times text-danger mx-2"></i>
                                    @endif
                                    {{ $option->option }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.toggle-responses').click(function() {
                var responses = $(this).siblings('.responses');
                if (responses.is(':hidden')) {
                    responses.show();
                    $(this).text('-');
                } else {
                    responses.hide();
                    $(this).text('+');
                }
            });
        });
    </script>


@endsection
<!--**********************************
            Content body end
***********************************-->
