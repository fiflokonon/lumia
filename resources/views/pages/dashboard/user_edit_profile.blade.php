@extends('pages.dashboard.index')
@section('page_title', 'Modifier les informations')
<!--**********************************
    Content body start
***********************************-->
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="clearfix">
                        <div class="card card-bx profile-card author-profile m-b30">
                            <div class="card-body">
                                <div class="p-5">
                                    <div class="author-profile">
                                        <div class="author-media">
                                            <img src="../static/akademi/images/user.jpg" alt="">
                                            <div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
                                                <input type="file" class="update-flie">
                                                <i class="fa fa-camera"></i>
                                            </div>
                                        </div>
                                        <div class="author-info">
                                            <h6 class="title">{{ $user->first_name }} {{ $user->last_name }}</h6>
                                            <span>{{ $user->role->title }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-list">
                                    <ul>
                                        <li><a href="../app-profile/index.html">Models</a><span>36</span></li>
                                        <li><a href="../uc-lightgallery/index.html">Gallery</a><span>3</span></li>
                                        <li><a href="../app-profile/index.html">Lessons</a><span>1</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="input-group mb-3">
                                    <div class="form-control rounded text-center bg-white">Portfolio</div>
                                </div>
                                <div class="input-group">
                                    <a href="https://www.dexignlab.com/" target="_blank" class="form-control text-primary rounded text-center bg-white">www.dexignlab.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="card profile-card card-bx">
                        <div class="card-header">
                            <h6 class="title">Informations du compte</h6>
                        </div>
                        <form class="profile-form" method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label">Nom</label>
                                        <input type="text" class="form-control" name="first_name" value="{{ $user->last_name }}">
                                    </div>
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label">Prénoms</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ $user->first_name }}">
                                    </div>
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label">Secteur d'activité</label>
                                        <input type="text" class="form-control" name="field" value="{{ $user->field }}">
                                    </div>
                                    {{--
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label">Skills</label>
                                        <input type="text" class="form-control" value="HTML,  JavaScript,  PHP">
                                    </div>
                                    --}}
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label d-block">Sexe</label>
                                        <select class="selectpicke w-100" name="sex">
                                            <option value="M" {{ $user->sex == 'M' ? 'selected' : '' }}>Masculin</option>
                                            <option value="F" {{ $user->sex == 'F' ? 'selected' : '' }}>Féminin</option>
                                        </select>
                                    </div>
                                    {{--
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label">Birth</label>
                                        <input type="text" class="form-control" id="datepicker">
                                    </div>--}}
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label">Phone</label>
                                        <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                                    </div>
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label">Email address</label>
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                    </div>
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label">Justificatif de niveau d'études</label>
                                        <input type="file" class="form-control" name="graduation" value="">
                                    </div>
                                    {{--
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label d-block">Country</label>
                                        <select class="selectpicker w-100">
                                            <option>Russia</option>
                                            <option>Canada</option>
                                            <option>China</option>
                                            <option>India</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label d-block">Country</label>
                                        <select class="selectpicker w-100">
                                            <option>Russia</option>
                                            <option>Canada</option>
                                            <option>China</option>
                                            <option>India</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label d-block">City</label>
                                        <select class="selectpicker w-100">
                                            <option>Krasnodar</option>
                                            <option>Tyumen</option>
                                            <option>Chelyabinsk</option>
                                            <option>Moscow</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 m-b30">
                                        <label class="form-label d-block">City</label>
                                        <select class="selectpicker w-100">
                                            <option>Krasnodar</option>
                                            <option>Tyumen</option>
                                            <option>Chelyabinsk</option>
                                            <option>Moscow</option>
                                        </select>
                                    </div>--}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">Enregistrer les modifications</button>
                                <a href="../page-register/index.html" class="btn-link float-end">Mot de passe oublié?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!--**********************************
            Content body end
***********************************-->
