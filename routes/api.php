<?php

use App\Http\Controllers\API\NobitexAPIController;
use App\Http\Controllers\Pay\NextpayController;
use App\Http\Controllers\Telegram\FinancialController;
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
Route::get('get-number-phone', [UsersController::class, 'getNumberPhone']);
Route::get('confirm-number-phone', [UsersController::class, 'confirmNumberPhone']);
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



Route::prefix('pay')->namespace('Pay')->group(function () {
    Route::get('pay-nextpay/{model}/{id}/{type_request?}', [NextpayController::class, 'pay'])->name('pay.nextpay');
    Route::get('callback-nextpay/{pay_id}/{type_request?}', [NextpayController::class, 'callback'])->name('callback.nextpay');
});