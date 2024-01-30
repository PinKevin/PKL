<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use Livewire\Component;
use App\Models\SuratRoya;

class PengembalianDokumenLivewire extends Component
{
    public $debitur, $no_debitur;

    public function mount()
    {
        $this->debitur();
    }

    public function debitur()
    {
        $this->debitur = Debitur::select('id', 'nama_debitur', 'no_debitur')
            ->where('no_debitur', $this->no_debitur)
            ->first();
    }

    public function indexDokumen()
    {
        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)->get();
        return $dokumen;
    }

    public function getRoyaDebitur()
    {
        $roya = SuratRoya::where('debitur_id', $this->debitur->id)->first();
        return $roya;
    }

    public function render()
    {
        return view('livewire.pengembalian-dokumen.pengembalian-dokumen-livewire', [
            'dokumen' => $this->indexDokumen(),
            'roya' => $this->getRoyaDebitur()
        ]);
    }
}
