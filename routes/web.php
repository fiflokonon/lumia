<?php

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
Route::get('/dashboard', function (){
    return view('pages.dashboard.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
