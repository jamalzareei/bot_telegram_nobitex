<?php

use App\Http\Controllers\Telegram\TelegramController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::match(['get', 'post'], '/', [TelegramController::class, 'index']);

Route::get('/cache', function(){
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return 'ok';
});

Route::get('/setWebHook', 'TelegramController@setWebHook');
Route::get('/deleteWebHook', 'TelegramController@deleteWebHook');
Route::get('/getWebHookInfo', 'TelegramController@getWebHookInfo');
// localhost\bot\hello_laravel_heroku\telegram