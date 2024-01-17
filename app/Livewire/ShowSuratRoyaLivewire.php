<?php

namespace App\Livewire;

use App\Models\SuratRoya;
use Livewire\Component;

class ShowSuratRoyaLivewire extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    // public function showSuratRoya()
    // {
    //     $suratRoya = SuratRoya::findOrFail($this->id);
    //     $this->id = $suratRoya
    // }

    public function render()
    {
        return view('livewire.surat-roya.show-surat-roya-livewire', [
            'suratRoya' => SuratRoya::findOrFail($this->id)
        ]);
    }
}
