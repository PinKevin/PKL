<?php

use App\Http\Controllers\BerkasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratRoyaController;
use App\Models\SuratRoya;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'showPage'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'showPage'])->name('dashboard');

    Route::get('/berkas', [BerkasController::class, 'index'])->name('berkas');
    Route::get('/surat-roya', [SuratRoyaController::class, 'index'])->name('surat-roya');

    Route::get('/cek-surat-roya', function () {
        return view('surat-roya.format');
    })->name('csr');
});
