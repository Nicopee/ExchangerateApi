<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CountriesController;

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

Route::middleware('throttle:9000000')->group(function () {
    Route::post('admin/login', [AuthController::class, 'loginAdmin']);
    Route::apiResources([
        'admin/register' => AdminController::class,
    ]);
    Route::apiResource('countries', CountriesController::class)->except(['store', 'destroy', 'update']);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::apiResource('countries', CountriesController::class)->only(['store', 'destroy', 'update']);
});
