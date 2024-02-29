<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $username, $password;

    public function rules()
    {
        return [
            'username' => 'required|min:5',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'min' => ':attribute harus terdiri atas :min karakter!',
        ];
    }

    public function validationAttributes()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    public function authenticate()
    {
        $this->validate();

        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session()->regenerate();
            $redirectPath = '';

            if ($user->role == 1) {
                $redirectPath = route('admin-dashboard');
            } elseif ($user->role == 2) {
                $redirectPath = route('dashboard');
            }
            return redirect()->intended($redirectPath);
        } else {
            session()->flash('loginError', 'Login gagal!');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
