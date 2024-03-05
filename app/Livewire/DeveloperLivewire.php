<?php

namespace App\Livewire;

use App\Models\Debitur;
use Livewire\Component;
use App\Models\Developer;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class DeveloperLivewire extends Component
{
    use WithPagination;

    public $id, $kode_developer, $nama_developer;

    public $search = '';

    public $sortBy = 'kode_developer';

    public $sortDirection = 'asc';

    public function rules()
    {
        return [
            'kode_developer' => 'required|numeric|unique:developers,kode_developer',
            'nama_developer' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus berupa angka!',
            'kode_developer.unique' => 'Kode developer telah digunakan!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'kode_developer' => 'Kode developer',
            'nama_developer' => 'Nama developer'
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

    public function indexDeveloper()
    {
        $developer = Developer::select('id', 'kode_developer', 'nama_developer')
            ->where('nama_developer', 'like', '%' . trim($this->search) . '%')
            ->orWhere('kode_developer', 'like', '%' . trim($this->search) . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return $developer;
    }

    public function createDeveloper()
    {
        $this->validate();

        DB::transaction(function () {
            Developer::create([
                'kode_developer' => $this->kode_developer,
                'nama_developer' => $this->nama_developer,
            ]);
        });

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Developer berhasil dibuat!');
    }

    public function editDeveloper($id)
    {
        $this->resetInput();
        $developer = Developer::findOrFail($id);

        $this->id = $developer->id;
        $this->kode_developer = $developer->kode_developer;
        $this->nama_developer = $developer->nama_developer;
    }

    public function showDeveloper($id)
    {
        $this->resetInput();
        $developer = Developer::findOrFail($id);

        $this->id = $developer->id;
        $this->kode_developer = $developer->kode_developer;
        $this->nama_developer = $developer->nama_developer;
    }

    public function updateDeveloper()
    {
        $this->validateOnly('nama_developer');

        DB::transaction(function () {
            Developer::where('id', $this->id)->update([
                'nama_developer' => $this->nama_developer,
            ]);
        });

        $this->resetInput();
        $this->dispatch('closeEditModal');
        session()->flash('updateSuccess', 'Developer berhasil diubah!');
    }

    public function deleteDeveloper($id)
    {
        $this->resetInput();
        $developer = Developer::findOrFail($id);

        $this->id = $developer->id;
        $this->nama_developer = $developer->nama_developer;
        $this->kode_developer = $developer->kode_developer;
    }

    public function destroyDeveloper()
    {
        $countDebitur = Debitur::where('kode_developer', $this->kode_developer)->count();

        if ($countDebitur > 0) {
            $this->resetInput();
            $this->dispatch('scrollToTop');
            session()->flash('deleteError', 'Terdapat debitur yang terkait dengan data tersebut!');
        } else {
            DB::transaction(function () {
                Developer::where('id', $this->id)->delete();
            });

            $this->resetInput();
            $this->dispatch('scrollToTop');
            session()->flash('deleteSuccess', 'Developer berhasil dihapus!');
        }
    }

    public function resetInput()
    {
        $this->id = '';
        $this->kode_developer = '';
        $this->nama_developer = '';
    }

    public function render()
    {
        return view('livewire.developer.developer-livewire', [
            'developer' => $this->indexDeveloper()
        ]);
    }
}
