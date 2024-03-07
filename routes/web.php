<?php

use App\Http\Controllers\Dashboard\FieldController;
use App\Http\Controllers\Dashboard\FieldSpecialityController;
use App\Http\Controllers\Dashboard\FormationController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\EnrolmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function (){
    return view('pages.landing.contact_page');
})->name('contact');
Route::get('/about', function () {
    return view('pages.landing.about');
})->name('about');

Route::get('/login-2', function (){
    return view('auth.login-2');
});
Route::get('/register-2', function (){
    return view('auth.register-2');
});
Route::get('/formations', [FormationController::class, 'index'])->name('formations');
Route::get('/callback/{id}', [EnrolmentController::class, 'callback'])->name('callback');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware("auth")->group(function () {
    Route::get('/dashboard', function (){
        if (auth()->user()->isNotClient()){
            return view('pages.dashboard.home');
        }else{
            return view('pages.dashboard.client_home');
        }
    })->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/roles/{code}/users', [UserController::class, 'role_users'])->name('role_users');

    Route::get('/type/{code}/formations', [FormationController::class, 'type_formations'])->name('type_formations');
    Route::post('/formations', [FormationController::class, 'create'])->name('new_formation');
    Route::get('/add-formations', [FormationController::class, 'add_formation'])->name('add_formations');
    Route::post('/formations/{id}/resources', [FormationController::class, 'createResource'])->name('add_resources');
    Route::get('/formations/{id}/resources', [FormationController::class, 'show_resources'])->name('formation_resources');
    Route::get('/formations/{id}/resource-access', [FormationController::class, 'manage_resource_access'])->name('resource_access');
    Route::post('/formations/{id}/resource-access', [FormationController::class, 'update_access'])->name('update_resource_access');
    Route::get('/resources/{id}/change-visibility', [FormationController::class, 'resource_visibility'])->name('change_resource_visibility');

    Route::get('/formations/{id}/enrol', [FormationController::class, 'enrol_formation'])->name('enrol_formation');
    Route::post('/formations/{id}/register', [FormationController::class, 'registerForFormation'])->name('register_formation');
    Route::get('/formations/{id}/enrolments', [FormationController::class, 'formation_enrolments'])->name('formation_enrolments');

    Route::get('/fields', [FieldController::class, 'index'])->name('fields');
    Route::post('/fields', [FieldController::class, 'store'])->name('new_field');
    Route::get('/specialities', [FieldSpecialityController::class, 'index'])->name('specialities');
    Route::post('/specialities', [FieldSpecialityController::class, 'store'])->name('new_speciality');
    Route::get('/edit-profile/{id}', [UserController::class, 'edit_profile'] )->name('edit_profile');
    Route::get('/users/{id}', [UserController::class, 'show_user_details'])->name('show_user');
    Route::get('/profile', [UserController::class, 'show_profile'])->name('show_profile');
});
