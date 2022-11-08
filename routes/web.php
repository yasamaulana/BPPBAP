<?php

use App\Http\Controllers\AdminControlller;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\BintekController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\GoesController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PakanController;
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
Route::resource('/user-android', UserandroidController::class)->middleware('super');
Route::get('/user-android/export', [UserandroidController::class, 'export'])->middleware('super');
//useradmin
Route::resource('/user-admin', AdminControlller::class)->middleware('super');
//sertifikat
Route::resource('/sertifikat', SertifikatController::class)->middleware('auth');
//kerjasama
Route::resource('/kerjasama', KerjasamaController::class)->middleware('auth');
//peneyediaan
Route::resource('/penyediaan', PenyediaanController::class)->middleware('auth');
//laboratorium
Route::resource('/laboratorium', LaboratoriumController::class)->middleware('auth');
//bintek
Route::resource('/bintek-penelitian-kerjasama', BintekController::class)->middleware('auth');
//ruang belajar pasif
Route::resource('/ruang-belajar-pasif', BelajarController::class)->middleware('auth');
//database informasi
Route::resource('/database-informasi', DatabaseController::class)->middleware('auth');
//kontak-24jam
Route::resource('/kontak-24jam', KontakController::class)->middleware('auth');
//goes mbak tri
Route::resource('/goes-mbak-tri', GoesController::class)->middleware('auth');
//survei pengguna
Route::resource('/survei-pengguna', SurveiController::class)->middleware('auth');
//pengaduan
Route::resource('/pusat-pengaduan', PengaduanController::class)->middleware('auth');
//slide show
Route::resource('/slide-show', SlideController::class)->middleware('auth');
//info terkini
Route::resource('/info-terkini', InfoController::class)->middleware('auth');
//pakan alami
Route::resource('/pakan-alami', PakanController::class)->middleware('auth');
//bantuan
Route::resource('/bantuan-pemerintah', BantuanController::class)->middleware('auth');