<?php

namespace App\Livewire;

use Livewire\Component;

class SuratRoyaLivewire extends Component
{
    public $nama, $no_hp;

    public function rules()
    {
        return [
            'nama' => 'required',
            'no_hp' => 'required'
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
            'nama' =>  'Nama',
            'no_hp' => 'Nomor HP',
        ];
    }

    public function generateSuratRoya()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.surat-roya.surat-roya-livewire');
    }
}
