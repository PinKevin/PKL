<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class KelolaHakAksesLivewire extends Component
{
    use WithPagination;

    public function getAllRoles()
    {
        $roles = Role::paginate(10);
        return $roles;
    }

    public function render()
    {
        return view('livewire.hak-akses.kelola-hak-akses-livewire', [
            'roles' => $this->getAllRoles()
        ]);
    }
}
