<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Dokumen;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DokumenTerima7HariChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $endDate = Carbon::today();
        $startDate = $endDate->copy()->subDays(6);

        $countDokumenTerimaLatest7Day = [];
        $countDokumenPinjamLatest7Day = [];
        $countDokumenKeluarLatest7Day = [];
        $dateLatest7Day = [];

        for ($i = $startDate->copy(); $i->lte($endDate); $i->addDay()) {
            $countPinjam = Dokumen::whereHas('peminjaman', function ($query) use ($i) {
                $query->whereHas('bastPeminjaman', function ($query) use ($i) {
                    $query->whereDate('created_at', $i);
                });
            })->count();
            $countKeluar = Dokumen::whereHas('pengambilan', function ($query) use ($i) {
                $query->whereHas('bastPengambilan', function ($query) use ($i) {
                    $query->whereDate('created_at', $i);
                });
            })->count();
            $countTerima = Dokumen::whereDate('created_at', $i)->count();

            $countDokumenTerimaLatest7Day[] = $countTerima;
            $countDokumenPinjamLatest7Day[] = $countPinjam;
            $countDokumenKeluarLatest7Day[] = $countKeluar;
            $dateLatest7Day[] = $i->format('d-m-Y');
        }

        return $this->chart->barChart()
            ->setTitle('Transaksi Dokumen.')
            ->setSubtitle($startDate->format('d-m-Y') . " hingga " .  $endDate->format('d-m-Y'))
            ->addData('Terima', $countDokumenTerimaLatest7Day)
            ->addData('Pinjam', $countDokumenPinjamLatest7Day)
            ->addData('Keluar', $countDokumenKeluarLatest7Day)
            ->setXAxis($dateLatest7Day)
            ->setFontFamily('Arial');
    }
}
