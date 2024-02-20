<?php

namespace App\Livewire;

use App\Models\Debitur;
use Livewire\Component;

class StockOpnameLivewire extends Component
{
    public $nama_filter;

    public function allDokumenTersedia()
    {
        $debiturWithDokumen = Debitur::with('dokumen')
            ->where('nama_debitur', 'like', '%' . trim($this->nama_filter) . '%')
            ->orWhere('no_debitur', 'like', '%' . trim($this->nama_filter) . '%')
            ->get();

        $debiturWithDokumenTersedia = $debiturWithDokumen->map(function ($debitur) {
            $debitur->dokumen = $debitur->dokumen->filter(function ($dokumen) {
                return $dokumen->status_pinjaman == 0  && $dokumen->status_keluar == 0;
            });
            return $debitur;
        });
        // dd($debiturWithDokumenTersedia);
        return $debiturWithDokumenTersedia;
    }

    public function render()
    {
        return view('livewire.stock-opname.stock-opname-livewire', [
            'allDebitur' => $this->allDokumenTersedia()
        ]);
    }
}
