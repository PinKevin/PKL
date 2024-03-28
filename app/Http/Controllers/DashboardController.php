<?php

namespace App\Http\Controllers;

use App\Charts\DokumenTerima7HariChart;
use App\Models\BastPeminjaman;
use Carbon\Carbon;
use App\Models\Dokumen;

class DashboardController extends Controller
{
    public function showPage(DokumenTerima7HariChart $chart)
    {
        $today = Carbon::today();

        $countDokumenTerimaToday = Dokumen::whereDate('created_at', $today)->count();
        $countDokumenPinjamToday = Dokumen::whereHas('peminjaman', function ($query) use ($today) {
            $query->whereHas('bastPeminjaman', function ($query) use ($today) {
                $query->whereDate('created_at', $today);
            });
        })->count();
        $countDokumenKeluarToday = Dokumen::whereHas('pengambilan', function ($query) use ($today) {
            $query->whereHas('bastPengambilan', function ($query) use ($today) {
                $query->whereDate('created_at', $today);
            });
        })->count();

        $bastPeminjaman = BastPeminjaman::with('peminjaman.dokumen.debitur')
            ->where('tanggal_jatuh_tempo', '<=', $today->toDateString())
            ->get();

        return view('dashboard', [
            'countDokumenTerimaToday' => $countDokumenTerimaToday,
            'countDokumenPinjamToday' => $countDokumenPinjamToday,
            'countDokumenKeluarToday' => $countDokumenKeluarToday,
            'bastPeminjaman' => $bastPeminjaman,
            'chart' => $chart->build()
        ]);
    }

    public function showAdminDashboard()
    {
        return view('admin-dashboard');
    }
}
