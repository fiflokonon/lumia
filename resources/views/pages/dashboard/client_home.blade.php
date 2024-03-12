@php use Carbon\Carbon; @endphp
@extends('pages.dashboard.index')
@section('page_title', 'Les formations auxquelles vous êtes inscrits')
<!--**********************************
    Content body start
***********************************-->
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <!-- Row -->
            {{--
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pb-xl-4 pb-sm-3 pb-0">
                            <div class="row">
                                <div class="col-xl-3 col-6">
                                    <div class="content-box">
                                        <div class="icon-box icon-box-xl std-data">
                                            <svg width="25" height="25" viewBox="0 0 30 38" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M12.9288 37.75H3.75C1.67875 37.75 0 36.0713 0 34V23.5863C0 21.7738 1.29625 20.2213 3.07875 19.8975C5.72125 19.4163 10.2775 18.5875 12.855 18.12C14.2737 17.8612 15.7263 17.8612 17.145 18.12C19.7225 18.5875 24.2788 19.4163 26.9213 19.8975C28.7038 20.2213 30 21.7738 30 23.5863C30 26.3125 30 31.0825 30 34C30 36.0713 28.3212 37.75 26.25 37.75H12.9288ZM24.785 22.05L24.79 22.0563C25.0088 22.3838 25.06 22.795 24.9287 23.1662L24.0462 25.6662C23.9312 25.9925 23.685 26.2575 23.3675 26.3963L21.7075 27.12L22.3675 28.4412C22.5525 28.81 22.5425 29.2462 22.3425 29.6075L19.2075 35.25H26.25C26.94 35.25 27.5 34.69 27.5 34C27.5 31.0825 27.5 26.3125 27.5 23.5863C27.5 22.9825 27.0675 22.465 26.4738 22.3562L24.785 22.05ZM21.3663 21.4275L16.6975 20.5788C15.575 20.375 14.425 20.375 13.3025 20.5788L8.63375 21.4275L7.63625 22.9238L8.13 24.3213L10.5 25.3537C10.8138 25.4912 11.0575 25.7512 11.175 26.0737C11.2925 26.3962 11.2712 26.7525 11.1175 27.0588L10.1625 28.9688L13.6525 35.25H16.3475L19.8375 28.9688L18.8825 27.0588C18.7288 26.7525 18.7075 26.3962 18.825 26.0737C18.9425 25.7512 19.1862 25.4912 19.5 25.3537L21.87 24.3213L22.3638 22.9238L21.3663 21.4275ZM5.215 22.05L3.52625 22.3562C2.9325 22.465 2.5 22.9825 2.5 23.5863V34C2.5 34.69 3.06 35.25 3.75 35.25H10.7925L7.6575 29.6075C7.4575 29.2462 7.4475 28.81 7.6325 28.4412L8.2925 27.12L6.6325 26.3963C6.315 26.2575 6.06875 25.9925 5.95375 25.6662L5.07125 23.1662C4.94 22.795 4.99125 22.3838 5.21 22.0563L5.215 22.05ZM23.75 29V31.5C23.75 32.19 24.31 32.75 25 32.75C25.69 32.75 26.25 32.19 26.25 31.5V29C26.25 28.31 25.69 27.75 25 27.75C24.31 27.75 23.75 28.31 23.75 29ZM15 0.25C10.5163 0.25 6.875 3.89125 6.875 8.375C6.875 12.8587 10.5163 16.5 15 16.5C19.4837 16.5 23.125 12.8587 23.125 8.375C23.125 3.89125 19.4837 0.25 15 0.25ZM15 2.75C18.105 2.75 20.625 5.27 20.625 8.375C20.625 11.48 18.105 14 15 14C11.895 14 9.375 11.48 9.375 8.375C9.375 5.27 11.895 2.75 15 2.75Z"
                                                      fill="white"/>
                                            </svg>
                                        </div>
                                        <div class="chart-num">
                                            <p>Membres</p>
                                            <h2 class="font-w700 mb-0">932</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6">
                                    <div class="content-box">
                                        <div class="teach-data icon-box icon-box-xl">
                                            <svg width="25" height="25" viewBox="0 0 30 38" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0 34C0 36.0713 1.67875 37.75 3.75 37.75H26.25C28.3212 37.75 30 36.0713 30 34C30 31.0825 30 26.3125 30 23.5863C30 21.7738 28.7038 20.2213 26.9213 19.8975C24.2788 19.4163 19.7225 18.5875 17.145 18.12C15.7263 17.8612 14.2737 17.8612 12.855 18.12C10.2775 18.5875 5.72125 19.4163 3.07875 19.8975C1.29625 20.2213 0 21.7738 0 23.5863V34ZM17.885 20.795L19.7612 27.9288C20.0075 28.865 19.6775 29.8588 18.92 30.4638C18.28 30.9738 17.2713 31.7788 16.5713 32.3388C15.6525 33.0713 14.3475 33.0713 13.4287 32.3388C12.7287 31.7788 11.72 30.9738 11.08 30.4638C10.3225 29.8588 9.9925 28.865 10.2388 27.9288L12.115 20.795L3.52625 22.3562C2.9325 22.465 2.5 22.9825 2.5 23.5863V34C2.5 34.69 3.06 35.25 3.75 35.25C8.98 35.25 21.02 35.25 26.25 35.25C26.94 35.25 27.5 34.69 27.5 34C27.5 31.0825 27.5 26.3125 27.5 23.5863C27.5 22.9825 27.0675 22.465 26.4738 22.3562L17.885 20.795ZM15.2038 20.4288C15.0675 20.425 14.9325 20.425 14.7962 20.4288L12.6663 28.5312L14.9887 30.3837C14.995 30.39 15.005 30.39 15.0113 30.3837L17.3337 28.5312L15.2038 20.4288ZM15 0.25C10.5163 0.25 6.875 3.89125 6.875 8.375C6.875 12.8587 10.5163 16.5 15 16.5C19.4837 16.5 23.125 12.8587 23.125 8.375C23.125 3.89125 19.4837 0.25 15 0.25ZM15 2.75C18.105 2.75 20.625 5.27 20.625 8.375C20.625 11.48 18.105 14 15 14C11.895 14 9.375 11.48 9.375 8.375C9.375 5.27 11.895 2.75 15 2.75Z"
                                                      fill="white"/>
                                            </svg>
                                        </div>
                                        <div class="chart-num">
                                            <p>Formations</p>
                                            <h2 class="font-w700 mb-0">754</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6">
                                    <div class="content-box">
                                        <div class="event-data icon-box icon-box-xl">
                                            <svg width="20" height="20" viewBox="0 0 28 28" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M24 2.75H21.5V1.5C21.5 1.16848 21.3683 0.850537 21.1339 0.616117C20.8995 0.381696 20.5815 0.25 20.25 0.25C19.9185 0.25 19.6005 0.381696 19.3661 0.616117C19.1317 0.850537 19 1.16848 19 1.5V2.75H15.25V1.5C15.25 1.16848 15.1183 0.850537 14.8839 0.616117C14.6495 0.381696 14.3315 0.25 14 0.25C13.6685 0.25 13.3505 0.381696 13.1161 0.616117C12.8817 0.850537 12.75 1.16848 12.75 1.5V2.75H9V1.5C9 1.16848 8.8683 0.850537 8.63388 0.616117C8.39946 0.381696 8.08152 0.25 7.75 0.25C7.41848 0.25 7.10054 0.381696 6.86612 0.616117C6.6317 0.850537 6.5 1.16848 6.5 1.5V2.75H4C3.00544 2.75 2.05161 3.14509 1.34835 3.84835C0.645088 4.55161 0.25 5.50544 0.25 6.5V24C0.25 24.9946 0.645088 25.9484 1.34835 26.6517C2.05161 27.3549 3.00544 27.75 4 27.75H24C24.9946 27.75 25.9484 27.3549 26.6517 26.6517C27.3549 25.9484 27.75 24.9946 27.75 24V6.5C27.75 5.50544 27.3549 4.55161 26.6517 3.84835C25.9484 3.14509 24.9946 2.75 24 2.75ZM2.75 6.5C2.75 6.16848 2.8817 5.85054 3.11612 5.61612C3.35054 5.3817 3.66848 5.25 4 5.25H6.5V6.5C6.5 6.83152 6.6317 7.14946 6.86612 7.38388C7.10054 7.6183 7.41848 7.75 7.75 7.75C8.08152 7.75 8.39946 7.6183 8.63388 7.38388C8.8683 7.14946 9 6.83152 9 6.5V5.25H12.75V6.5C12.75 6.83152 12.8817 7.14946 13.1161 7.38388C13.3505 7.6183 13.6685 7.75 14 7.75C14.3315 7.75 14.6495 7.6183 14.8839 7.38388C15.1183 7.14946 15.25 6.83152 15.25 6.5V5.25H19V6.5C19 6.83152 19.1317 7.14946 19.3661 7.38388C19.6005 7.6183 19.9185 7.75 20.25 7.75C20.5815 7.75 20.8995 7.6183 21.1339 7.38388C21.3683 7.14946 21.5 6.83152 21.5 6.5V5.25H24C24.3315 5.25 24.6495 5.3817 24.8839 5.61612C25.1183 5.85054 25.25 6.16848 25.25 6.5V10.25H2.75V6.5ZM25.25 24C25.25 24.3315 25.1183 24.6495 24.8839 24.8839C24.6495 25.1183 24.3315 25.25 24 25.25H4C3.66848 25.25 3.35054 25.1183 3.11612 24.8839C2.8817 24.6495 2.75 24.3315 2.75 24V12.75H25.25V24Z"
                                                    fill="white"/>
                                            </svg>
                                        </div>
                                        <div class="chart-num">
                                            <p>Jobs & emplois</p>
                                            <h2 class="font-w700 mb-0">40</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6">
                                    <div class="content-box">
                                        <div class="food-data icon-box icon-box-xl bg-dark">
                                            <svg width="23" height="23" viewBox="0 0 28 34" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.25448 0.509167C5.96882 1.64226 4.0464 3.39315 2.70524 5.56327C1.36408 7.7334 0.657848 10.2359 0.666646 12.787V18.7167C0.667705 19.5871 1.01397 20.4216 1.62948 21.0372C2.245 21.6527 3.07951 21.9989 3.94998 22H7.33331V32C7.33331 32.442 7.50891 32.866 7.82147 33.1785C8.13403 33.4911 8.55795 33.6667 8.99998 33.6667C9.44201 33.6667 9.86593 33.4911 10.1785 33.1785C10.4911 32.866 10.6666 32.442 10.6666 32V2C10.6664 1.71598 10.5936 1.43673 10.4552 1.18872C10.3168 0.940703 10.1173 0.732152 9.87574 0.582831C9.63414 0.43351 9.3584 0.348368 9.07467 0.335477C8.79095 0.322585 8.50863 0.382371 8.25448 0.509167ZM7.33331 18.6833L3.99998 18.7167V12.787C3.99498 11.3525 4.28878 9.93273 4.86268 8.61805C5.43658 7.30336 6.27798 6.12261 7.33331 5.151V18.6833ZM24 2V8.66667C23.9994 9.10852 23.8236 9.53211 23.5112 9.84455C23.1988 10.157 22.7752 10.3328 22.3333 10.3333V2C22.3333 1.55797 22.1577 1.13405 21.8452 0.821489C21.5326 0.508929 21.1087 0.333334 20.6666 0.333334C20.2246 0.333334 19.8007 0.508929 19.4881 0.821489C19.1756 1.13405 19 1.55797 19 2V10.3333C18.5581 10.3328 18.1345 10.157 17.8221 9.84455C17.5097 9.53211 17.3339 9.10852 17.3333 8.66667V2C17.3333 1.55797 17.1577 1.13405 16.8452 0.821489C16.5326 0.508929 16.1087 0.333334 15.6666 0.333334C15.2246 0.333334 14.8007 0.508929 14.4881 0.821489C14.1756 1.13405 14 1.55797 14 2V8.66667C14.0014 9.9923 14.5287 11.2632 15.4661 12.2006C16.4034 13.138 17.6743 13.6652 19 13.6667V32C19 32.442 19.1756 32.866 19.4881 33.1785C19.8007 33.4911 20.2246 33.6667 20.6666 33.6667C21.1087 33.6667 21.5326 33.4911 21.8452 33.1785C22.1577 32.866 22.3333 32.442 22.3333 32V13.6667C23.6589 13.6652 24.9299 13.138 25.8672 12.2006C26.8046 11.2632 27.3319 9.9923 27.3333 8.66667V2C27.3333 1.55797 27.1577 1.13405 26.8452 0.821489C26.5326 0.508929 26.1087 0.333334 25.6666 0.333334C25.2246 0.333334 24.8007 0.508929 24.4881 0.821489C24.1756 1.13405 24 1.55797 24 2Z"
                                                    fill="white"/>
                                            </svg>
                                        </div>
                                        <div class="chart-num">
                                            <p>Evénements</p>
                                            <h2 class="font-w700 mb-0">32k</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            --}}
            <div class="row">
                @if(auth()->user()->enrolments->isNotEmpty())
                    @foreach(auth()->user()->enrolments as $enrolment)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <!-- Image illustrative -->
                                <img src="/storage/formations/{{$enrolment->formation->image}}" class="card-img-top"
                                     alt="Image illustrative">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <!-- Étoiles -->
                                        <div>
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="fas fa-star{{ $i < 4 ? ' text-warning' : '' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <!-- Titre et description -->
                                    <h5 class="card-title">{{ $enrolment->formation->title }}</h5>
                                    <p class="card-text text-danger mb-2">{{ $enrolment->formation->type_formation->title }}</p>
                                    <!-- Liste des détails de la formation -->
                                    <ul class="list-group list-group-flush mb-1">
                                        <li class="list-group-item py-1"><b>Spécialité:</b> {{ $enrolment->formation->field_speciality->title }}</li>
                                        <li class="list-group-item py-1"><b>Date de début:</b> {{ Carbon::parse($enrolment->formation->start_date)->locale('fr')->translatedFormat('d F Y')  }}</li>
                                        <li class="list-group-item py-1"><b>Date de fin:</b> {{ Carbon::parse($enrolment->formation->end_date)->locale('fr')->translatedFormat('d F Y')  }}</li>
                                        <li class="list-group-item py-1"><b>Prix:</b> {{ $enrolment->formation->price }}Franc CFA</li>
                                    </ul>
                                    @if($enrolment->payment_status != 'validated')
                                        <a href="{{ $enrolment->payment_link }}" class="btn btn-danger">Payer les frais</a>
                                    @else
                                        @if($enrolment->resource_access)
                                            <a class="btn btn-secondary"  href="{{ route('formation_resources', $enrolment->formation->id) }}">Ressources</a>
                                        @else
                                            <button type="button" class="btn btn-dark" id="toastr-danger-top-full-width-resource">Ressources</button>
                                        @endif
                                    @endif
                                    @if(isset($enrolment->formation->exams->first()->id))
                                        <a class="btn btn-info" href="{{ route('get_evaluation', $enrolment->id) }}">Passer l'examen</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body pb-xl-4 pb-sm-3 pb-0">
                                <p class="text-danger text-center fw-bolder">Vous n'êtes pas encore pas inscrit à une
                                    formation !</p>
                                <div class="text-center"><a class="btn btn-info" href="{{ route('formations') }}">Consulter le catalogue de formations</a></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

<!--**********************************
            Content body end
***********************************-->
