<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ShowHakAksesLivewire extends Component
{
    public $id, $nama_role;
    public $akses = [];
    // public $permissionsArray = [];
    public $transaksiPermissions, $reportPermissions, $masterDataPermissions, $akunPermissions;

    public function mount($id)
    {
        $this->id = $id;

        $data = Role::findById($id);

        $this->nama_role = $data->name;

        $this->akses = $data->permissions()->pluck('name')->toArray();
    }

    public function render()
    {
        $this->transaksiPermissions = Permission::where('group', 'transaksi')->get();
        $this->reportPermissions = Permission::where('group', 'report')->get();
        $this->masterDataPermissions = Permission::where('group', 'master-data')->get();
        $this->akunPermissions = Permission::where('group', 'akun')->get();
        return view('livewire.hak-akses.show-hak-akses-livewire', []);
    }
}
