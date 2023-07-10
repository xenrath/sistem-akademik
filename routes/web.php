<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile', [ProfileController::class, 'update']);

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::resource('guru', \App\Http\Controllers\Admin\GuruController::class);

    Route::resource('kelas', \App\Http\Controllers\Admin\KelasController::class);

    Route::resource('siswa', \App\Http\Controllers\Admin\SiswaController::class);

    Route::resource('orangtua', \App\Http\Controllers\Admin\OrangtuaController::class)->except('create', 'store');

    Route::resource('mapel', \App\Http\Controllers\Admin\MapelController::class);

    Route::get('menu-home', [\App\Http\Controllers\Admin\MenuHomeController::class, 'index']);
    Route::post('menu-home/update', [\App\Http\Controllers\Admin\MenuHomeController::class, 'update']);

    Route::get('menu-about', [\App\Http\Controllers\Admin\MenuAboutController::class, 'index']);
    Route::post('menu-about/update', [\App\Http\Controllers\Admin\MenuAboutController::class, 'update']);

    Route::get('menu-galeri', [\App\Http\Controllers\Admin\MenuGaleriController::class, 'index']);
    Route::post('menu-galeri/update', [\App\Http\Controllers\Admin\MenuGaleriController::class, 'update']);
    Route::get('menu-galeri/{key}/hapus', [\App\Http\Controllers\Admin\MenuGaleriController::class, 'hapus']);

    Route::get('menu-ppdb', [\App\Http\Controllers\Admin\MenuPpdbController::class, 'index']);
    Route::post('menu-ppdb/update', [\App\Http\Controllers\Admin\MenuPpdbController::class, 'update']);

    Route::get('menu-kontak', [\App\Http\Controllers\Admin\MenuKontakController::class, 'index']);
    Route::post('menu-kontak/update', [\App\Http\Controllers\Admin\MenuKontakController::class, 'update']);

    Route::get('profile-sekolah', [\App\Http\Controllers\Admin\ProfileSekolahController::class, 'index']);
    Route::post('profile-sekolah', [\App\Http\Controllers\Admin\ProfileSekolahController::class, 'update']);
    Route::post('profile-sekolah/test', [\App\Http\Controllers\Admin\ProfileSekolahController::class, 'test']);
});

Route::middleware('guru')->prefix('guru')->group(function () {
    Route::get('/', [\App\Http\Controllers\Guru\DashboardController::class, 'index']);

    Route::get('mapel', [\App\Http\Controllers\Guru\MapelController::class, 'index']);

    Route::get('siswa', [\App\Http\Controllers\Guru\SiswaController::class, 'index']);

    Route::get('jadwal', [\App\Http\Controllers\Guru\JadwalController::class, 'index']);

    Route::post('nilai/absensi/{id}', [\App\Http\Controllers\Guru\NilaiController::class, 'absensi']);
    Route::post('nilai/tugas/{id}', [\App\Http\Controllers\Guru\NilaiController::class, 'tugas']);
    Route::post('nilai/uts/{id}', [\App\Http\Controllers\Guru\NilaiController::class, 'uts']);
    Route::post('nilai/uas/{id}', [\App\Http\Controllers\Guru\NilaiController::class, 'uas']);
    Route::resource('nilai', \App\Http\Controllers\Guru\NilaiController::class)->only('index', 'show');

    Route::resource('kelas', \App\Http\Controllers\Guru\KelasController::class);

    Route::resource('mapel', \App\Http\Controllers\Guru\MapelController::class);
});

Route::middleware('orangtua')->prefix('orangtua')->group(function () {
    Route::get('/', [\App\Http\Controllers\Orangtua\DashboardController::class, 'index']);

    Route::get('jadwal', [\App\Http\Controllers\Orangtua\JadwalController::class, 'index']);
    
    Route::get('nilai', [\App\Http\Controllers\Orangtua\NilaiController::class, 'index']);
});
