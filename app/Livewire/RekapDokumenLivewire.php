<?php

namespace App\Livewire;

use App\Models\Dokumen;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class RekapDokumenLivewire extends Component
{
    use WithPagination;

    // public $allDokumen;

    // public function mount()
    // {
    //     $this->getAllDokumen();
    // // }

    public function getAllDokumen()
    {
        $dokumen = Dokumen::get()->groupBy('debitur_id')->all();
        return $dokumen;
    }

    // public function getAllDokumen()
    // {
    //     $dokumen = Dokumen::paginate(10);
    //     return $dokumen;
    // }

    public function render()
    {
        return view('livewire.rekap-dokumen.rekap-dokumen-livewire', [
            'allDokumen' => $this->getAllDokumen()
        ]);
    }
}
