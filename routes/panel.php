<?php

use App\Http\Controllers\Panel\AccountsController;
use App\Http\Controllers\Panel\FaqsController;
use App\Http\Controllers\Panel\PaysController;
use App\Http\Controllers\Panel\RequestsController;
use App\Http\Controllers\Panel\RoleController;
use App\Http\Controllers\Panel\SettingsController;
use App\Http\Controllers\Panel\StatusesController;
use App\Http\Controllers\Panel\TelegramController;
use App\Http\Controllers\Panel\TypesController;
use App\Http\Controllers\Panel\UserController;
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

    
    Route::get('/list-list', [UserController::class, 'list'])->name('panel.users.list');
    Route::post('/user/send-code-confirm/{id}', [UserController::class, 'sendConfirmCode'])->name('panel.user.send.code.confirm');
    Route::post('/user/authentication/{id}', [UserController::class, 'authenticateUser'])->name('panel.user.authenticate');
    Route::post('/user/roles/sync/{id}', [UserController::class, 'rolesSync'])->name('panel.user.roles.sync');
    // Route::post('/faqs/add', [UserController::class, 'add'])->name('panel.faq.add');
    // Route::get('/faqs/edit', [UserController::class, 'edit'])->name('panel.faq.edit');
    // Route::post('/faqs/update', [UserController::class, 'update'])->name('panel.faq.update');

    Route::get('/settings-list', [SettingsController::class, 'list'])->name('panel.settings.list');
    Route::post('/settings/add', [SettingsController::class, 'add'])->name('panel.settings.add.setting');
    Route::get('/settings/edit', [SettingsController::class, 'edit'])->name('panel.settings.edit.setting');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('panel.settings.update.setting');

    
    Route::get('/roles-list', [RoleController::class, 'list'])->name('panel.roles.list');
    Route::post('/roles/add', [RoleController::class, 'add'])->name('panel.roles.add.role');
    Route::get('/roles/edit', [RoleController::class, 'edit'])->name('panel.roles.edit.role');
    Route::post('/roles/update', [RoleController::class, 'update'])->name('panel.roles.update.role');
    
    Route::get('/accounts-list', [AccountsController::class, 'list'])->name('panel.accounts.list');

    Route::get('/requests-list', [RequestsController::class, 'list'])->name('panel.requests.list');
    Route::post('/request-active/{id}', [RequestsController::class, 'requestActive'])->name('panel.request.active');

    
    Route::get('/pay-list', [PaysController::class, 'list'])->name('panel.pay.list');
});

Route::group(['middleware' => ['role:admin']], function () {
    //
});

