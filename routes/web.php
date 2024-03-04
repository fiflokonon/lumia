<?php

use App\Http\Controllers\Dashboard\FieldController;
use App\Http\Controllers\Dashboard\FieldSpecialityController;
use App\Http\Controllers\Dashboard\FormationController;
use App\Http\Controllers\Dashboard\UserController;
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
    Route::get('/formations/{id}/enrol', [FormationController::class, 'enrol_formation'])->name('enrol_formation');

    Route::get('/fields', [FieldController::class, 'index'])->name('fields');
    Route::post('/fields', [FieldController::class, 'store'])->name('new_field');
    Route::get('/specialities', [FieldSpecialityController::class, 'index'])->name('specialities');
    Route::post('/specialities', [FieldSpecialityController::class, 'store'])->name('new_speciality');
    Route::get('/edit-profile/{id}', [UserController::class, 'edit_profile'] )->name('edit_profile');
    Route::get('/users/{id}', [UserController::class, 'show_profile'])->name('show_user');
});
