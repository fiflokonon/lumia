<!--**********************************
            Sidebar start
***********************************-->
@php
    use App\Models\Role, App\Models\TypeFormation;
    $roles = Role::all();
    $type_formations = TypeFormation::all();
@endphp
<div class="dlabnav">
    <div class="dlabnav-scroll">

        @if(auth()->user()->isNotClient())
            <ul class="metismenu" id="menu">
                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">home</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a class="has-arrow" href="{{ route('users') }}" aria-expanded="false">Utilisateurs</a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('users')}}">Tous</a></li>
                                @foreach($roles as $role)
                                    <li>
                                        <a href="{{ route('role_users', ['code' => $role->code]) }}">{{ $role->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="../finance/index.html">Roles et permissions</a></li>
                        <li><a href="../finance/index.html">Transactions</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">school</i>
                        <span class="nav-text">Formations</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('fields') }}">Domaines</a></li>
                        <li><a href="{{ route('specialities') }}">Spécialités</a></li>
                        @foreach($type_formations as $type)
                            <li><a href="{{ route('type_formations', ['code' => $type->code]) }}">{{ $type->title }}</a>
                            </li>
                        @endforeach
                        <li><a href="../add-student/index.html">Formations expirées </a></li>
                    </ul>

                </li>
                <li><a class="" href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">person</i>
                        <span class="nav-text">Formateurs</span>
                    </a>
                    {{--<ul aria-expanded="false">
                        <li><a href="../teacher/index.html">Teacher</a></li>
                        <li><a href="../teacher-details/index.html">Teacher Detail</a></li>
                        <li><a href="../add-teacher/index.html">Add New Teacher</a></li>

                    </ul>--}}
                </li>

                <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons"> app_registration </i>
                        <span class="nav-text">Jobs & Emplois</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="../app-profile/index.html">Emplois en cours</a></li>
                        <li><a href="../edit-profile/index.html">Emplois expirés</a></li>
                        <li><a href="../post-details/index.html">Emplois archivés</a></li>
                    </ul>
                </li>

                <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                        <i class="material-icons"> event </i>
                        <span class="nav-text">Événements</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="../app-profile/index.html">Événements à venir</a></li>
                        <li><a href="../edit-profile/index.html">Événements expirés</a></li>
                        <li><a href="../post-details/index.html">Événements archivés</a></li>
                    </ul>
                </li>
            </ul>
        @else
            <ul class="metismenu" id="menu">
                <li>
                    <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">school</i>
                        <span class="nav-text">Mes formations</span>
                    </a>
                    <ul aria-expanded="false">
                        @foreach($type_formations as $type)
                            <li><a href="../student/index.html">{{ $type->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">school</i>
                        <span class="nav-text">Mes certificats</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="../student/index.html">Certificats validés</a></li>
                        <li><a href="../student-details/index.html">Certificats en cours</a></li>
                    </ul>
                </li>
            </ul>
        @endif
        <div class="copyright">
            <p><strong>Lumia Dashboard</strong></p>
            <p class="fs-12">Made with <span class="heart"></span></p>
            <p> by Fifonsi </p>
        </div>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
