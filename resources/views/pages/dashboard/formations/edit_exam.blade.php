@extends('pages.dashboard.index')
@section('page_title', $evaluation->formation->title.": Éditer une évaluation")
<!--**********************************
    Content body start
***********************************-->
@section('content')
    <div class="content-body">
        @include('partials.back_message')
        <form method="POST" id="evaluation-form" action="{{ route('update_exam', $evaluation->id) }}">
            @csrf
            <input type="hidden" name="exam_id" value="{{ $evaluation->id }}">
            <div class="container-fluid">
                <h2>Modifier l'évaluation</h2>
                <div class="mb-3">
                    <label for="title" class="form-label">Titre de l'évaluation</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') !== null ? old('title') : $evaluation->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"
                              rows="3">{{ old('description') !== null ? old('description') : $evaluation->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="total_points" class="form-label">Nombre total de points</label>
                    <input type="number" class="form-control" id="total_points" name="total_points" value="{{ old('total_points') !== null ? old('total_points') : $evaluation->total_points }}" required>
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Durée</label>
                    <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') !== null ? old('duration') : $evaluation->duration }}" required>
                </div>
                <hr>
                <h3>Questions et réponses</h3>
                <div id="questions-container">
                    <!-- Zone pour ajouter des questions -->
                    @foreach($evaluation->questions as $index => $question)
                        <div class="question mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <input type="text" class="form-control" name="questions[{{ $index }}]" value="{{ $question->question }}" placeholder="Question" required>
                                <input type="number" class="form-control ms-2" name="question_points[{{ $index }}]" value="{{ $question->points }}" placeholder="Points" required>
                                <button type="button" class="btn btn-sm btn-danger ms-2 remove-question">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="options-container mt-2">
                                <!-- Boucle sur les réponses de la question -->
                                @foreach($question->answers as $optionIndex => $option)
                                    <div class="option mb-2">
                                        <input type="text" class="form-control" name="options[{{ $index }}][{{ $optionIndex }}]" value="{{ $option->option }}" placeholder="Réponse" required>
                                        <input type="checkbox" name="correct_options[{{ $index }}][]" value="{{ $optionIndex }}" @if($option->is_correct) checked @endif> Correct
                                        <button type="button" class="btn btn-sm btn-danger ms-2 remove-option">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-sm btn-success add-option">Ajouter une réponse</button>
                        </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="accepted_score" class="form-label">Score minimum accepté</label>
                    <input type="number" class="form-control" id="accepted_score" name="accepted_score"
                           value="{{ old('accepted_score') !== null ? old('accepted_score') : $evaluation->accepted_score }}" required>
                </div>
                <button type="button" class="btn btn-sm btn-success add-question">Ajouter une question</button>
                <button type="button" class="btn btn-primary" id="save-btn">Enregistrer</button>
            </div>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const questionsContainer = document.getElementById('questions-container');
                const saveBtn = document.getElementById('save-btn');

                // Fonction pour ajouter une question
                function addQuestion() {
                    const questionTemplate = `
            <div class="question mb-3">
                <div class="d-flex align-items-center mb-2">
                    <input type="text" class="form-control" name="questions[]" placeholder="Question" required>
                    <input type="number" class="form-control ms-2" name="question_points[]" placeholder="Points" required>
                    <button type="button" class="btn btn-sm btn-danger ms-2 remove-question">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="options-container mt-2">
                    <div class="option mb-2">
                        <input type="text" class="form-control" name="options[][0]" placeholder="Réponse" required>
                        <input type="checkbox" name="correct_options[][0]" value="0"> Correct
                        <button type="button" class="btn btn-sm btn-danger ms-2 remove-option">
                           <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-success add-option">Ajouter une réponse</button>
            </div>
        `;
                    questionsContainer.insertAdjacentHTML('beforeend', questionTemplate);
                }

                // Événement pour ajouter une question
                document.addEventListener('click', function (event) {
                    if (event.target.classList.contains('add-question')) {
                        addQuestion();
                    }
                });

                // Événement pour ajouter une option de réponse
                questionsContainer.addEventListener('click', function (event) {
                    if (event.target.classList.contains('add-option')) {
                        const optionsContainer = event.target.parentElement.querySelector('.options-container');
                        const optionTemplate = `
            <div class="option mb-2">
                <input type="text" class="form-control" name="options[${optionsContainer.children.length}][]" placeholder="Réponse" required>
                <input type="checkbox" name="correct_options[${optionsContainer.children.length}][]" value="${optionsContainer.children.length}"> Correct
                <button type="button" class="btn btn-sm btn-danger ms-2 remove-option">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
                        optionsContainer.insertAdjacentHTML('beforeend', optionTemplate);
                    }
                });

                // Événement pour supprimer une question ou une réponse
                document.addEventListener('click', function (event) {
                    console.log("Bouton de suppression");
                    console.log("Événement : ", event);
                    console.log("Classes des éléments cibles : ", event.target.classList);
                    // Si le bouton de suppression d'une question est cliqué
                    if (event.target.classList.contains('fa-trash') || event.target.classList.contains('remove-question')) {
                        event.target.closest('.question').remove(); // Supprimer toute la question
                    } else {
                        console.log("Suppression de question - Faux");
                    }
                    // Si le bouton de suppression d'une réponse est cliqué
                    if (event.target.classList.contains('fa fa-trash') || event.target.classList.contains('remove-option')) {
                        console.log("Suppression de reponses");
                        event.target.closest('.option').remove(); // Supprimer seulement la réponse
                    } else {
                        console.log("Suppression de reponses - Faux");
                    }
                });

                // Événement pour vérifier et soumettre le formulaire
                saveBtn.addEventListener('click', function () {
                    // Vérifier si la somme des points est valide et soumettre le formulaire si c'est le cas
                    const totalPoints = parseInt(document.getElementById('total_points').value);
                    let pointsSum = 0;
                    document.querySelectorAll('.question').forEach(function (question) {
                        const questionPointsInput = question.querySelector('input[name^="question_points["]');
                        if (questionPointsInput) {
                            const questionPoints = parseInt(questionPointsInput.value);
                            pointsSum += questionPoints;
                        }
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
