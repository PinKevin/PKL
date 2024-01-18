<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SuratRoya;
use App\Http\Controllers\DataConverterController;

class EditSuratRoyaLivewire extends Component
{
    public $id, $no_surat_depan, $no_surat, $tanggal_pelunasan, $kota_bpn, $lokasi_kepala_bpn, $no_agunan;
    public $kelurahan, $kecamatan, $no_surat_ukur, $nib, $luas, $pemilik, $peringkat_sht, $no_sht;
    public $tanggal_sht;

    public function rules()
    {
        return [
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

    public function mount($id)
    {
        $this->id = $id;

        $data = SuratRoya::findOrFail($id);

        $this->no_surat = $data->no_surat;
        $this->tanggal_pelunasan = $data->tanggal_pelunasan->format('Y-m-d');
        $this->kota_bpn = $data->kota_bpn;
        $this->lokasi_kepala_bpn = $data->lokasi_kepala_bpn;
        $this->no_agunan = $data->no_agunan;
        $this->kelurahan = $data->kelurahan;
        $this->kecamatan = $data->kecamatan;
        $this->no_surat_ukur = $data->no_surat_ukur;
        $this->nib = $data->nib;
        $this->luas = $data->luas;
        $this->pemilik = $data->pemilik;
        $this->peringkat_sht = $data->peringkat_sht;
        $this->no_sht = $data->no_sht;
        $this->tanggal_sht = $data->tanggal_sht->format('Y-m-d');
    }

    public function updateSuratRoya()
    {
        $this->validate();

        SuratRoya::where('id', $this->id)->update([
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

        session()->flash('updateSuccess', 'Surat roya berhasil diubah');
        return redirect()->route('surat-roya.index');
    }

    public function render()
    {
        return view('livewire.surat-roya.edit-surat-roya-livewire');
    }
}
