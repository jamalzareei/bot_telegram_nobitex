<?php

use App\Http\Controllers\API\FaqsController;
use App\Http\Controllers\API\NobitexAPIController;
use App\Http\Controllers\Pay\NextpayController;
use App\Http\Controllers\Telegram\FinancialController;
use App\Http\Controllers\Telegram\GuestsController;
use App\Http\Controllers\Telegram\SettingsController;
use App\Http\Controllers\Telegram\UserAuthenticationController;
use App\Http\Controllers\Telegram\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// User
Route::get('get-number-phone', [GuestsController::class, 'getNumberPhone']);
Route::get('confirm-number-phone', [GuestsController::class, 'confirmNumberPhone']);
Route::get('change-first-name', [UsersController::class, 'changeFirstName']);
Route::get('change-last-name', [UsersController::class, 'changeLastName']);
Route::get('change-national-code', [UsersController::class, 'changeNationalCode']);
Route::get('change-birth-day', [UsersController::class, 'changeBirthDay']);
Route::get('update-credit-user', [UsersController::class, 'updateCreditUser']);
Route::get('update-shaba-user', [UsersController::class, 'updateShabaUser']);
Route::get('confirm-account', [UsersController::class, 'confirmAccount']);

// Financial
Route::get('inventory-increase', [FinancialController::class, 'inventoryIncrease']);
Route::get('withdrawal-from-inventory', [FinancialController::class, 'ithdrawalFromInventory']);

Route::get('market/global-stats', [NobitexAPIController::class, 'marketGlobalStats']);

Route::get('faqs', [FaqsController::class, 'faqs']);
Route::get('faq-insert', [FaqsController::class, 'faqInsert']);

Route::get('change-image-menu', [SettingsController::class, 'changeImageMenu']);
Route::get('change-message-menu', [SettingsController::class, 'changeMessageMenu']);
Route::get('notifications', [SettingsController::class, 'notifications']);
Route::get('faqs', [SettingsController::class, 'faqs']);
Route::get('requests', [SettingsController::class, 'requests']);
Route::get('change-help', [SettingsController::class, 'changeHelp']);
Route::get('get-file-id-uploded', [SettingsController::class, 'fetFileIdUploaded']);


Route::get('authentication-user', [UserAuthenticationController::class, 'authenticationUser']);
Route::get('upload-image-natinal', [UserAuthenticationController::class, 'uploadImageNatinal']);
Route::get('upload-image-selfi', [UserAuthenticationController::class, 'uploadImageSelfi']);
Route::get('upload-video-selfi', [UserAuthenticationController::class, 'uploadVideoSelfi']);
Route::get('upload-card-bank', [UserAuthenticationController::class, 'uploadCardBank']);
Route::get('send-data-for-authentication', [UserAuthenticationController::class, 'sendDataForAuthentication']);
Route::get('auth-user-nextpay', [UserAuthenticationController::class, 'authUserNextpay']);

Route::prefix('pay')->namespace('Pay')->group(function () {
    Route::get('pay-nextpay/{model}/{id}/{type_request?}', [NextpayController::class, 'pay'])->name('pay.nextpay');
    Route::get('callback-nextpay/{pay_id}/{type_request?}', [NextpayController::class, 'callback'])->name('callback.nextpay');
});