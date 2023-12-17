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
Route::get('/storage/{filename}', function ($filename) {
    $path = storage_path("app/public/{$filename}");

    if (!file_exists($path)) {
        abort(404);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file, 200)
        ->header('Content-Type', $type);
})->where('filename', '.*');

Route::get('/', function () {
    return redirect()->route('blogs.index');
});

Route::resource('blogs', BlogController::class)
    ->middleware(['protected.route'])->except(['index', 'show']);
Route::resource('blogs', BlogController::class)
    ->only(['index', 'show']);

Route::resource('users', UserController::class)->except([
    'index', 'create', 'store'
]);

// Authentication routes
Route::get('signup', [UserController::class, 'signUpForm'])->name('users.signup-form');
Route::post('signup', [UserController::class, 'signUp'])->name('users.signup');

Route::get('login', [UserController::class, 'loginForm'])->name('users.login-form');
Route::post('login', [UserController::class, 'login'])->name('users.login');

Route::get('logout', [UserController::class, 'logout'])->name('users.logout')
    ->middleware('protected.route');

Route::get('test', function () {
    dd(Auth::user());
});