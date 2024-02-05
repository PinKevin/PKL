<?php

namespace App\Livewire;

use App\Models\BastPengambilan;
use App\Models\Debitur;
use App\Models\Developer;
use App\Models\Dokumen;
use App\Models\Pelunasan;
use App\Models\Pengambilan;
use Livewire\Component;
use App\Models\SuratRoya;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class PengambilanDokumenLivewire extends Component
{
    use WithFileUploads;

    public $debitur, $no_debitur;
    public $nama_debitur, $nama_developer, $no_ktp, $alamat_ktp, $alamat_agunan, $no, $blok, $pengambil;
    public $tanggal_pelunasan, $nama_pengambil, $no_ktp_pengambil;
    public $checkedDokumen = [];

    public $logBast, $jenisList;
    public $bastPengambilan, $file_pelunasan, $file_bast;

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
            'no_ktp_pengambil' => 'required',
            'file_pelunasan' => 'required|file|mimes:pdf'
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
            'checkedDokumen.required' => 'Dokumen harus dipilih!',
            'file' => ':attribute harus berupa file!',
            'mimes' => ':attribute harus berformat :mimes'
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
            'no_ktp_pengambil' => 'Nomor KTP pengambil',
            'file_pelunasan' => 'Bukti pelunasan'
        ];
    }

    public function mount()
    {
        $this->debitur();
        $this->updatedPengambil();
        $this->getBastPengambilanDebitur();
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

        $bastId =  '';

        DB::transaction(function () use (&$bastId) {
            $namaFile = "file_pelunasan_" . strtolower(str_replace(' ', '_', $this->debitur->nama_debitur)) . ".pdf";
            $path_file = $this->file_pelunasan->storeAs('file_pelunasan', $namaFile);

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
                'file_pelunasan' => $path_file
            ]);

            $bastId = $bast->id;

            foreach ($this->checkedDokumen as $jenis) {
                $dokumen = Dokumen::where('jenis', $jenis)
                    ->where('debitur_id', $this->debitur->id)->first();

                Pengambilan::create([
                    'bast_pengambilan_id' => $bast->id,
                    'dokumen_id' => $dokumen->id,
                ]);

                $dokumen->update([
                    'status_keluar' => 1
                ]);
            }
        });

        $route = route('pengambilan.cetak', ['id' => $bastId]);
        // $this->reset();
        $this->dispatch('scrollToTop');
        session()->flash('storeSuccess', "Pengambilan berhasil dilakukan! Silakan download BAST di <a href=\"$route\" class=\"underline\">sini!</a>");
    }

    public function getBastPengambilanDebitur()
    {
        $bast = BastPengambilan::where('debitur_id', $this->debitur->id)->first();
        if ($bast) {
            $this->bastPengambilan = $bast;
        }
    }

    public function storePelunasan()
    {
        $pengambilan = Pengambilan::where('bast_pengambilan_id', $this->bastPengambilan->id)->get();

        $dokumenDiambil = [];
        foreach ($pengambilan as $p) {
            $dokumenDiambil[] = $p->dokumen;
        }

        $this->validate([
            'file_bast' => 'required|file|mimes:pdf',
        ], [
            'required' => ':attribute harus diisi!',
            'file' => ':attribute harus berupa file!',
            'mimes' => ':attribute harus berformat :values'
        ], [
            'file_bast' => 'File berita acara'
        ]);


        DB::transaction(function () use ($dokumenDiambil) {
            $namaFile = "bast_pengambilan_" . strtolower(str_replace(' ', '_', $this->debitur->nama_debitur)) . ".pdf";
            $path_file = $this->file_bast->storeAs('bast_pengambilan', $namaFile);

            Pelunasan::create([
                'bast_pengambilan_id' => $this->bastPengambilan->id,
                'debitur_id' => $this->debitur->id,
                'file_bast' => $path_file
            ]);

            $this->debitur->update([
                'sudah_lunas' => 1
            ]);
        });

        $this->dispatch('scrollToTop');
        session()->flash('storeSuccess', "Upload BAST berhasil dilakukan!");
    }

    public function showBastLog()
    {
        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)->get();
        $dokumenIdList = $dokumen->pluck('id')->toArray();

        $pengambilan = Pengambilan::whereIn('dokumen_id', $dokumenIdList)->get();

        $bastIdList = $pengambilan->pluck('bast_pengambilan_id')->toArray();
        $bastLog = BastPengambilan::whereIn('id', $bastIdList)->get();

        // dd($bastLog);

        $jenisDokumenByBast = [];

        if ($bastLog->isNotEmpty()) {
            foreach ($bastLog as $bast) {
                $jenisDokumenByBast[$bast->id] = [];

                foreach ($pengambilan as $p) {
                    if ($p->bast_pengambilan_id === $bast->id) {
                        $jenisDokumenByBast[$bast->id][] = $p->dokumen->jenis;
                    }
                }
            }

            $this->logBast = $bastLog;
            $this->jenisList = $jenisDokumenByBast;
            // dd($this->logBast);
        } else {
            $this->logBast = [];
            $this->jenisList = [];
        }
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
