<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'dashboard'])->name('main'); 

Route::get('/migrate-fresh', function () {
    Artisan::call('migrate:fresh');
    return 'migrate-fresh';
});
Route::get('/migrate', function () {
    Artisan::call('migrate');
    return 'migrate';
});

Route::get('/cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('optimize:clear');
    // php artisan optimize:clear
    // composer dump-autoload
    return "Configuration cache file removed";
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('user-data', [AuthController::class, 'userData'])->name('user.data'); ; 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');