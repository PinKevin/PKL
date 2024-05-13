<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditHakAksesLivewire extends Component
{
    public $id, $nama_role;
    public $akses = [];
    public $transaksiPermissions, $reportPermissions, $masterDataPermissions, $akunPermissions;

    public function mount($id)
    {
        $this->id = $id;

        $data = Role::findById($id);

        $this->nama_role = $data->name;

        $this->akses = $data->permissions()->pluck('name')->toArray();
    }


    public function rules()
    {
        return [
            'akses' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
        ];
    }

    public function validationAttributes()
    {
        return [
            'akses' => 'Akses'
        ];
    }

    public function updateRole()
    {
        $this->validate();
        DB::transaction(function () {
            $role = Role::where('id', $this->id)->first();
            $role->syncPermissions($this->akses);
        });

        session()->flash('updateSuccess', 'Role berhasil diubah!');
        return redirect()->route('hak-akses.index');
    }

    public function render()
    {
        $this->transaksiPermissions = Permission::where('group', 'transaksi')->get();
        $this->reportPermissions = Permission::where('group', 'report')->get();
        $this->masterDataPermissions = Permission::where('group', 'master-data')->get();
        $this->akunPermissions = Permission::where('group', 'akun')->get();
        return view('livewire.hak-akses.edit-hak-akses-livewire', []);
    }
}
