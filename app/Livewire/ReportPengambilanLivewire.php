<?php

namespace App\Livewire;

use App\Models\Debitur;
use Livewire\Component;

class ReportPengambilanLivewire extends Component
{
    public $nama_filter;

    public function allDokumenDiambil()
    {
        $debiturWithDokumen = Debitur::with('dokumen.pengambilan.bastPengambilan')
            ->where('nama_debitur', 'like', '%' . trim($this->nama_filter) . '%')
            ->orWhere('no_debitur', 'like', '%' . trim($this->nama_filter) . '%')
            ->get();

        $debiturWithDokumenDiambil = $debiturWithDokumen->map(function ($debitur) {
            $debitur->dokumen = $debitur->dokumen->filter(function ($dokumen) {
                return $dokumen->status_keluar == 1;
            })->map(function ($dokumen) {
                $latestPengambilan = $dokumen->pengambilan->sortByDesc('bast_pengambilan_id')->first();

                if ($latestPengambilan && $latestPengambilan->bastPengambilan) {
                    $dokumen->tanggal_diambil = optional($latestPengambilan)->bastPengambilan->created_at->format('d-m-Y');
                    return $dokumen;
                }
            });
            return $debitur;
        })->reject(function ($debitur) {
            return $debitur->dokumen->isEmpty();
        });
        return $debiturWithDokumenDiambil;
    }

    public function render()
    {
        return view('livewire.report-pengambilan.report-pengambilan-livewire', [
            'allDebitur' => $this->allDokumenDiambil()
        ]);
    }
}
