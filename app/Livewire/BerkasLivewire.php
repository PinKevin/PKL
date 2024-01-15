<?php

namespace App\Livewire;

use App\Models\Berkas;
use Livewire\Component;
use Livewire\WithPagination;

class BerkasLivewire extends Component
{
    use WithPagination;

    public $nama, $no_rekening;

    public function indexBerkas()
    {
        $berkas = Berkas::select('nama', 'no_rekening')->paginate(10);
        return $berkas;
    }

    public function resetInput()
    {
        $this->nama = '';
        $this->no_rekening = '';
    }

    public function render()
    {
        return view('livewire.berkas.berkas-livewire', [
            'berkas' => $this->indexBerkas()
        ]);
    }
}
