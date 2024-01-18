<?php

namespace App\Livewire;

use App\Http\Controllers\DataConverterController;
use App\Models\SuratRoya;
use Livewire\Component;

class CreateSuratRoyaLivewire extends Component
{
    public $no_surat_depan, $no_surat, $tanggal_pelunasan, $kota_bpn, $lokasi_kepala_bpn, $no_agunan;
    public $kelurahan, $kecamatan, $no_surat_ukur, $nib, $luas, $pemilik, $peringkat_sht, $no_sht;
    public $tanggal_sht;

    public function rules()
    {
        return [
            // 'no_surat_depan' => 'required|integer|unique:surat_royas,no_surat_depan',
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
            'date' => ':attribute harus berupa tanggal!',
            'unique' => ':attribute sudah ada di dalam database!'
        ];
    }

    public function validationAttributes()
    {
        return [
            // 'no_surat_depan' => 'Nomor surat',
            'tanggal_pelunasan' => 'Tanggal pelunasan',
            'kota_bpn' => 'Kota BPN',
            'lokasi_kepala_bpn' => 'Lokasi Kepala BPN',
            'no_agunan' => 'Nomor agunan',
            'kelurahan' => 'Kelurahan bangunan',
            'kecamatan' => 'Kecamatan bangunan',
            'no_surat_ukur' => 'Nomor surat ukur',
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

        $bulan = DataConverterController::bulanToRomawi(date('m'));
        $tahun = date('Y');

        $noDepan = SuratRoya::whereYear('created_at', $tahun)->max('no_surat_depan');
        $noDepan = $noDepan ? $noDepan + 1 : 1;

        $noSurat = "$noDepan/SMG/LD/$bulan/$tahun";

        SuratRoya::create([
            'no_surat_depan' => $noDepan,
            'no_surat' => $noSurat,
            'tanggal_pelunasan' => $this->tanggal_pelunasan,
            'kota_bpn' => $this->kota_bpn,
            'lokasi_kepala_bpn' => $this->lokasi_kepala_bpn,
            'no_agunan' => $this->no_agunan,
            'kelurahan' => $this->kelurahan,
            'kecamatan' => $this->kecamatan,
            'no_surat_ukur' => $this->no_surat_ukur,
            'nib' => $this->nib,
            'luas' => $this->luas,
            'pemilik' => $this->pemilik,
            'peringkat_sht' => $this->peringkat_sht,
            'no_sht' => $this->no_sht,
            'tanggal_sht' => $this->tanggal_sht
        ]);

        session()->flash('storeSuccess', 'Surat roya berhasil ditambahkan');
        return redirect()->route('surat-roya.index');
    }

    public function render()
    {
        return view('livewire.surat-roya.create-surat-roya-livewire');
    }
}
