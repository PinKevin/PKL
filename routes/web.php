<?php

use App\Http\Controllers\BastPeminjamanController;
use App\Http\Controllers\BastPengembalianController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\NotarisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebiturController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\PeminjamanDokumenController;
use App\Http\Controllers\PenerimaanDokumenController;
use App\Http\Controllers\PengembalianDokumenController;
use App\Http\Controllers\StaffCabangController;
use App\Http\Controllers\StaffNotarisController;
use App\Http\Controllers\SuratRoyaController;
use App\Models\Debitur;
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

    Route::prefix('/debitur')->group(function () {
        Route::get('/', [DebiturController::class, 'index'])->name('debitur.index');
        Route::get('/create', [DebiturController::class, 'create'])->name('debitur.create');
        Route::get('/{id}', [DebiturController::class, 'show'])->name('debitur.show');
        Route::get('/{id}/edit', [DebiturController::class, 'edit'])->name('debitur.edit');
    });

    Route::get('/notaris', [NotarisController::class, 'index'])->name('notaris.index');

    Route::get('/developer', [DeveloperController::class, 'index'])->name('developer.index');

    Route::get('/staff-notaris', [StaffNotarisController::class, 'index'])->name('staff-notaris.index');

    Route::get('/staff-cabang', [StaffCabangController::class, 'index'])->name('staff-cabang.index');

    Route::prefix('/penerimaan-dokumen')->group(function () {
        Route::get('/', [PenerimaanDokumenController::class, 'index'])->name('penerimaan.index');
        Route::post('/cari', [PenerimaanDokumenController::class, 'search'])->name('penerimaan.search');
        Route::get('/{no_debitur}', [PenerimaanDokumenController::class, 'show'])->name('penerimaan.dokumen');
    });

    Route::prefix('/peminjaman-dokumen')->group(function () {
        Route::get('/', [PeminjamanDokumenController::class, 'index'])->name('peminjaman.index');
        Route::post('/cari', [PeminjamanDokumenController::class, 'search'])->name('peminjaman.search');
        Route::get('/{no_debitur}', [PeminjamanDokumenController::class, 'show'])->name('peminjaman.peminjaman');
        Route::get('/cetak-bast/{id}', [BastPeminjamanController::class, 'cetakBast'])->name('peminjaman.cetak');
    });

    Route::prefix('/pengembalian-dokumen')->group(function () {
        Route::get('/', [PengembalianDokumenController::class, 'index'])->name('pengembalian.index');
        Route::post('/cari', [PengembalianDokumenController::class, 'search'])->name('pengembalian.search');
        Route::get('/{no_debitur}', [PengembalianDokumenController::class, 'show'])->name('pengembalian.pengembalian');
        Route::get('/cetak-bast/{id}', [BastPengembalianController::class, 'cetakBast'])->name('pengembalian.cetak');
    });

    Route::get('/berkas', [BerkasController::class, 'index'])->name('berkas');

    Route::prefix('/surat-roya')->group(function () {
        Route::get('/', [SuratRoyaController::class, 'index'])->name('surat-roya.index');
        Route::get('/create', [SuratRoyaController::class, 'create'])->name('surat-roya.create');
        Route::get('/{id}', [SuratRoyaController::class, 'show'])->name('surat-roya.show');
        Route::get('/{id}/edit', [SuratRoyaController::class, 'edit'])->name('surat-roya.edit');
        Route::get('/{id}/cetak', [SuratRoyaController::class, 'cetakWord'])->name('surat-roya.cetak');
    });
});
