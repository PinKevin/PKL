<?php

namespace App\Livewire;

use App\Models\Regency;
use Livewire\Component;
use Livewire\WithPagination;

class CityLivewire extends Component
{
    use WithPagination;

    public $code, $name;

    public $search = '';

    public $sortBy = 'id';

    public $sortDirection = 'asc';

    public function rules()
    {
        return [
            'code' => 'required|digits:4|numeric|unique:regencies,id|regex:/^33\d{2}$/',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus berupa angka!',
            'code.unique' => 'Kode kota telah digunakan!',
            'code.regex' => 'Kode harus diawali "33"!',
            'digits' => ':attribute harus memiliki :digits karakter'
        ];
    }

    public function validationAttributes()
    {
        return [
            'code' => 'Kode kota',
            'name' => 'Nama kota'
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

    public function indexRegencies()
    {
        $regencies = Regency::where('province_id', 33)
            ->where(function ($query) {
                $query->where('id', 'like', '%' . trim($this->search) . '%')
                    ->orWhere('name', 'like', '%' . trim($this->search) . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return $regencies;
    }

    public function storeRegency()
    {
        $this->validate();

        Regency::create([
            'id' => $this->code,
            'province_id' => 33,
            'name' => strtoupper($this->name)
        ]);

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Kota berhasil dibuat!');
    }

    public function showRegency($id)
    {
        $this->resetInput();
        $regency = Regency::where('id', $id)->first();

        $this->code = $regency->id;
        $this->name = $regency->name;
    }

    public function editRegency($id)
    {
        $this->resetInput();
        $regency = Regency::where('id', $id)->first();

        $this->code = $regency->id;
        $this->name = $regency->name;
    }

    public function updateRegency()
    {
        $this->validateOnly('name');

        Regency::where('id', $this->code)->update([
            'name' => strtoupper($this->name)
        ]);

        $this->resetInput();
        $this->dispatch('closeEditModal');
        session()->flash('updateSuccess', 'Kota berhasil diubah!');
    }

    public function deleteRegency($id)
    {
        $this->resetInput();
        $regency = Regency::where('id', $id)->first();

        $this->code = $regency->id;
        $this->name = $regency->name;
    }

    public function destroyRegency()
    {
        Regency::where('id', $this->code)->delete();

        $this->resetInput();
        $this->dispatch('scrollToTop');
        session()->flash('deleteSuccess', 'Kota berhasil dihapus!');
    }

    public function resetInput()
    {
        $this->code = '';
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.city.city-livewire', [
            'regencies' => $this->indexRegencies()
        ]);
    }
}
