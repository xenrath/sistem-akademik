<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->middleware('isLogin');
Route::get('login', [UserController::class, 'index'])->middleware('isLogin');
Route::post('login-action', [UserController::class, 'login_action'])->name('login.action')->middleware('isLogin');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('checkuser', [HomeController::class, 'checkUser']);


Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::resource('guru', \App\Http\Controllers\Admin\GuruController::class);
    Route::resource('kelas', \App\Http\Controllers\Admin\KelasController::class);
    Route::resource('siswa', \App\Http\Controllers\Admin\SiswaController::class);
});