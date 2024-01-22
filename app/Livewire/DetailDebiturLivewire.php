<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use Livewire\Component;

class DetailDebiturLivewire extends Component
{
    public $id, $nama_debitur, $no_debitur;

    public function mount($id)
    {
        $this->id = $id;

        $data = Debitur::findOrFail($id);

        $this->no_debitur = $data->no_debitur;
        $this->nama_debitur = $data->nama_debitur;
    }

    public function dokumenDebitur()
    {
        $data = Dokumen::where('debitur_id', $this->id)->get();
        return $data;
    }

    public function render()
    {
        return view('livewire.debitur.detail-debitur-livewire', [
            'dokumen' => $this->dokumenDebitur()
        ]);
    }
}
