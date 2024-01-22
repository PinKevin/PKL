<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DebiturLivewire extends Component
{
    use WithPagination;

    public $id, $no_debitur, $nama_debitur;

    public $search = '';

    public $sortBy = 'no_debitur';
    public $sortDirection = 'asc';

    public function rules()
    {
        return [
            'no_debitur' => 'required|numeric|digits:13|unique:debiturs,no_debitur',
            'nama_debitur' => 'required|min:5|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus berupa numerik!',
            'digits' => ':attribute harus terdiri atas :digits digit!',
            'unique' => ':attribute sudah ada di dalam database!',
            'min' => ':attribute minimal terdiri atas :min karakter!',
            'string' => ':attribute hanya terdiri atas huruf!',
        ];
    }

    public function validationAttributes()
    {
        return [
            'no_debitur' => 'Nomor debitur',
            'nama_debitur' =>  'Nama debitur'
        ];
    }

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

    public function createDebitur()
    {
        $this->validate();

        DB::transaction(function () {
            Debitur::create([
                'no_debitur' => $this->no_debitur,
                'nama_debitur' => $this->nama_debitur,
            ]);
        });

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Debitur berhasil dibuat!');
    }

    public function editDebitur($id)
    {
        $this->resetInput();
        $debitur = Debitur::findOrFail($id);

        $this->id = $debitur->id;
        $this->no_debitur = $debitur->no_debitur;
        $this->nama_debitur = $debitur->nama_debitur;
    }

    public function updateDebitur()
    {
        $this->validateOnly('nama_debitur');

        DB::transaction(function () {
            Debitur::where('id', $this->id)->update([
                'nama_debitur' => $this->nama_debitur,
            ]);
        });

        $this->resetInput();
        $this->dispatch('closeEditModal');
        session()->flash('updateSuccess', 'Debitur berhasil diubah!');
    }

    public function deleteDebitur($id)
    {
        $this->resetInput();
        $debitur = Debitur::findOrFail($id);

        $this->id = $debitur->id;
        $this->nama_debitur = $debitur->nama_debitur;
    }

    public function destroyDebitur()
    {
        $countDokumen = Dokumen::where('debitur_id', $this->id)->count();

        if ($countDokumen > 0) {
            $this->resetInput();
            $this->dispatch('scrollToTop');
            session()->flash('deleteError', 'Terdapat dokumen yang terkait dengan data tersebut!');
        } else {
            DB::transaction(function () {
                Debitur::where('id', $this->id)->delete();
            });

            $this->resetInput();
            $this->dispatch('scrollToTop');
            session()->flash('deleteSuccess', 'Debitur berhasil dihapus!');
        }
    }

    public function resetInput()
    {
        $this->id = '';
        $this->no_debitur = '';
        $this->nama_debitur = '';
    }

    public function render()
    {
        return view('livewire.debitur.debitur-livewire', [
            'debitur' => $this->indexDebitur()
        ]);
    }
}
