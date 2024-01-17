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

    Route::prefix('/surat-roya')->group(function () {
        Route::get('/', [SuratRoyaController::class, 'index'])->name('surat-roya.index');
        Route::get('/create', [SuratRoyaController::class, 'create'])->name('surat-roya.create');
        Route::get('/{id}', [SuratRoyaController::class, 'show'])->name('surat-roya.show');
        Route::get('/{id}/edit', [SuratRoyaController::class, 'edit'])->name('surat-roya.edit');
        Route::get('/{id}/cetak', [SuratRoyaController::class, 'cetakPdf'])->name('surat-roya.cetak');
    });


    Route::get('/cek-surat-roya', function () {
        return view('surat-roya.format');
    })->name('csr');
});
