@extends('pages.dashboard.index')
@section('page_title', "$formation->title : Gestion des accès aux ressources")
<!--**********************************
    Content body start
***********************************-->
@section('content')
<div class="content-body">
    @include('partials.back_message')
    <!-- row -->
    <form action="{{ route('update_resource_access', $formation->id) }}" method="POST">
        @csrf
        <div class="container-fluid">
            <h2>Liste des personnes inscrites à la formation</h2>
            <div class="text-end">
                <a href="{{ route('formation_resources', $formation->id) }}" class="btn btn-info mb-2">Voir les ressources de la formations</a>
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-primary" id="checkAll">Tout cocher</button>
                <button type="button" class="btn btn-primary" id="uncheckAll">Tout décocher</button>
            </div>
            @if($formation->enrolments->isEmpty())
                <p>Aucune personne inscrite à cette formation pour le moment.</p>
            @else
                @foreach($formation->enrolments as $inscription)
                    @if($inscription->payment_status == 'validated')
                        <div class="row mb-3">
                            <div class="col-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" {{ $inscription->resource_access ? 'checked' : ''  }} name="access[]" value="{{ $inscription->id }}" id="accessCheckbox{{ $inscription->id }}" @if($inscription->has_access) checked @endif>
                                    <label class="form-check-label"  for="accessCheckbox{{ $inscription->id }}">{{ $inscription->user->first_name }} {{ $inscription->user->last_name }} - {{ $inscription->user->email }}</label>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            @endif
        </div>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Récupérer les boutons
        var checkAllButton = document.getElementById('checkAll');
        var uncheckAllButton = document.getElementById('uncheckAll');
        // Récupérer tous les checkboxes
        var checkboxes = document.querySelectorAll('input[type=checkbox]');

        // Fonction pour cocher tous les checkboxes
        function checkAll() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
        }

        // Fonction pour décocher tous les checkboxes
        function uncheckAll() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        }
        // Ajouter les événements aux boutons
        checkAllButton.addEventListener('click', checkAll);
        uncheckAllButton.addEventListener('click', uncheckAll);
    });
</script>

@endsection

<!--**********************************
            Content body end
***********************************-->
