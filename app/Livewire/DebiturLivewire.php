<?php

namespace App\Livewire;

use App\Models\Debitur;
use Livewire\Component;
use Livewire\WithPagination;

class DebiturLivewire extends Component
{
    use WithPagination;

    public $no_debitur, $nama_debitur;

    public $search = '';

    public $sortBy = 'no_debitur';
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

    public function indexDebitur()
    {
        $debitur = Debitur::select('id', 'no_debitur', 'nama_debitur')
            ->where('nama_debitur', 'like', '%' . trim($this->search) . '%')
            ->orWhere('no_debitur', 'like', '%' . trim($this->search) . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return $debitur;
    }

    public function render()
    {
        return view('livewire.debitur.debitur-livewire', [
            'debitur' => $this->indexDebitur()
        ]);
    }
}
