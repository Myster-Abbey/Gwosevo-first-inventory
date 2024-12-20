<?php

use Illuminate\Http\Request;
use App\Jobs\ProcessTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Api\CodeController;
use App\Http\Controllers\HubtelCallbackController;

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

Route::post("calabash/payment", [PaymentController::class, "payment"]);

Route::post("hubtel/callback", HubtelCallbackController::class);
Route::post("hubtel/payment", [PaymentController::class, "hubtel_payment"]);
Route::get("hubtel/check/transaction/{clientReference}", [PaymentController::class, "check_hubtel_transaction"]);



Route::post("payment/callback", [PaymentController::class, "payment_callback"]);
