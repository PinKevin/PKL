<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class KelolaAkunLivewire extends Component
{
    use WithPagination;

    public $id, $nama, $nip, $username, $password, $role;

    public $search = '';

    public $sortBy = 'nama';
    public $sortDirection = 'asc';

    public function rules()
    {
        return [
            'nama' => 'required',
            'nip' => 'required|unique:users,nip',

        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'nip.unique' => 'NIP sudah ada!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'nama' =>  'Nama',
            'nip' => 'NIP',
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

    public function indexUsers()
    {
        $users = User::select('id', 'nama', 'nip', 'username')
            ->where('nama', 'like', '%' . trim($this->search) . '%')
            ->orWhere('nip', 'like', '%' . trim($this->search) . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return $users;
    }

    public function resetInput()
    {
        $this->id = '';
        $this->nama = '';
        $this->nip = '';
        $this->username = '';
        $this->password = '';
        $this->role = '';
    }

    public function render()
    {
        return view('livewire.akun.kelola-akun-livewire', [
            'users' => $this->indexUsers()
        ]);
    }
}
