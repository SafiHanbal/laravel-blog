<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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

Route::resource('blogs', BlogController::class);
Route::resource('users', UserController::class)->except([
    'index', 'create', 'store'
]);

// Authentication routes
Route::get('signup', [UserController::class, 'signUpForm'])->name('users.signup-form');
Route::post('signup', [UserController::class, 'signUp'])->name('users.signup');

Route::get('login', [UserController::class, 'loginForm'])->name('users.login-form');
Route::post('login', [UserController::class, 'login'])->name('users.login');

Route::post('logout', [UserController::class, 'logout'])->name('users.logout');

Route::get('test', function () {
    dd(Auth::user());
});