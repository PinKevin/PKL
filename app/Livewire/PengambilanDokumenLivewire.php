<?php

namespace App\Livewire;

use App\Models\BastPengambilan;
use App\Models\Debitur;
use App\Models\Developer;
use App\Models\Dokumen;
use App\Models\Pengambilan;
use Livewire\Component;
use App\Models\SuratRoya;
use Illuminate\Support\Facades\DB;

class PengambilanDokumenLivewire extends Component
{

    public $debitur, $no_debitur;
    public $nama_debitur, $nama_developer, $no_ktp, $alamat_ktp, $alamat_agunan, $no, $blok, $pengambil;
    public $tanggal_pelunasan, $nama_pengambil, $no_ktp_pengambil;
    public $checkedDokumen = [];

    public function rules()
    {
        return [
            'checkedDokumen' => 'required',
            'no_debitur' => 'required|numeric|digits:13',
            'nama_debitur' => 'required|string',
            'no_ktp' => 'required|numeric|digits:16',
            'alamat_ktp' => 'required',
            'alamat_agunan' => 'required',
            'no' => 'required',
            'blok' => 'required',
            'tanggal_pelunasan' => 'required|date',
            'nama_developer' => 'required',
            'pengambil' => 'required',
            'nama_pengambil' => 'required',
            'no_ktp_pengambil' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'date' => ':attribute harus berupa tanggal!',
            'digits' => ':attribute harus terdiri atas :values digit!',
            'string' => ':attribute harus berupa huruf!',
            'numeric' => ':attribute harus berupa angka!',
            'checkedDokumen.required' => 'Dokumen harus dipilih!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'no_debitur' => 'Nomor debitur',
            'nama_debitur' => 'Nama debitur',
            'no_ktp' => 'Nomor KTP debitur',
            'alamat_ktp' => 'Alamat KTP debitur',
            'alamat_agunan' => 'Alamat agunan',
            'no' => 'Nomor rumah',
            'blok' => 'Blok rumah',
            'tanggal_pelunasan' => 'Tanggal pelunasan',
            'nama_developer' => 'Nama developer',
            'pengambil' => 'Pengambil',
            'nama_pengambil' => 'Nama pengambil',
            'no_ktp_pengambil' => 'Nomor KTP pengambil'
        ];
    }

    public function mount()
    {
        $this->debitur();
        $this->updatedPengambil();
    }

    public function debitur()
    {
        $this->debitur = Debitur::where('no_debitur', $this->no_debitur)
            ->first();

        $this->nama_debitur = $this->debitur->nama_debitur;
        $this->no_debitur = $this->debitur->no_debitur;
        $this->no_ktp = $this->debitur->no_ktp;
        $this->no = $this->debitur->no;
        $this->blok = $this->debitur->blok;
        $this->alamat_ktp = $this->debitur->alamat_ktp;
        $this->alamat_agunan = $this->debitur->alamat_agunan;
        $this->nama_developer = $this->debitur->developer->kode_developer;
    }

    public function indexDokumen()
    {
        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)
            ->get();
        return $dokumen;
    }

    public function getRoyaDebitur()
    {
        $roya = SuratRoya::where('debitur_id', $this->debitur->id)->first();
        return $roya;
    }

    public function getAllDeveloper()
    {
        $developer = Developer::all();
        return $developer;
    }

    public function updatedPengambil()
    {
        if ($this->pengambil === 'Debitur') {
            $this->nama_pengambil = $this->debitur->nama_debitur;
            $this->no_ktp_pengambil = $this->debitur->no_ktp;
        } else {
            $this->nama_pengambil = '';
            $this->no_ktp_pengambil = '';
        }
    }

    public function storeBastPengambilan()
    {
        $this->validate();

        DB::transaction(function () {
            $bast = BastPengambilan::create([
                'no_debitur' => $this->no_debitur,
                'nama_debitur' => $this->nama_debitur,
                'no_ktp' => $this->no_ktp,
                'alamat_ktp' => $this->alamat_ktp,
                'alamat_agunan' => $this->alamat_agunan,
                'no' => $this->no,
                'blok' => $this->blok,
                'tanggal_pelunasan' => $this->tanggal_pelunasan,
                'nama_developer' => $this->nama_developer,
                'pengambil' => $this->pengambil,
                'nama_pengambil' => $this->nama_pengambil,
                'no_ktp_pengambil' => $this->no_ktp_pengambil,
                'debitur_id' => $this->debitur->id,
            ]);

            foreach ($this->checkedDokumen as $jenis) {
                $dokumen = Dokumen::where('jenis', $jenis)
                    ->where('debitur_id', $this->debitur->id)->first();

                Pengambilan::create([
                    'bast_pengambilan_id' => $bast->id,
                    'dokumen_id' => $dokumen->id,
                    'sudah_selesai' => 0
                ]);
            }
        });

        // $this->reset();
        $this->dispatch('scrollToTop');
    }

    public function render()
    {
        return view('livewire.pengambilan-dokumen.pengambilan-dokumen-livewire', [
            'dokumen' => $this->indexDokumen(),
            'roya' => $this->getRoyaDebitur(),
            'developerList' => $this->getAllDeveloper()
        ]);
    }
}
