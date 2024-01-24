<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use Livewire\Component;

class PenerimaanDokumenLivewire extends Component
{

    public $search = '';
    public $debiturResult;
    public $dokumenResult;


    public function searchDokumenDebitur()
    {
        $this->validate([
            'search' => 'required'
        ], [
            'required' => ':attribute harus diisi!'
        ], [
            'search' => 'Kotak pencarian'
        ]);

        $debitur = Debitur::select('id', 'nama_debitur', 'no_debitur')
            ->where('nama_debitur', 'like', '%' . trim($this->search) . '%')
            ->orWhere('no_debitur', 'like', '%' . trim($this->search) . '%')
            ->first();

        $dokumen = Dokumen::where('debitur_id', $debitur->id)->get();

        // dd($debitur, $dokumen);
        $this->debiturResult = $debitur;
        $this->dokumenResult = $dokumen;

        // $this->resetInput();
        // return $debitur;
    }

    public function resetInput()
    {
        $this->search = '';
        // $this->debiturResult = '';
        // $this->dokumenResult = '';
    }

    public function render()
    {
        return view('livewire.penerimaan-dokumen.penerimaan-dokumen-livewire');
    }
}
