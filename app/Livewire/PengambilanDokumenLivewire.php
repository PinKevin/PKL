<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use Livewire\Component;
use App\Models\SuratRoya;

class PengambilanDokumenLivewire extends Component
{

    public $debitur, $no_debitur;
    public $nama_debitur, $nama_developer;
    public $checkedDokumen = [];

    public function mount()
    {
        $this->debitur();
    }

    public function debitur()
    {
        $this->debitur = Debitur::where('no_debitur', $this->no_debitur)
            ->first();

        $this->nama_debitur = $this->debitur->nama_debitur;
        $this->no_debitur = $this->debitur->no_debitur;
        $this->nama_developer = $this->debitur->developer->nama_developer;
    }

    public function indexDokumen()
    {
        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)
            ->get();
        return $dokumen;
    }

    public function getRoyaDebitur()
    {
        $roya = SuratRoya::where('debitur_id', $this->debitur->id)->first();
        return $roya;
    }

    public function render()
    {
        return view('livewire.pengambilan-dokumen.pengambilan-dokumen-livewire', [
            'dokumen' => $this->indexDokumen(),
            'roya' => $this->getRoyaDebitur()
        ]);
    }
}
