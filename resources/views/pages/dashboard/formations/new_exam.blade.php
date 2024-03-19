@extends('pages.dashboard.index')
@section('page_title', "$formation->title : Ajouter une évaluation")
<!--**********************************
    Content body start
***********************************-->
@section('content')
    <div class="content-body">
        @include('partials.back_message')
        <div class="container mt-5">
            <h1>Création d'examen QCM</h1>
            <form id="examen-form" action="{{ route('create_exam', $formation->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="titre" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="duree" class="form-label">Durée (en minutes)</label>
                    <input type="number" class="form-control" id="duree" name="duree" required>
                </div>
                <div class="mb-3">
                    <label for="total_points" class="form-label">Nombre total de points</label>
                    <input type="number" class="form-control" id="total_points" name="total_points" required>
                </div>
                <div class="mb-3">
                    <label for="accepted_score" class="form-label">Note d'acceptation</label>
                    <input type="number" class="form-control" id="accepted_score" name="accepted_score" required>
                </div>

                <div id="questions">
                    <h2 class="mb-3">Questions</h2>
                    <button type="button" class="btn btn-primary mb-3" id="ajouter-question">Ajouter une question</button>

                    <div class="questions-container"></div>

                </div>

                <button type="submit" class="btn btn-success mt-5">Créer l'examen</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/0437p/chF1pTwh84HeBCD/lE5zy/q69PPlxrs" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                // Fonction pour ajouter une question
                $("#ajouter-question").click(function() {
                    let question = `
                    <div class="question mb-3">
                        <input type="hidden" name="question-id">
                        <label for="question-texte" class="form-label">Question</label>
                        <input type="text" class="form-control" id="question-texte" name="question-texte" required>
                        <label for="question-points" class="form-label">Points</label>
                        <input type="number" class="form-control" id="question-points" name="question-points" required>

                        <label for="question-reponse" class="form-label">Réponse</label>
                        <input type="text" class="form-control" id="question-reponse" name="question-reponse" required>

                        <button type="button" class="btn btn-danger btn-sm float-end supprimer-question">Supprimer</button>
                    </div>
                `;

                    $(".questions-container").append(question);
                });

                // Fonction pour supprimer une question
                $(document).on("click", ".supprimer-question", function() {
                    $(this).parent(".question").remove();
                });
            });
        </script>
    </div>

@endsection
<!--**********************************
            Content body end
***********************************-->
