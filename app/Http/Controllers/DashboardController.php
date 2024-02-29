<?php

namespace App\Http\Controllers;

use App\Charts\DokumenTerima7HariChart;
use Carbon\Carbon;
use App\Models\Dokumen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showPage(DokumenTerima7HariChart $chart)
    {
        $countDokumenTerimaToday = Dokumen::whereDate('created_at', now()->toDateString())->count();
        $countDokumenPinjamToday = Dokumen::whereHas('peminjaman', function ($query) {
            $query->whereHas('bastPeminjaman', function ($query) {
                $query->whereDate('created_at', Carbon::today());
            });
        })->count();
        $countDokumenKeluarToday = Dokumen::whereHas('pengambilan', function ($query) {
            $query->whereHas('bastPengambilan', function ($query) {
                $query->whereDate('created_at', Carbon::today());
            });
        })->count();

        return view('dashboard', [
            'countDokumenTerimaToday' => $countDokumenTerimaToday,
            'countDokumenPinjamToday' => $countDokumenPinjamToday,
            'countDokumenKeluarToday' => $countDokumenKeluarToday,
            'chart' => $chart->build()
        ]);
    }

    public function showAdminDashboard()
    {
        return view('admin-dashboard');
    }
}
