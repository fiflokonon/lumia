@extends('pages.dashboard.index')
@section('page_title', $exam->formation->title." : Passer l'examen")
<!--**********************************
    Content body start
***********************************-->
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <h2>{{ $exam->title }}</h2>
        <p>{{ $exam->description }}</p>
        <p class="text-dark"><b>Durée :</b> <span class="text-success">{{ $exam->duration }}</span> minutes</p>
        <p class="text-dark"><b>Note acceptée :</b> <span class="text-success">{{ $exam->accepted_score }}</span></p>
        <p class="text-dark"><b>Nombre total de points :</b> {{ $exam->total_points }}</p>
        <button id="startExamButton" class="btn btn-primary">Commencer l'examen</button>
        <div id="timerDisplay" class="mt-2 text-danger"></div>
        <hr>
        <div id="examQuestions">
            <!-- Les questions de l'examen seront affichées ici -->
        </div>
        <button id="submitExamButton" class="btn btn-success">Soumettre l'examen</button>
    </div>
    <script>
        // Durée de l'examen en secondes
        let examDuration = {{ $exam->duration * 60 }};
        // Fonction pour afficher les questions de l'examen
        function displayExamQuestions() {
            // Afficher la durée restante de l'examen
            const timerDisplay = document.getElementById('timerDisplay');
            updateTimerDisplay(); // Mettre à jour le minuteur initial
            // Décrémenter le temps toutes les secondes
            const countdownInterval = setInterval(function() {
                examDuration--;
                if (examDuration <= 0) {
                    clearInterval(countdownInterval);
                    alert('Temps écoulé! L\'examen est terminé.');
                    // Ajoutez ici votre logique pour soumettre automatiquement l'examen lorsque le temps est écoulé
                    submitExam();
                }
                updateTimerDisplay();
            }, 1000);

            // Met à jour l'affichage du minuteur
            function updateTimerDisplay() {
                const minutes = Math.floor(examDuration / 60);
                const seconds = examDuration % 60;
                timerDisplay.textContent = `Temps restant: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            }

            // Générer le HTML pour afficher les questions et les réponses
            let examQuestionsHtml = '';
            @foreach($exam->questions as $question)
            // Générer le HTML pour chaque question
            examQuestionsHtml += `<div class="question mb-3" data-question-id="{{ $question->id }}">`;
            examQuestionsHtml += `<h4>{{ $question->question }}</h4>`;
            examQuestionsHtml += `<ul class="list-unstyled">`;
            @foreach($question->answers as $answer)
            // Générer le HTML pour chaque réponse
            examQuestionsHtml += `<li>`;
            @if($question->answers->where('is_correct', true)->count() == 1)
            // Afficher une case à cocher si une seule réponse est attendue
            examQuestionsHtml += `<input class="form-check-input" type="radio" name="question_{{ $question->id }}" value="{{ $answer->id }}">`;
            @else
            // Sinon, afficher une case à cocher
            examQuestionsHtml += `<input class="form-check-input" type="checkbox" name="question_{{ $question->id }}[]" value="{{ $answer->id }}">`;
            @endif
                examQuestionsHtml += `<label class="form-check-label">{{ $answer->option }}</label>`;
            examQuestionsHtml += `</li>`;
            @endforeach
                examQuestionsHtml += `</ul>`;
            examQuestionsHtml += `</div>`;
            @endforeach

            // Afficher les questions dans le conteneur
            $('#examQuestions').html(examQuestionsHtml);
        }

        $(document).ready(function() {
            // Au clic sur le bouton "Commencer l'examen", afficher les questions
            $('#startExamButton').click(function() {
                $(this).hide();
                displayExamQuestions();
            });
        });

        // Fonction pour soumettre l'examen
        function submitExam() {
            console.log("Soumission");
            // Récupérer les réponses de l'utilisateur
            const userResponses = {};

            // Pour chaque question de l'examen
            $('#examQuestions').find('.question').each(function() {
                const questionId = $(this).data('question-id'); // Récupérer l'ID de la question à partir du titre
                const userAnswer = [];

                // Récupérer la réponse de l'utilisateur pour cette question
                $(this).find('input[type=radio]:checked, input[type=checkbox]:checked').each(function() {
                    userAnswer.push($(this).val()); // Ajouter la valeur sélectionnée à la réponse de l'utilisateur
                });

                // Ajouter la réponse de l'utilisateur à l'objet userResponses
                userResponses[questionId] = userAnswer;
            });
            // Soumettre les réponses de l'utilisateur via une requête AJAX
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/enrolments/'+{{$enrolment->id}}+'/submit-exam', // URL de votre route pour soumettre l'examen
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    examId: {{ $exam->id }},
                    userResponses: userResponses
                },
                success: function(response) {
                    // Traitement de la réponse du serveur (succès ou échec)
                    console.log("Success");
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Gérer les erreurs de la requête AJAX
                    console.error(error);
                }
            });
        }
        // Au clic sur le bouton "Soumettre l'examen"
        $('#submitExamButton').click(submitExam);
    </script>
</div>
@endsection

<!--**********************************
            Content body end
***********************************-->
