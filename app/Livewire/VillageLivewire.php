<?php

namespace App\Livewire;

use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Livewire\Component;
use Livewire\WithPagination;

class VillageLivewire extends Component
{
    use WithPagination;

    public $code, $name, $district_id, $regency_id, $regency_name, $district_name;
    public $districtList = [];

    public $search = '';

    public $sortBy = 'id';

    public $sortDirection = 'asc';

    public function rules()
    {
        return [
            'code' => 'required|digits:10|numeric|unique:villages,id|regex:/^33\d{8}$/',
            'district_id' => 'required',
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
            'code' => 'Kode kecamatan',
            'district_id' => 'Kota',
            'name' => 'Nama kecamatan'
        ];
    }

    // public function mount()
    // {
    //     $this->updatedRegencyId();
    // }

    public function sortResult($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function indexVillages()
    {
        $villages = Village::whereHas('district.regency', function ($query) {
            $query->where('province_id', 33);
        })
            ->where(function ($query) {
                $query->where('id', 'like', '%' . trim($this->search) . '%')
                    ->orWhere('name', 'like', '%' . trim($this->search) . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return $villages;
    }

    public function updatedRegencyId()
    {
        $this->district_id = '';
        $this->districtList = District::where('regency_id', $this->regency_id)->get();
    }

    public function storeVillage()
    {
        $this->validate();

        Village::create([
            'id' => $this->code,
            'district_id' => $this->district_id,
            'name' => strtoupper($this->name)
        ]);

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Kelurahan berhasil dibuat!');
    }

    public function showVillage($id)
    {
        $this->resetInput();
        $village = Village::where('id', $id)->first();

        $this->code = $village->id;
        $this->name = $village->name;
        $this->district_name = $village->district->name;
        $this->regency_name = $village->district->regency->name;
    }

    public function editVillage($id)
    {
        $this->resetInput();
        $village = Village::where('id', $id)->first();

        $this->code = $village->id;
        $this->name = $village->name;
        $this->district_id = $village->district_id;
        $this->regency_id = $village->district->regency->id;

        $this->districtList = District::where('regency_id', $this->regency_id)->get();
    }

    public function updateVillage()
    {
        $this->validateOnly('regency_id');
        $this->validateOnly('district_id');
        $this->validateOnly('name');

        Village::where('id', $this->code)->update([
            'district_id' => $this->district_id,
            'name' => strtoupper($this->name)
        ]);

        $this->resetInput();
        $this->dispatch('closeEditModal');
        session()->flash('updateSuccess', 'Kelurahan berhasil diubah!');
    }

    public function deleteVillage($id)
    {
        $this->resetInput();
        $village = Village::where('id', $id)->first();

        $this->code = $village->id;
        $this->name = $village->name;
    }

    public function destroyVillage()
    {
        Village::where('id', $this->code)->delete();

        $this->resetInput();
        $this->dispatch('scrollToTop');
        session()->flash('deleteSuccess', 'Kelurahan berhasil dihapus!');
    }

    public function resetInput()
    {
        $this->code = '';
        $this->district_id = '';
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.village.village-livewire', [
            'villages' => $this->indexVillages(),
            'regencies' => Regency::where('province_id', 33)->get()
        ]);
    }
}
