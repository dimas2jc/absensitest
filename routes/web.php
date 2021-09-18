<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ManajerController;
use App\Http\Controllers\HrdController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\HomeController;

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

// Route Authenticate
Route::get('/', [HomeController::class, 'authenticate'])->name('login');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::post('/post-login', [HomeController::class, 'postLogin']);

Route::group(['middleware' => ['auth']],function(){
    Route::get('/profile', [HomeController::class, 'profile']);
    Route::get('/ganti-password', [HomeController::class, 'gantiPassword']);

    Route::post('/ganti-password', [HomeController::class, 'updatePassword']);
    Route::post('/edit-profile', [HomeController::class, 'updateProfile']);
});

// Route HRD
Route::middleware('auth','checkRole:1')->prefix('hrd')->group(function () {
    Route::get('/dashboard', [HrdController::class, 'index'])->name('hrd');
    Route::get('/user', [HrdController::class, 'user']);
    Route::get('/laporan', [HrdController::class, 'laporan']);

    Route::post('/tambah-user', [HrdController::class, 'store']);
    Route::post('/update-status-user', [HrdController::class, 'userStatus']);
});

// Route Manajer
Route::middleware('auth','checkRole:2')->prefix('manajer')->group(function () {
    Route::get('/dashboard', [ManajerController::class, 'index'])->name('manajer');
    Route::get('/pengajuan-izin', [ManajerController::class, 'pengajuan']);
    Route::get('/laporan', [ManajerController::class, 'laporan']);

    Route::post('/pengajuan-approve', [ManajerController::class, 'pengajuanApprove']);
    Route::post('/pengajuan-reject', [ManajerController::class, 'pengajuanReject']);
});

// Route Karyawan
Route::middleware('auth','checkRole:3')->prefix('karyawan')->group(function () {
    Route::get('/absensi', [KaryawanController::class, 'index'])->name('karyawan');
    Route::get('/pengajuan-izin', [KaryawanController::class, 'pengajuan']);
    
    Route::post('/tambah-pengajuan', [KaryawanController::class, 'storePengajuan']);
});

