@extends('pages.dashboard.index')
@section('page_title', $exam->formation->title." : Passer l'examen")
<!--**********************************
    Content body start
***********************************-->
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div id="examQuestions">
            <!-- Les questions de l'examen seront affichées ici -->
        </div>
        <button id="startExamButton" class="btn btn-primary">Commencer l'examen</button>
        <div id="timerDisplay"></div> <!-- Div pour afficher le minuteur -->
    </div>
</div>
<script>
    // Durée de l'examen en secondes
    let examDuration = {{ $exam->duration }}; // Durée en secondes

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
        examQuestionsHtml += `<div class="question mb-3">`;
        examQuestionsHtml += `<h4>${ $question->question }</h4>`;
        examQuestionsHtml += `<ul class="list-unstyled">`;
        @foreach($question->answers as $answer)
        // Générer le HTML pour chaque réponse
        examQuestionsHtml += `<li>`;
        @if($question->answers->where('is_correct', true)->count() == 1)
        // Afficher une case à cocher si une seule réponse est attendue
        examQuestionsHtml += `<input type="radio" name="question_${ $question->id }" value="${ $answer->id }">`;
        @else
        // Sinon, afficher une case à cocher
        examQuestionsHtml += `<input type="checkbox" name="question_${ $question->id }[]" value="${ $answer->id }">`;
        @endif
            examQuestionsHtml += `${ $answer->option }`;
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
            displayExamQuestions();
        });
    });
</script>
@endsection

<!--**********************************
            Content body end
***********************************-->
