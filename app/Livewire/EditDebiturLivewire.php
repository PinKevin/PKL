<?php

namespace App\Livewire;

use App\Models\Debitur;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditDebiturLivewire extends Component
{
    public $id, $no_debitur, $nama_debitur, $alamat, $tanggal_realisasi, $jenis_kredit, $kode_developer;
    public $proyek_perumahan, $kode_notaris, $plafon_kredit, $saldo_pokok, $blok, $no, $luas_tanah, $luas_bangunan;

    public function rules()
    {
        return [
            'nama_debitur' => 'required|min:5|string',
            'tanggal_realisasi' => 'required|date',
            'jenis_kredit' => 'required',
            'kode_developer' => 'required',
            'proyek_perumahan' => 'required',
            'kode_notaris' => 'required',
            'plafon_kredit' => 'required|numeric',
            'saldo_pokok' => 'required|numeric',
            'blok' => 'required',
            'no' => 'required|numeric',
            'luas_tanah' => 'required|numeric',
            'luas_bangunan' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus berupa numerik!',
            'digits' => ':attribute harus terdiri atas :digits digit!',
            'unique' => ':attribute sudah ada di dalam database!',
            'min' => ':attribute minimal terdiri atas :min karakter!',
            'string' => ':attribute hanya terdiri atas huruf!',
            'date' => ':attribute harus berupa tanggal!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'nama_debitur' => 'Nama debitur',
            'tanggal_realisasi' => 'Tanggal realisasi',
            'jenis_kredit' => 'Jenis kredit',
            'kode_developer' => 'Developer',
            'proyek_perumahan' => 'Proyek perumahan',
            'kode_notaris' => 'Notaris',
            'plafon_kredit' => 'Plafon kredit',
            'saldo_pokok' => 'Saldo pokok',
            'blok' => 'Blok rumah',
            'no' => 'Nomor rumah',
            'luas_tanah' => 'Luas tanah',
            'luas_bangunan' => 'Luas bangunan'
        ];
    }

    public function mount($id)
    {
        $this->id = $id;

        $data = Debitur::findOrFail($id);

        $this->no_debitur = $data->no_debitur;
        $this->nama_debitur = $data->nama_debitur;
        $this->tanggal_realisasi = $data->tanggal_realisasi;
        $this->jenis_kredit = $data->jenis_kredit;
        $this->kode_developer = $data->kode_developer;
        $this->proyek_perumahan = $data->proyek_perumahan;
        $this->kode_notaris = $data->kode_notaris;
        $this->plafon_kredit = $data->plafon_kredit;
        $this->saldo_pokok = $data->saldo_pokok;
        $this->blok = $data->blok;
        $this->no = $data->no;
        $this->luas_tanah = $data->luas_tanah;
        $this->luas_bangunan = $data->luas_bangunan;
    }

    public function updateDebitur()
    {
        $this->validate();

        DB::transaction(function () {
            Debitur::where('id', $this->id)->update([
                'nama_debitur' => $this->nama_debitur,
                'tanggal_realisasi' => $this->tanggal_realisasi,
                'jenis_kredit' => $this->jenis_kredit,
                'kode_developer' => $this->kode_developer,
                'proyek_perumahan' => $this->proyek_perumahan,
                'kode_notaris' => $this->kode_notaris,
                'plafon_kredit' => $this->plafon_kredit,
                'saldo_pokok' => $this->saldo_pokok,
                'blok' => $this->blok,
                'no' => $this->no,
                'luas_tanah' => $this->luas_tanah,
                'luas_bangunan' => $this->luas_bangunan
            ]);
        });

        session()->flash('updateSuccess', 'Debitur berhasil diubah!');
        return redirect()->route('debitur.index');
    }

    public function render()
    {
        return view('livewire.debitur.edit-debitur-livewire');
    }
}
