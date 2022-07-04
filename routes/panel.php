<?php

use App\Http\Controllers\Panel\TelegramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return auth()->user()->role('admin');
    // return (auth()->user()->load(['roles', 'permissions']));
    return view('panel.pages.dashboard.dashboard', ['title' => 'داشبورد', 'breadcrumb ' => null]);
})->name('panel');


Route::group(['middleware' => ['role:super-admin']], function () {
    //
    Route::get('/telegram/routes', [TelegramController::class, 'routes'])->name('panel.telegram.routes');
    Route::post('/telegram/routes/add', [TelegramController::class, 'addRoute'])->name('panel.telegram.add.route');

    
});

Route::group(['middleware' => ['role:admin']], function () {
    //
});

