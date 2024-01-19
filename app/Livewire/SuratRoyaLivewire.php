<?php

namespace App\Livewire;

use App\Models\SuratRoya;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class SuratRoyaLivewire extends Component
{
    use WithPagination;

    public $id, $pemilik;

    public $search = '';

    public $sortBy = 'pemilik';
    public $sortDirection = 'asc';

    public function sortResult($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function indexSuratRoya()
    {
        $suratRoya = SuratRoya::select('id', 'pemilik', 'no_surat', 'created_at')
            ->where('pemilik', 'like', '%' . trim($this->search) . '%')
            ->orWhere('no_surat', 'like', '%' . trim($this->search) . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return $suratRoya;
    }

    public function deleteSuratRoya($id)
    {
        $this->resetInput();
        $detailBerkas = SuratRoya::where('id', $id)
            ->select('id', 'pemilik')
            ->first();

        $this->id = $detailBerkas->id;
        $this->pemilik = $detailBerkas->pemilik;
    }

    public function destroySuratRoya()
    {
        SuratRoya::where('id', $this->id)->delete();
        $this->resetInput();
        $this->dispatch('scrollToTop');
        session()->flash('deleteSuccess', 'Surat roya berhasil dihapus!');
    }

    public function resetInput()
    {
        $this->id = '';
        $this->pemilik = '';
    }

    public function render()
    {
        return view('livewire.surat-roya.surat-roya-livewire', [
            'suratRoya' => $this->indexSuratRoya()
        ]);
    }
}
