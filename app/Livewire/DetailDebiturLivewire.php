<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Developer;
use App\Models\Dokumen;
use App\Models\Notaris;
use Livewire\Component;

class DetailDebiturLivewire extends Component
{
    public $id, $no_debitur, $nama_debitur, $alamat_ktp, $tanggal_realisasi, $jenis_kredit, $nama_developer;
    public $proyek_perumahan, $nama_notaris, $plafon_kredit, $saldo_pokok, $alamat_agunan, $blok, $no, $luas_tanah, $luas_bangunan;

    public function mount($id)
    {
        $this->id = $id;

        $data = Debitur::findOrFail($id);
        $notaris = Notaris::where('kode_notaris', $data->kode_notaris)
            ->select('nama_notaris')
            ->first();
        $developer = Developer::where('kode_developer', $data->kode_developer)
            ->select('nama_developer')
            ->first();

        $this->no_debitur = $data->no_debitur;
        $this->nama_debitur = $data->nama_debitur;
        $this->alamat_ktp = $data->alamat_ktp;
        $this->tanggal_realisasi = $data->tanggal_realisasi;
        $this->jenis_kredit = $data->jenis_kredit;
        $this->nama_developer = $developer->nama_developer;
        $this->proyek_perumahan = $data->proyek_perumahan;
        $this->nama_notaris = $notaris->nama_notaris;
        $this->plafon_kredit = $data->plafon_kredit;
        $this->saldo_pokok = $data->saldo_pokok;
        $this->alamat_agunan = $data->alamat_agunan;
        $this->blok = $data->blok;
        $this->no = $data->no;
        $this->luas_tanah = $data->luas_tanah;
        $this->luas_bangunan = $data->luas_bangunan;
    }

    public function dokumenDebitur()
    {
        $data = Dokumen::where('debitur_id', $this->id)->get();
        return $data;
    }

    public function render()
    {
        return view('livewire.debitur.detail-debitur-livewire', [
            'dokumen' => $this->dokumenDebitur()
        ]);
    }
}
