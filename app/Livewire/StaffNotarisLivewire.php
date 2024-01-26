<?php

namespace App\Livewire;

use App\Models\Notaris;
use App\Models\StaffNotaris;
use Livewire\Component;
use Livewire\WithPagination;

class StaffNotarisLivewire extends Component
{
    use WithPagination;

    public $id, $notaris_id, $nama;

    public $search = '';

    public $sortBy = 'notaris.nama_notaris';

    public $sortDirection = 'asc';

    public function rules()
    {
        return [
            'notaris_id' => 'required',
            'nama' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'string' => ':attribute harus berupa huruf!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'notaris_id' => 'Nama notaris',
            'nama' => 'Nama'
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

    public function indexStaffNotaris()
    {
        $staff = StaffNotaris::select(
            'staff_notaris.id',
            'staff_notaris.notaris_id',
            'staff_notaris.nama AS nama_staff',
            'notaris.nama_notaris AS nama_notaris'
        )
            ->join('notaris', 'staff_notaris.notaris_id', '=', 'notaris.id')
            ->where('staff_notaris.nama', 'like', '%' . trim($this->search) . '%')
            ->orWhere('notaris.nama_notaris', 'like', '%' . trim($this->search) . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return $staff;
    }

    public function getAllNotaris()
    {
        $notaris = Notaris::all();
        return $notaris;
    }

    public function storeStaffNotaris()
    {
        $this->validate();

        StaffNotaris::create([
            'nama' => $this->nama,
            'notaris_id' => $this->notaris_id,
        ]);

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Staff notaris berhasil dibuat!');
    }

    public function showStaffNotaris($id)
    {
        $this->resetInput();

        $staff = StaffNotaris::select(
            'staff_notaris.id',
            'staff_notaris.nama AS nama_staff',
            'notaris.nama_notaris AS nama_notaris'
        )
            ->join('notaris', 'staff_notaris.notaris_id', '=', 'notaris.id')
            ->where('staff_notaris.id', $id)
            ->first();

        $this->notaris_id = $staff->nama_notaris;
        $this->nama = $staff->nama_staff;
    }

    public function editStaffNotaris($id)
    {
        $this->resetInput();

        $staff = StaffNotaris::where('staff_notaris.id', $id)
            ->first();

        $this->id = $staff->id;
        $this->notaris_id = $staff->notaris_id;
        $this->nama = $staff->nama;
    }

    public function updateStaffNotaris()
    {
        $this->validate();

        StaffNotaris::where('id', $this->id)
            ->update([
                'notaris_id' => $this->notaris_id,
                'nama' => $this->nama,
            ]);

        $this->resetInput();
        $this->dispatch('closeEditModal');
        session()->flash('updateSuccess', 'Staff notaris berhasil diubah!');
    }

    public function deleteStaffNotaris($id)
    {
        $this->resetInput();
        $staff = StaffNotaris::findOrFail($id);

        $this->id = $staff->id;
        $this->nama = $staff->nama;
    }

    public function destroyStaffNotaris()
    {
        StaffNotaris::where('id', $this->id)->delete();

        $this->resetInput();
        $this->dispatch('scrollToTop');
        session()->flash('deleteSuccess', 'Staff notaris berhasil dihapus!');
    }

    public function resetInput()
    {
        $this->id = '';
        $this->notaris_id = '';
        $this->nama = '';
    }

    public function render()
    {
        return view('livewire.staff-notaris.staff-notaris-livewire', [
            'staff' => $this->indexStaffNotaris(),
            'notaris' => $this->getAllNotaris()
        ]);
    }
}
