@extends('pages.dashboard.index')
@section('page_title', $exam->formation->title.": Éditer une évaluation")
<!--**********************************
    Content body start
***********************************-->
@section('content')
    <div class="content-body">
        @include('partials.back_message')
        <form method="POST" id="evaluation-form" action="{{ route('update_exam', $exam->id) }}">
            @csrf
            <div class="container-fluid">
                <h2>Modifier l'évaluation</h2>
                <div class="mb-3">
                    <label for="title" class="form-label">Titre de l'évaluation</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $exam->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $exam->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="total_points" class="form-label">Nombre total de points</label>
                    <input type="number" class="form-control" id="total_points" name="total_points" value="{{ $exam->total_points }}" required>
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Durée</label>
                    <input type="number" class="form-control" id="duration" name="duration" value="{{ $exam->duration }}" required>
                </div>
                <div class="mb-3">
                    <label for="accepted_score" class="form-label">Score minimum accepté</label>
                    <input type="number" class="form-control" id="accepted_score" name="accepted_score" value="{{ $exam->accepted_score }}" required>
                </div>
                <hr>
                <h3>Questions et réponses</h3>
                <div id="questions-container">
                    <!-- Zone pour ajouter des questions -->
                    @foreach($exam->questions as $question)
                        <div class="question mb-3" data-question-index="{{ $loop->index }}">
                            <div class="d-flex align-items-center mb-2">
                                <input type="text" class="form-control" name="questions[]" value="{{ $question->question }}" placeholder="Question" required>
                                <input type="number" class="form-control ms-2" name="question_points[]" value="{{ $question->points }}" placeholder="Points" required>
                                <button type="button" class="btn btn-sm btn-danger ms-2 remove-question">
                                    Supprimer
                                </button>
                            </div>
                            <div class="options-container mt-2">
                                @foreach($question->answers as $option)
                                    <div class="option mb-2">
                                        <input type="text" class="form-control" name="options[{{ $loop->parent->index }}][]" value="{{ $option->option }}" placeholder="Réponse" required>
                                        <input type="checkbox" data-correct-answer name="correct_options[{{ $loop->parent->index }}][]" value="{{ $loop->index }}" @if($option->is_correct) checked @endif> Correct
                                        <button type="button" class="btn btn-sm btn-danger ms-2 remove-option">
                                            Supprimer
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-sm btn-success add-option">Ajouter une réponse</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-sm btn-success add-question">Ajouter une question</button>
                <button type="button" class="btn btn-primary" id="save-btn">Enregistrer</button>
            </div>
        </form>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const questionsContainer = document.getElementById('questions-container');
                const saveBtn = document.getElementById('save-btn');
                let questionIndex = document.querySelectorAll('.question').length; // Obtenir le nombre de questions déjà présentes

                // Fonction pour ajouter une question
                function addQuestion() {
                    const questionTemplate = `
                <div class="question mb-3" data-question-index="${questionIndex}">
                    <div class="d-flex align-items-center mb-2">
                        <input type="text" class="form-control" name="questions[]" placeholder="Question" required>
                        <input type="number" class="form-control ms-2" name="question_points[]" placeholder="Points" required>
                        <button type="button" class="btn btn-sm btn-danger ms-2 remove-question">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="options-container mt-2">
                        <div class="option mb-2">
                            <input type="text" class="form-control" name="options[${questionIndex}][0]" placeholder="Réponse" required>
                            <input type="checkbox" data-correct-answer name="correct_options[${questionIndex}][0]" value="0"> Correct
                            <button type="button" class="btn btn-sm btn-danger ms-2 remove-option">
                                Supprimer
                            </button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-success add-option">Ajouter une réponse</button>
                </div>
            `;
                    questionsContainer.insertAdjacentHTML('beforeend', questionTemplate);
                    questionIndex++; // Incrémenter l'index des questions
                }

                // Événement pour ajouter une question
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('add-question')) {
                        addQuestion();
                    }
                });

                // Événement pour ajouter une option de réponse
                questionsContainer.addEventListener('click', function(event) {
                    if (event.target.classList.contains('add-option')) {
                        const questionDiv = event.target.closest('.question');
                        const optionsContainer = questionDiv.querySelector('.options-container');
                        const optionIndex = optionsContainer.children.length;
                        const optionTemplate = `
                    <div class="option mb-2">
                        <input type="text" class="form-control" name="options[${questionDiv.dataset.questionIndex}][${optionIndex}]" placeholder="Réponse" required>
                        <input type="checkbox" data-correct-answer name="correct_options[${questionDiv.dataset.questionIndex}][${optionIndex}]" value="${optionIndex}"> Correct
                        <button type="button" class="btn btn-sm btn-danger ms-2 remove-option">
                            Supprimer
                        </button>
                    </div>
                `;
                        optionsContainer.insertAdjacentHTML('beforeend', optionTemplate);
                    }
                });

                // Événement pour supprimer une question ou une réponse
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('remove-question')) {
                        event.target.closest('.question').remove(); // Supprimer toute la question
                    } else if (event.target.classList.contains('remove-option')) {
                        event.target.closest('.option').remove(); // Supprimer seulement la réponse
                    }
                });

                // Événement pour vérifier et soumettre le formulaire
                saveBtn.addEventListener('click', function() {
                    // Vérifier si la somme des points est valide et soumettre le formulaire si c'est le cas
                    const totalPoints = parseInt(document.getElementById('total_points').value);
                    let pointsSum = 0;
                    document.querySelectorAll('.question').forEach(function(question) {
                        const questionPoints = parseInt(question.querySelector('input[name="question_points[]"]').value);
                        pointsSum += questionPoints;
                    });
                    if (pointsSum !== totalPoints) {
                        alert('La somme des points des questions ne correspond pas au nombre total de points.');
                    } else {
                        document.getElementById('evaluation-form').submit();
                    }
                });
            });
        </script>
    </div>

@endsection
<!--**********************************
            Content body end
***********************************-->
