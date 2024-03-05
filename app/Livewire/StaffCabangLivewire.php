<?php

namespace App\Livewire;

use App\Models\StaffCabang;
use Livewire\Component;
use Livewire\WithPagination;

class StaffCabangLivewire extends Component
{
    use WithPagination;

    public $id, $nama, $nip, $kantor;

    public $search = '';

    public $sortBy = 'nip';

    public $sortDirection = 'asc';

    public function rules()
    {
        return [
            'nip' => 'required|numeric|unique:staff_cabangs,nip',
            'nama' => 'required|string',
            'kantor' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus berupa angka!',
            'string' => ':attribute harus berupa huruf!',
            'nip.unique' => 'NIP sudah ada di database!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'nip' => 'NIP',
            'nama' => 'Nama',
            'kantor' => 'Kantor'
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

    public function indexStaffCabang()
    {
        $staff = StaffCabang::where('nip', 'like', '%' . trim($this->search) . '%')
            ->orWhere('nama', 'like', '%' . trim($this->search) . '%')
            ->orWhere('kantor', 'like', '%' . trim($this->search) . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return $staff;
    }

    public function storeStaffCabang()
    {
        $this->validate();

        StaffCabang::create([
            'nama' => $this->nama,
            'nip' => $this->nip,
            'kantor' => $this->kantor,
        ]);

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Staff cabang berhasil dibuat!');
    }

    public function showStaffCabang($id)
    {
        $this->resetInput();

        $staff = StaffCabang::findOrFail($id);

        $this->nip = $staff->nip;
        $this->nama = $staff->nama;
        $this->kantor = $staff->kantor;
    }

    public function editStaffCabang($id)
    {
        $this->resetInput();

        $staff = StaffCabang::findOrFail($id);

        $this->id = $staff->id;
        $this->nip = $staff->nip;
        $this->nama = $staff->nama;
        $this->kantor = $staff->kantor;
    }

    public function updateStaffCabang()
    {
        $this->validate([
            'nama' => 'required|string',
            'kantor' => 'required|string',
        ]);

        StaffCabang::where('id', $this->id)
            ->update([
                'kantor' => $this->kantor,
                'nama' => $this->nama,
            ]);

        $this->resetInput();
        $this->dispatch('closeEditModal');
        session()->flash('updateSuccess', 'Staff cabang berhasil diubah!');
    }

    public function deleteStaffCabang($id)
    {
        $this->resetInput();
        $staff = StaffCabang::findOrFail($id);

        $this->id = $staff->id;
        $this->nama = $staff->nama;
    }

    public function destroyStaffCabang()
    {
        StaffCabang::where('id', $this->id)->delete();

        $this->resetInput();
        $this->dispatch('scrollToTop');
        session()->flash('deleteSuccess', 'Staff cabang berhasil dihapus!');
    }

    public function resetInput()
    {
        $this->id = '';
        $this->nip = '';
        $this->nama = '';
        $this->kantor = '';
    }

    public function render()
    {
        return view('livewire.staff-cabang.staff-cabang-livewire', [
            'staff' => $this->indexStaffCabang()
        ]);
    }
}
