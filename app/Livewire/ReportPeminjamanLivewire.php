<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use Livewire\Component;

class ReportPeminjamanLivewire extends Component
{
    public function allDokumenDipinjam()
    {
        $debiturWithDokumen = Debitur::with('dokumen')->get();

        $debiturWithDokumenDipinjam = $debiturWithDokumen->map(function ($debitur) {
            $debitur->dokumen = $debitur->dokumen->filter(function ($dokumen) {
                return $dokumen->status_pinjaman == 1;
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
