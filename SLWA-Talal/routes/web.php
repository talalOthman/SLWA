<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\FullcalendarController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ExternalEventsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('login', function(){
     return view('auth.login');
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//for calendar
Route::post('/home/create', [FullCalendarController::class, 'insert']);
Route::get('/home/addEvent', function(){
    return view('addevent');
});
Route::post('/home/update', [FullCalendarController::class, 'update']);
Route::get('/home/delete1', [FullCalendarController::class, 'deleteRedirect']);
Route::get('/home/delete2/{id}', [FullCalendarController::class, 'delete']);

//for notifications page
Route::get('/notification', [NotificationController::class, 'index']);


// For google login
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);



// For github login
Route::get('login/github', [LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [LoginController::class, 'handleGithubCallback']);



// For google register
Route::get('register/google', [RegisterController::class, 'redirectToGoogle'])->name('register.google');
Route::get('register/google/callback', [RegisterController::class, 'handleGoogleCallback']);



// For github register
Route::get('register/github', [RegisterController::class, 'redirectToGithub'])->name('register.github');
Route::get('register/github/callback', [RegisterController::class, 'handleGithubCallback']);


Route::post('profile', [UserController::class, 'updateUserData']);
Route::get('profile', [UserController::class, 'profile']);

Route::get('UpdatePassword', function(){
    return view('UpdatePassword');
});

Route::get('UpdatePassword', [ChangePasswordController::class, 'index'])->name('password.change');

Route::post('UpdatePassword', [ChangePasswordController::class, 'changePassword'])->name('password.upgrade');




//For external events page
Route::get('api', [ExternalEventsController::class, 'index']);
Route::get('api/button/{id}',[FullCalendarController::class, 'insertApi']);


//For notifications
Route::get('send', [NotificationController::class, 'sendNotification']);