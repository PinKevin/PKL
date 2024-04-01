<?php

namespace App\Livewire;

use App\Models\Regency;
use Livewire\Component;
use App\Models\District;
use App\Models\Village;
use Livewire\WithPagination;

class DistrictLivewire extends Component
{
    use WithPagination;

    public $code, $name, $regency_id, $regency_name;

    public $search = '';

    public $sortBy = 'id';

    public $sortDirection = 'asc';

    public function rules()
    {
        return [
            'code' => 'required|digits:7|numeric|unique:districts,id|regex:/^33\d{5}$/',
            'regency_id' => 'required',
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
            'regency_id' => 'Kota',
            'name' => 'Nama kecamatan'
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

    public function indexDistricts()
    {
        $districts = District::whereHas('regency', function ($query) {
            $query->where('province_id', 33);
        })
            ->where(function ($query) {
                $query->where('id', 'like', '%' . trim($this->search) . '%')
                    ->orWhere('name', 'like', '%' . trim($this->search) . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);


        return $districts;
    }

    public function storeDistrict()
    {
        $this->validate();

        District::create([
            'id' => $this->code,
            'regency_id' => $this->regency_id,
            'name' => strtoupper($this->name)
        ]);

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Kecamatan berhasil dibuat!');
    }

    public function showDistrict($id)
    {
        $this->resetInput();
        $district = District::where('id', $id)->first();

        $this->code = $district->id;
        $this->name = $district->name;
        $this->regency_name = $district->regency->name;
    }

    public function editDistrict($id)
    {
        $this->resetInput();
        $district = District::where('id', $id)->first();

        $this->code = $district->id;
        $this->name = $district->name;
        $this->regency_id = $district->regency_id;
    }

    public function updateDistrict()
    {
        $this->validateOnly('regency_id');
        $this->validateOnly('name');

        District::where('id', $this->code)->update([
            'regency_id' => $this->regency_id,
            'name' => strtoupper($this->name)
        ]);

        $this->resetInput();
        $this->dispatch('closeEditModal');
        session()->flash('updateSuccess', 'Kecamatan berhasil diubah!');
    }

    public function deleteDistrict($id)
    {
        $this->resetInput();
        $district = District::where('id', $id)->first();

        $countVillage = Village::where('district_id', $this->code)->count();
        if ($countVillage > 0 || $district->suratRoya()->exists()) {
            $this->resetInput();
            $this->dispatch('closeDeleteModal');
            session()->flash('deleteError', 'Terdapat kelurahan atau surat roya yang terkait dengan data tersebut!');
        }

        $this->code = $district->id;
        $this->name = $district->name;
    }

    public function destroyDistrict()
    {
        District::where('id', $this->code)->delete();

        $this->resetInput();
        $this->dispatch('scrollToTop');
        session()->flash('deleteSuccess', 'Kecamatan berhasil dihapus!');
    }

    public function resetInput()
    {
        $this->code = '';
        $this->regency_id = '';
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.district.district-livewire', [
            'districts' => $this->indexDistricts(),
            'regencies' => Regency::where('province_id', 33)->get()
        ]);
    }
}
