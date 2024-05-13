<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class KelolaIzinLivewire extends Component
{
    use WithPagination;

    public $id, $name, $group;

    public $search = '';

    public $sortBy = 'name';

    public $sortDirection = 'asc';

    public function rules()
    {
        return [
            'name' => 'required|unique:permissions,name',
            'group' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => 'Nama izin',
            'group' => 'Grup izin'
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

    public function getAllPermissions()
    {
        $permissions = Permission::select('id', 'name', 'group')
            ->where('name', 'like', '%' . trim($this->search) . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return $permissions;
    }

    public function createPermission()
    {
        $this->validate();

        Permission::create([
            'name' => $this->name,
            'group' => $this->group
        ]);

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Izin berhasil dibuat!');
    }

    public function editPermission($id)
    {
        $permission = Permission::findById($id);

        $this->id = $permission->id;
        $this->name = $permission->name;
        $this->group = $permission->group;
    }

    public function updatePermission()
    {
        $this->validateOnly('group');

        DB::transaction(function () {
            Permission::where('id', $this->id)->update([
                'group' => $this->group
            ]);
            app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        });

        $this->resetInput();
        $this->dispatch('closeEditModal');
        session()->flash('updateSuccess', 'Izin berhasil diubah!');
    }

    public function deletePermission($id)
    {
        $permission = Permission::findById($id);

        $this->id = $permission->id;
        $this->name = $permission->name;
    }

    public function destroyPermission()
    {
        DB::transaction(function () {
            Permission::where('name', $this->name)->delete();
            app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        });

        $this->resetInput();
        $this->dispatch('scrollToTop');
        session()->flash('deleteSuccess', 'Izin berhasil dihapus!');
    }

    public function resetInput()
    {
        $this->reset(['name']);
    }

    public function render()
    {
        return view('livewire.izin.kelola-izin-livewire', [
            'permissions' => $this->getAllPermissions()
        ]);
    }
}
