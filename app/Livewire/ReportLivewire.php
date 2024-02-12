<?php

namespace App\Livewire;

use App\Models\BastPeminjaman;
use App\Models\BastPengambilan;
use App\Models\BastPengembalian;
use Livewire\Component;

class ReportLivewire extends Component
{
    public $date_filter_awal, $date_filter_akhir, $jenis_filter;

    public function getAllTransaksi()
    {
        if (!$this->date_filter_awal && !$this->date_filter_akhir) {
            $awalMinggu = now()->startOfWeek()->subWeek()->toDateString();
            $akhirMinggu = now()->endOfWeek()->subWeek()->toDateString();

            $bastPeminjaman = BastPeminjaman::with('debitur')->whereBetween('created_at', [$awalMinggu, $akhirMinggu])->get();
            $bastPengembalian = BastPengembalian::with('debitur')->whereBetween('created_at', [$awalMinggu, $akhirMinggu])->get();
            $bastPengambilan = BastPengambilan::with('debitur')->whereBetween('created_at', [$awalMinggu, $akhirMinggu])->get();
        } else {
            $bastPeminjaman = BastPeminjaman::with('debitur')->whereBetween('created_at', [$this->date_filter_awal, $this->date_filter_akhir])->get();
            $bastPengembalian = BastPengembalian::with('debitur')->whereBetween('created_at', [$this->date_filter_awal, $this->date_filter_akhir])->get();
            $bastPengambilan = BastPengambilan::with('debitur')->whereBetween('created_at', [$this->date_filter_awal, $this->date_filter_akhir])->get();
        }

        $bastPeminjaman = $bastPeminjaman->map(function ($item) {
            $peminjamanList = [];

            foreach ($item->peminjaman as $peminjaman) {
                $dokumen = $peminjaman->dokumen;
                $jenisDokumen = $dokumen->jenis;
                $peminjamanList[] = $jenisDokumen;
            }

            return [
                'id' => $item->id,
                'no_debitur' => $item->debitur()->first()->no_debitur,
                'nama_debitur' => $item->debitur()->first()->nama_debitur,
                'dokumen' => $peminjamanList,
                'jenis' => 'Peminjaman',
            ];
        });

        $bastPengembalian = $bastPengembalian->map(function ($item) {
            $pengembalianList = [];

            foreach ($item->pengembalian as $pengembalian) {
                $dokumen = $pengembalian->dokumen;
                $jenisDokumen = $dokumen->jenis;
                $pengembalianList[] =   $jenisDokumen;
            }

            return [
                'id' => $item->id,
                'no_debitur' => $item->debitur()->first()->no_debitur,
                'nama_debitur' => $item->debitur()->first()->nama_debitur,
                'dokumen' => $pengembalianList,
                'jenis' => 'Pengembalian'
            ];
        });

        $bastPengambilan = $bastPengambilan->map(function ($item) {
            $pengambilanList = [];

            foreach ($item->pengambilan as $pengambilan) {
                $dokumen = $pengambilan->dokumen;
                $jenisDokumen = $dokumen->jenis;
                $pengambilanList[] = $jenisDokumen;
            }

            return [
                'id' => $item->id,
                'no_debitur' => $item->debitur->no_debitur,
                'nama_debitur' => $item->debitur->nama_debitur,
                'dokumen' => $pengambilanList,
                'jenis' => 'Pengambilan'
            ];
        });

        if ($this->jenis_filter) {
            switch ($this->jenis_filter) {
                case 'Peminjaman':
                    $allTransaksi = $bastPeminjaman;
                    break;
                case 'Pengembalian':
                    $allTransaksi = $bastPengembalian;
                    break;
                case 'Pengambilan':
                    $allTransaksi = $bastPengambilan;
                    break;
                default:
                    $allTransaksi = collect([]);
                    break;
            }
        } else {
            $allTransaksi = $bastPeminjaman->merge($bastPengembalian)->merge($bastPengambilan);
        }

        $allTransaksi = $allTransaksi->map(function ($item, $key) {
            $item['urutan'] = $key + 1;
            return $item;
        });
        return $allTransaksi;
    }

    public function render()
    {
        return view('livewire.report.report-livewire', [
            'allTransaksi' => $this->getAllTransaksi()
        ]);
    }
}
