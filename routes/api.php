<?php

use App\Http\Controllers\Api\Auth\ChangePasswordController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Auth\TokenChekController;
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

Route::get('/user-android/profile', [App\Http\Controllers\Api\UserAndroidController::class, 'index']);
Route::post('/user-android/register', [App\Http\Controllers\Api\Auth\RegisterController::class, 'store']);
Route::get('/user-android/{id}', [App\Http\Controllers\Api\UserAndroidController::class, 'show']);
Route::post('/user-android/register/update/{id}', [App\Http\Controllers\Api\UserAndroidController::class, 'update']);
Route::post('/user-android/login', [App\Http\Controllers\Api\Auth\LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\Auth\LoginController::class, 'logout']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//api email routes
Route::post('password/email',  ForgotPasswordController::class);
Route::post('password/code/check', TokenChekController::class);
Route::post('password/reset', ResetPasswordController::class);

//ganti password
Route::post('password/change/{id}', [ChangePasswordController::class, 'ganti']);

Route::get('/sertifikat', [App\Http\Controllers\Api\SertifikatController::class, 'index']);
Route::get('/kerjasama', [App\Http\Controllers\Api\KerjasamaController::class, 'index']);
Route::get('/penyediaan', [App\Http\Controllers\Api\PenyediaanController::class, 'index']);
Route::get('/laboratorium', [App\Http\Controllers\Api\LabController::class, 'index']);
Route::get('/pakan-alami', [App\Http\Controllers\Api\PakanController::class, 'index']);
Route::get('/bantuan-pemerintah', [App\Http\Controllers\Api\BantuanController::class, 'index']);
Route::get('/bintek-penelitian-kerjasama', [App\Http\Controllers\Api\BintekController::class, 'index']);
Route::get('/kontak-24jam', [App\Http\Controllers\Api\Kontak24jamController::class, 'index']);
Route::get('/ruang-belajar-pasif', [App\Http\Controllers\Api\RuangbelajarController::class, 'index']);
Route::get('/goes-mbak-tri', [App\Http\Controllers\Api\GoesController::class, 'index']);
Route::get('/database-informasi', [App\Http\Controllers\Api\DatabaseController::class, 'index']);
Route::get('/survei-pengguna', [App\Http\Controllers\Api\SurveiController::class, 'index']);
Route::get('/pusat-pengaduan', [App\Http\Controllers\Api\PengaduanController::class, 'index']);
Route::get('/slide-show', [App\Http\Controllers\Api\SlideController::class, 'index']);
Route::get('/info-terkini', [App\Http\Controllers\Api\InfoController::class, 'index']);