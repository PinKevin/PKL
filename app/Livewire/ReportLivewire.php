<?php

namespace App\Livewire;

use App\Models\BastPeminjaman;
use App\Models\BastPengambilan;
use App\Models\BastPengembalian;
use Livewire\Component;

class ReportLivewire extends Component
{
    public function getAllPeminjaman()
    {
        $bastPeminjaman = BastPeminjaman::with('debitur')->get();
        return $bastPeminjaman;
    }

    public function getAllPengembalian()
    {
        $bastPengembalian = BastPengembalian::with('debitur')->get();
        return $bastPengembalian;
    }

    public function getAllPengambilan()
    {
        $bastPengambilan = BastPengambilan::with('debitur')->get();
        return $bastPengambilan;
    }

    public function getAllTransaksi()
    {
        $bastPeminjaman = $this->getAllPeminjaman();
        $bastPengembalian = $this->getAllPengembalian();
        $bastPengambilan = $this->getAllPengambilan();

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

        $allTransaksi = $bastPeminjaman->merge($bastPengembalian)->merge($bastPengambilan);
        $allTransaksi = $allTransaksi->map(function ($item, $key) {
            $item['urutan'] = $key + 1;
            return $item;
        });
        return $allTransaksi;
    }

    public function render()
    {
        return view('livewire.report.report-livewire', [
            'allBastPeminjaman' => $this->getAllPeminjaman(),
            'allBastPengembalian' => $this->getAllPengembalian(),
            'allBastPengambilan' => $this->getAllPengambilan(),
            'allTransaksi' => $this->getAllTransaksi()
        ]);
    }
}
