<?php

namespace App\Livewire;

use Livewire\Component;

class CreateSuratRoyaLivewire extends Component
{
    public $no_surat_depan, $no_surat, $tanggal_pelunasan, $kota_bpn, $lokasi_kepala_bpn, $no_agunan;
    public $kelurahan, $kecamatan, $no_surat_ukur, $nib, $luas, $pemilik, $peringkat_sht, $no_sht;
    public $tanggal_sht;

    public function rules()
    {
        return [
            'no_surat_depan' => 'required|integer',
            'tanggal_pelunasan' => 'required|date',
            'kota_bpn' => 'required',
            'lokasi_kepala_bpn' => 'required',
            'no_agunan' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'no_surat_ukur' => 'required',
            'nib' => 'required',
            'luas' => 'required|integer',
            'pemilik' => 'required',
            'peringkat_sht' => 'required',
            'no_sht' => 'required',
            'tanggal_sht' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'integer' => ':attribute harus berupa numerik!',
            'date' => ':attribute harus berupa tanggal!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'no_surat_depan' => 'Nomor surat',
            'tanggal_pelunasan' => 'Tanggal pelunasan',
            'kota_bpn' => 'Kota BPN',
            'lokasi_kepala_bpn' => 'Lokasi Kepala BPN',
            'no_agunan' => 'Nomor Agunan',
            'kelurahan' => 'Kelurahan bangunan',
            'kecamatan' => 'Kecamatan bangunan',
            'no_surat_ukur' => 'Nomor Surat Ukur',
            'nib' => 'NIB',
            'luas' => 'Luas bangunan',
            'pemilik' => 'Pemilik bangunan',
            'peringkat_sht' => 'Peringkat SHT',
            'no_sht' => 'Nomor SHT',
            'tanggal_sht' => 'Tanggal SHT'
        ];
    }

    public function storeSuratRoya()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.surat-roya.create-surat-roya-livewire');
    }
}
