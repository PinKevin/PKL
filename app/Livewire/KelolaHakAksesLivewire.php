<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class KelolaHakAksesLivewire extends Component
{
    use WithPagination;

    public $id, $name;

    public function getAllRoles()
    {
        $roles = Role::paginate(10);
        return $roles;
    }

    public function deleteRole($id)
    {
        $role = Role::findById($id);

        $this->id = $role->id;
        $this->name = $role->name;
    }

    public function destroyRole()
    {
        Role::where('id', $this->id)->delete([]);

        session()->flash('deleteSuccess', 'Role berhasil dihapus');
        $this->dispatch('scrollToTop');
    }

    public function resetInput()
    {
        $this->id = '';
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.hak-akses.kelola-hak-akses-livewire', [
            'roles' => $this->getAllRoles()
        ]);
    }
}
