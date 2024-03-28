<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;

class CreateHakAksesLivewire extends Component
{
    public $nama_role;
    public $akses = [];

    public function rules()
    {
        return [
            'nama_role' => 'required|unique:roles,nama',
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


    public function createRole()
    {
        $this->validate();

        // $role = Role::create([
        //     'nama' => $this->nama_role,
        // ]);

        session()->flash('message', 'Role berhasil ditambahkan!');

        $this->reset(['nama_role', 'akses']);
    }

    public function render()
    {
        return view('livewire.hak-akses.create-hak-akses-livewire');
    }
}
