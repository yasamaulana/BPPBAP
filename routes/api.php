<?php

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

Route::get('/user-android', [App\Http\Controllers\Api\UserAndroidController::class, 'index']);
Route::post('/user-android', [App\Http\Controllers\Api\UserAndroidController::class, 'create']);
Route::get('/user-android/{id}', [App\Http\Controllers\Api\UserAndroidController::class, 'show']);
Route::put('/user-android/{id}', [App\Http\Controllers\Api\UserAndroidController::class, 'update']);