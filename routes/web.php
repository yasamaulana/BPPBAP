<?php

use App\Http\Controllers\AdminControlller;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\BintekController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\GoesController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PenyediaanController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\UserandroidController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('home');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin', function () {
  return view(
    'admin.dash',
    ["title" => "Dashboard"]
  );
})->middleware('auth');

//setting
Route::get('/setting', function () {
  return view(
    'admin.setting',
    ["title" => "Setting"]
  );
});

//userAndoid
Route::resource('/user-android', UserandroidController::class);
//useradmin
Route::resource('/user-admin', AdminControlller::class);
//sertifikat
Route::resource('/sertifikat', SertifikatController::class);
//kerjasama
Route::resource('/kerjasama', KerjasamaController::class);
//peneyediaan
Route::resource('/penyediaan', PenyediaanController::class);
//laboratorium
Route::resource('/laboratorium', LaboratoriumController::class);
//bintek
Route::resource('/bintek-penelitian-kerjasama', BintekController::class);
//ruang belajar pasif
Route::resource('/ruang-belajar-pasif', BelajarController::class);
//database informasi
Route::resource('/database-informasi', DatabaseController::class);
//kontak-24jam
Route::resource('/kontak-24jam', KontakController::class);
//goes mbak tri
Route::resource('/goes-mbak-tri', GoesController::class);
//survei pengguna
Route::resource('/survei-pengguna', SurveiController::class);
//pengaduan
Route::resource('/pusat-pengaduan', PengaduanController::class);
//slide show
Route::resource('/slide-show', SlideController::class);
//info terkini
Route::resource('/info-terkini', InfoController::class);