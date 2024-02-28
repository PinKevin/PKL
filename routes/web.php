<?php

use App\Http\Controllers\BantuanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DebiturController;
use App\Http\Controllers\NotarisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\SuratRoyaController;
use App\Http\Controllers\StaffCabangController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\RekapDokumenController;
use App\Http\Controllers\StaffNotarisController;
use App\Http\Controllers\BastPeminjamanController;
use App\Http\Controllers\BastPengambilanController;
use App\Http\Controllers\BastPengembalianController;
use App\Http\Controllers\ReportPeminjamanController;
use App\Http\Controllers\PeminjamanDokumenController;
use App\Http\Controllers\PenerimaanDokumenController;
use App\Http\Controllers\ReportPengambilanController;
use App\Http\Controllers\PengambilanDokumenController;
use App\Http\Controllers\PengembalianDokumenController;

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

    Route::prefix('/pengambilan-dokumen')->group(function () {
        Route::get('/', [PengambilanDokumenController::class, 'index'])->name('pengambilan.index');
        Route::post('/cari', [PengambilanDokumenController::class, 'search'])->name('pengambilan.search');
        Route::get('/{no_debitur}', [PengambilanDokumenController::class, 'show'])->name('pengambilan.pengambilan');
        Route::get('/cetak-bast/{id}', [BastPengambilanController::class, 'cetakBast'])->name('pengambilan.cetak');
    });

    Route::prefix('/rekap-dokumen')->group(function () {
        Route::get('/', [RekapDokumenController::class, 'index'])->name('rekap-dokumen.index');
        Route::post('/cari', [RekapDokumenController::class, 'search'])->name('rekap-dokumen.search');
        Route::get('/{no_debitur}', [RekapDokumenController::class, 'show'])->name('rekap-dokumen.show');
    });

    Route::prefix('/report')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('report.index');
    });

    Route::prefix('/report-peminjaman')->group(function () {
        Route::get('/', [ReportPeminjamanController::class, 'index'])->name('report-peminjaman.index');
    });

    Route::prefix('/report-pengambilan')->group(function () {
        Route::get('/', [ReportPengambilanController::class, 'index'])->name('report-pengambilan.index');
    });

    Route::prefix('/stock-opname')->group(function () {
        Route::get('/', [StockOpnameController::class, 'index'])->name('stock-opname.index');
    });

    // Route::get('/berkas', [BerkasController::class, 'index'])->name('berkas');

    Route::prefix('/surat-roya')->group(function () {
        Route::get('/', [SuratRoyaController::class, 'index'])->name('surat-roya.index');
        Route::get('/create', [SuratRoyaController::class, 'create'])->name('surat-roya.create');
        Route::get('/{id}', [SuratRoyaController::class, 'show'])->name('surat-roya.show');
        Route::get('/{id}/edit', [SuratRoyaController::class, 'edit'])->name('surat-roya.edit');
        Route::get('/{id}/cetak', [SuratRoyaController::class, 'cetakWord'])->name('surat-roya.cetak');
    });

    Route::prefix('/bantuan')->group(function () {
        Route::get('/', [BantuanController::class, 'index'])->name('bantuan');
        Route::get('/dashboard', [BantuanController::class, 'dashboard'])->name('bantuan.dashboard');
        Route::get('/penerimaan', [BantuanController::class, 'penerimaan'])->name('bantuan.penerimaan');
        Route::get('/peminjaman', [BantuanController::class, 'peminjaman'])->name('bantuan.peminjaman');
        Route::get('/pengembalian', [BantuanController::class, 'pengembalian'])->name('bantuan.pengembalian');
        Route::get('/pengambilan', [BantuanController::class, 'pengambilan'])->name('bantuan.pengambilan');
    });
});
