@extends('pages.dashboard.index')
@section('page_title', 'Ajouter une formation')
<!--**********************************
    Content body start
***********************************-->
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        @include('partials.back_message')
        <!-- Row -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Informations </h5>
                </div>
                <form method="POST" action="{{ route('new_formation') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput9" class="form-label text-primary">Intitulé de la formation <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="title" id="exampleFormControlInput9" placeholder="Titre de la formation" value="{{ old('title') }}" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput9" class="form-label text-primary">Type de la formation <span class="required">*</span></label>
                                    <select class="form-control" name="type">
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" {{ old('type') == $type->id ? 'selected' : '' }}>{{ $type->title }}</option>                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput9" class="form-label text-primary">Visuel de la formation <span class="required">*</span></label>
                                    <input type="file" class="form-control" name="image" id="exampleFormControlInput9" value="{{ old('image') }}">
                                </div>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label class="form-label text-primary">Date de début & de fin<span class="required">*</span></label>
                                        <div class="d-flex">
                                            <input type="date" name="start_date" class="form-control w-50" id="datepicker1" value="{{ old('start_date') }}">
                                            <input type="date" name="end_date" class="form-control w-50 ms-3" id="datepicker2" value="{{ old('end_date') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput13" class="form-label text-primary">Lien du groupe de pré-inscription<span class="required">*</span></label>
                                    <input type="number" name="pre_link" class="form-control" id="exampleFormControlInput13" placeholder="Lien" value="{{ old('pre_link') }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput14" class="form-label text-primary">Description<span class="required">*</span></label>
                                    <input type="text" name="description" class="form-control" id="exampleFormControlInput14" value="{{ old('description') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput9" class="form-label text-primary">Spécialité<span class="required">*</span></label>
                                    <select class="form-control" name="speciality">
                                        @foreach($specialities as $speciality)
                                            <option value="{{ $speciality->id }}" {{ old('speciality') == $speciality->id ? 'selected' : '' }}>{{ $speciality->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput14" class="form-label text-primary">Date de cloture des inscriptions<span class="required">*</span></label>
                                    <input type="date" name="enrolment_deadline" class="form-control" id="exampleFormControlInput14" value="{{ old('enrolment_date') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput13" class="form-label text-primary">Prix de la formation<span class="required">*</span></label>
                                    <input type="number" name="price" class="form-control" id="exampleFormControlInput13" placeholder="500000" value="{{ old('price') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput13" class="form-label text-primary">Lien du groupe officiel<span class="required">*</span></label>
                                    <input type="number" name="official_link" class="form-control" id="exampleFormControlInput13" placeholder="Lien" value="{{ old('official_link') }}">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h5>Ajouter des questions</h5>
                        <div id="questions">
                            @if(old('questions'))
                                @foreach(old('questions') as $key => $question)
                                    <div class="mb-3">
                                        <label for="question{{ $key + 1 }}" class="form-label text-primary">Question {{ $key + 1 }}</label>
                                        <input type="text" class="form-control" name="questions[]" id="question{{ $key + 1 }}" placeholder="Question {{ $key + 1 }}" value="{{ $question }}">
                                    </div>
                                @endforeach
                            @else
                                <div class="mb-3">
                                    <label for="question1" class="form-label text-primary">Question 1</label>
                                    <input type="text" class="form-control" name="questions[]" id="question1" placeholder="Question 1">
                                </div>
                            @endif
                        </div>

                        <button class="btn btn-outline-primary mt-3" type="button" onclick="addQuestion()">Ajouter une question</button>

                        <div class="float-end">
                            <button class="btn btn-outline-primary me-3">Save as Draft</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function addQuestion() {
        var questionsDiv = document.getElementById('questions');
        var questionCount = questionsDiv.children.length + 1;

        var newQuestionDiv = document.createElement('div');
        newQuestionDiv.classList.add('mb-3');

        var newQuestionLabel = document.createElement('label');
        newQuestionLabel.setAttribute('for', 'question' + questionCount);
        newQuestionLabel.classList.add('form-label', 'text-primary');
        newQuestionLabel.textContent = 'Question ' + questionCount;

        var newQuestionInput = document.createElement('input');
        newQuestionInput.setAttribute('type', 'text');
        newQuestionInput.classList.add('form-control');
        newQuestionInput.setAttribute('name', 'questions[]');
        newQuestionInput.setAttribute('id', 'question' + questionCount);
        newQuestionInput.setAttribute('placeholder', 'Question ' + questionCount);

        newQuestionDiv.appendChild(newQuestionLabel);
        newQuestionDiv.appendChild(newQuestionInput);

        questionsDiv.appendChild(newQuestionDiv);
    }
</script>
@endsection

<!--**********************************
            Content body end
***********************************-->
