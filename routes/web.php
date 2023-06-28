<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('login', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('check-user', [HomeController::class, 'check_user']);

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::resource('guru', \App\Http\Controllers\Admin\GuruController::class);
    Route::resource('kelas', \App\Http\Controllers\Admin\KelasController::class);
    Route::resource('siswa', \App\Http\Controllers\Admin\SiswaController::class);

    Route::resource('menu-home', \App\Http\Controllers\Admin\MenuHomeController::class);
    Route::resource('menu-about', \App\Http\Controllers\Admin\MenuAboutController::class);
    Route::resource('menu-galeri', \App\Http\Controllers\Admin\MenuGaleriController::class);
    Route::resource('menu-ppdb', \App\Http\Controllers\Admin\MenuPpdbController::class);
    Route::resource('menu-kontak', \App\Http\Controllers\Admin\MenuKontakController::class);
    
    Route::get('profile-sekolah', [\App\Http\Controllers\Admin\ProfileSekolahController::class, 'index']);
    Route::post('profile-sekolah', [\App\Http\Controllers\Admin\ProfileSekolahController::class, 'update']);
    Route::post('profile-sekolah/test', [\App\Http\Controllers\Admin\ProfileSekolahController::class, 'test']);
});
