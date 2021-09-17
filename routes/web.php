<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/manajer/dashboard', [ManajerController::class, 'index'])->name('manajer');
Route::get('/manajer/pengajuan-izin', [ManajerController::class, 'pengajuan']);
Route::get('/manajer/laporan', [ManajerController::class, 'laporan']);