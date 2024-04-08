@extends('pages.dashboard.index')
@section('page_title', 'Editer un role')
<!--**********************************
    Content body start
***********************************-->
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            @include('partials.back_message')
            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <form method="POST" action="">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-3">Modification de rôle</h4>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Rôle</label>
                                    <div class="col-md-10">
                                        <input value="{{ $role->title }}" class="form-control" name="title" type="text" id="example-text-input" placeholder="Admin">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Description</label>
                                    <div class="col-md-10">
                                        <input value="{{ $role->description }}" class="form-control" name="description" type="text" id="example-text-input" placeholder="Description">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Permissions:</label>
                                </div>
                                <div class="mb-3 row">
                                    @foreach($permissions as $permission)
                                        <div class="col-4">
                                            <div class="form-check mb-3">
                                                <input name="permission[]" class="form-check-input" type="checkbox" id="formCheck{{ $permission->id }}" value="{{ $permission->id }}" @if(in_array($permission->id, $role->permissions->pluck('id')->toArray())) checked @endif>
                                                <label class="form-check-label" for="formCheck{{ $permission->id }}">{{ $permission->title }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-3 row">
                                    <button type="submit" class="btn btn-primary" >Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--**********************************
                Footer start
            ***********************************-->
        </div>
    </div>
@endsection
<!--**********************************
            Content body end
***********************************-->
