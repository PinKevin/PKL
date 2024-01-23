<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Notaris;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateDebiturLivewire extends Component
{
    public $no_debitur, $nama_debitur, $alamat, $tanggal_realisasi, $jenis_kredit, $kode_developer;
    public $proyek_perumahan, $kode_notaris, $plafon_kredit, $saldo_pokok, $blok, $no, $luas_tanah, $luas_bangunan;

    public $notarisList;

    public function rules()
    {
        return [
            'no_debitur' => 'required|numeric|digits:13|unique:debiturs,no_debitur',
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
            'no_debitur' => 'Nomor debitur',
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

    public function getAllNotaris()
    {
        $this->notarisList = Notaris::select('kode_notaris', 'nama_notaris')->get();
    }

    public function storeDebitur()
    {
        $this->validate();

        DB::transaction(function () {
            Debitur::create([
                'no_debitur' => $this->no_debitur,
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

        session()->flash('storeSuccess', 'Debitur berhasil ditambahkan');
        return redirect()->route('debitur.index');
    }

    public function render()
    {
        return view('livewire.debitur.create-debitur-livewire', [
            'notarisList' => $this->getAllNotaris()
        ]);
    }
}
