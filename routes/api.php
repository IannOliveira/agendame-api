<?php

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [\App\Http\Controllers\Me\MeController::class, 'show']);
    Route::post('/subscribe', \App\Http\Controllers\Subscription\SubscribeController::class);
});

//Auth
Route::post('login', \App\Http\Controllers\Auth\LoginController::class);
Route::post('logout', \App\Http\Controllers\Auth\LogoutController::class);
Route::post('register', \App\Http\Controllers\Auth\RegisterController::class);
Route::post('verify-email', \App\Http\Controllers\Auth\VerifyEmailController::class);
Route::post('forgot-password', \App\Http\Controllers\Auth\ForgotPasswordController::class);
Route::post('reset-password', \App\Http\Controllers\Auth\ResetPasswordController::class);

//Plans
Route::get('/plans', \App\Http\Controllers\Plans\PlanController::class);


