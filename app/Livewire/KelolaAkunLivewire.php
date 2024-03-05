<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KelolaAkunLivewire extends Component
{
    use WithPagination;

    public $id, $nama, $nip, $username, $password, $role, $roleShow;

    public $search = '';

    public $sortBy = 'nama';
    public $sortDirection = 'asc';

    public function rules()
    {
        return [
            'nama' => 'required',
            'nip' => 'required|numeric|unique:users,nip',
            'role' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus berupa angka!',
            'nip.unique' => 'NIP sudah ada!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'nama' =>  'Nama',
            'nip' => 'NIP',
            'role' => 'Role'
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
        $this->authorize('viewAny', User::class);

        $users = User::select('id', 'nama', 'nip', 'username')
            ->where('nama', 'like', '%' . trim($this->search) . '%')
            ->orWhere('nip', 'like', '%' . trim($this->search) . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return $users;
    }

    public function createUser()
    {
        $this->authorize('create', User::class);
        $this->validate();

        $username = strtolower(str_replace(' ', '.', $this->nama));

        DB::transaction(function () use ($username) {
            User::create([
                'nama' => $this->nama,
                'nip' => $this->nip,
                'username' => $username,
                'password' => Hash::make($username),
                'role' => $this->role
            ]);
        });

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Akun berhasil dibuat!');
    }

    public function showUser($id)
    {
        $this->authorize('view', User::class);
        $this->resetInput();
        $user = User::findOrFail($id);

        $this->id = $user->id;
        $this->nip = $user->nip;
        $this->nama = $user->nama;
        $this->username = $user->username;
        $this->roleShow = $user->role == '1' ? 'Admin' : 'User';
    }

    public function editUser($id)
    {
        $this->resetInput();
        $user = User::findOrFail($id);

        $this->id = $user->id;
        $this->nip = $user->nip;
        $this->nama = $user->nama;
        $this->role = $user->role;
    }

    public function updateUser()
    {
        $this->authorize('update', User::class);
        $this->validateOnly('nama');

        DB::transaction(function () {
            User::where('id', $this->id)->update([
                'nama' => $this->nama,
                'role' => $this->role
            ]);
        });

        $this->resetInput();
        $this->dispatch('closeEditModal');
        session()->flash('updateSuccess', 'Akun berhasil diubah!');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->nama == Auth::user()->nama) {
            $this->dispatch('scrollToTop');
            session()->flash('deleteError', 'Anda tidak bisa menghapus akun sendiri!');
            return;
        } else {
            $this->id = $user->id;
            $this->nama = $user->nama;
        }
    }

    public function destroyUser()
    {
        DB::transaction(function () {
            User::where('id', $this->id)->delete();
        });

        $this->resetInput();
        $this->dispatch('scrollToTop');
        session()->flash('deleteSuccess', 'Akun berhasil dihapus!');
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
