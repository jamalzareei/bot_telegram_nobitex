<?php

use App\Http\Controllers\Panel\FaqsController;
use App\Http\Controllers\Panel\StatusesController;
use App\Http\Controllers\Panel\TelegramController;
use App\Http\Controllers\Panel\TypesController;
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
    Route::get('/telegram/routes/edit', [TelegramController::class, 'editRoute'])->name('panel.telegram.edit.route');
    Route::post('/telegram/routes/update', [TelegramController::class, 'updateRoute'])->name('panel.telegram.update.route');

    Route::get('/types-list', [TypesController::class, 'list'])->name('panel.types.list');
    Route::post('/types/add', [TypesController::class, 'add'])->name('panel.types.add.type');
    Route::get('/types/edit', [TypesController::class, 'edit'])->name('panel.types.edit.type');
    Route::post('/types/update', [TypesController::class, 'update'])->name('panel.types.update.type');

    Route::get('/statuses-list', [StatusesController::class, 'list'])->name('panel.statuses.list');
    Route::post('/statuses/add', [StatusesController::class, 'add'])->name('panel.statuses.add.status');
    Route::get('/statuses/edit', [StatusesController::class, 'edit'])->name('panel.statuses.edit.status');
    Route::post('/statuses/update', [StatusesController::class, 'update'])->name('panel.statuses.update.status');

    
    Route::get('/faqs-list', [FaqsController::class, 'list'])->name('panel.faqs.list');
    Route::post('/faqs/add', [FaqsController::class, 'add'])->name('panel.faq.add');
    Route::get('/faqs/edit', [FaqsController::class, 'edit'])->name('panel.faq.edit');
    Route::post('/faqs/update', [FaqsController::class, 'update'])->name('panel.faq.update');
    
});

Route::group(['middleware' => ['role:admin']], function () {
    //
});

