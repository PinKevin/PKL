<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Berkas extends Component
{
    use WithPagination;

    public $nama, $no_rekening;

    public function resetInput()
    {
        $this->nama = '';
        $this->no_rekening = '';
    }

    public function render()
    {
        return view('livewire.berkas.berkas');
    }
}
