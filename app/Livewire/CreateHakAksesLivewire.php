<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateHakAksesLivewire extends Component
{
    public $nama_role;
    public $akses = [];

    public function rules()
    {
        return [
            'nama_role' => 'required|unique:roles,name',
            'akses' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'unique' => ':attribute harus unik!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'nama_role' => 'Nama Role',
            'akses' => 'Akses'
        ];
    }

    public function getAllTransaksiPermissions()
    {
        $permissions = Permission::where('group', 'transaksi')->get();
        return $permissions;
    }

    public function getAllReportPermissions()
    {
        $permissions = Permission::where('group', 'report')->get();
        return $permissions;
    }

    public function getAllMasterDataPermissions()
    {
        $permissions = Permission::where('group', 'master-data')->get();
        return $permissions;
    }

    public function getAllAkunPermissions()
    {
        $permissions = Permission::where('group', 'akun')->get();
        return $permissions;
    }

    public function createRole()
    {
        $this->validate();

        $role = Role::create([
            'name' => $this->nama_role
        ]);

        $role->syncPermissions($this->akses);

        session()->flash('storeSuccess', 'Role berhasil ditambahkan');
        return redirect()->route('hak-akses.index');
    }

    public function render()
    {
        return view('livewire.hak-akses.create-hak-akses-livewire', [
            'transaksiPermissions' => $this->getAllTransaksiPermissions(),
            'reportPermissions' => $this->getAllReportPermissions(),
            'masterDataPermissions' => $this->getAllMasterDataPermissions(),
            'akunPermissions' => $this->getAllAkunPermissions(),
        ]);
    }
}
