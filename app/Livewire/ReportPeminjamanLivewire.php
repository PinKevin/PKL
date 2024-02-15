<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use Livewire\Component;

class ReportPeminjamanLivewire extends Component
{
    public function allDokumenDipinjam()
    {
        $debiturWithDokumen = Debitur::with('dokumen.peminjaman.bastPeminjaman')->get();

        $debiturWithDokumenDipinjam = $debiturWithDokumen->map(function ($debitur) {
            $debitur->dokumen = $debitur->dokumen->filter(function ($dokumen) {
                return $dokumen->status_pinjaman == 1;
            })->map(function ($dokumen) {
                $latestPeminjaman = $dokumen->peminjaman->sortByDesc('bast_peminjaman_id')->first();
                $dokumen->tanggal_pinjam = optional($latestPeminjaman)->bastPeminjaman->tanggal_pinjam->format('d-m-Y');
                $dokumen->tanggal_jatuh_tempo = optional($latestPeminjaman)->bastPeminjaman->tanggal_jatuh_tempo->format('d-m-Y');
                return $dokumen;
            });
            return $debitur;
        })->reject(function ($debitur) {
            return $debitur->dokumen->isEmpty();
        });
        return $debiturWithDokumenDipinjam;
    }

    public function render()
    {
        return view('livewire.report-peminjaman.report-peminjaman-livewire', [
            'allDebitur' => $this->allDokumenDipinjam()
        ]);
    }
}
