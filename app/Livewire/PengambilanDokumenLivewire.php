<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use App\Models\Regency;
use App\Models\Village;
use Livewire\Component;
use App\Models\District;
use App\Models\Developer;
use App\Models\Pelunasan;
use App\Models\SuratRoya;
use App\Models\Pengambilan;
use Livewire\WithFileUploads;
use App\Models\BastPengambilan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DataConverterController;
use App\Rules\AllDokumenChecked;

class PengambilanDokumenLivewire extends Component
{
    use WithFileUploads;

    public $debitur, $no_debitur;
    public $nama_debitur, $nama_developer, $no_ktp, $alamat_ktp, $alamat_agunan, $no, $blok, $pengambil;
    public $tanggal_pelunasan, $nama_pengambil, $no_ktp_pengambil;
    public $checkedDokumen = [];

    public $bastPengambilan, $file_pelunasan, $file_bast;

    public $no_surat_depan, $no_surat, $kota_bpn, $lokasi_kepala_bpn, $no_agunan;
    public $kelurahan, $kecamatan, $no_surat_ukur, $nib, $luas, $pemilik, $peringkat_sht, $no_sht;
    public $tanggal_sht;

    public $kotaList, $kecamatanList, $kelurahanList;

    public $bast, $suratRoya, $pelunasan, $bastTtd;
    public $selectAll = false;

    public function rules()
    {
        return [
            'checkedDokumen' => ['required', new AllDokumenChecked],
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
            'file_pelunasan' => 'required|file|mimes:pdf',
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
            'date' => ':attribute harus berupa tanggal!',
            'digits' => ':attribute harus terdiri atas :values digit!',
            'string' => ':attribute harus berupa huruf!',
            'numeric' => ':attribute harus berupa angka!',
            'checkedDokumen.required' => 'Dokumen harus dipilih!',
            'file' => ':attribute harus berupa file!',
            'mimes' => ':attribute harus berformat :mimes',
            'integer' => ':attribute harus berupa numerik!',
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
            'file_pelunasan' => 'Bukti pelunasan',
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

    public function mount()
    {
        $this->debitur();
        $this->updatedPengambil();
        $this->autoFillSuratRoya();
        $this->getAllKotaJawaTengah();
        $this->updatedKotaBpn();
        $this->updatedKecamatan();
        $this->getBastPengambilanDebitur();
        $this->getDebiturBerkas();
    }

    public function getDebiturBerkas()
    {
        $this->bast = BastPengambilan::where('debitur_id', $this->debitur->id)->first();
        if ($this->bast) {
            $this->suratRoya = $this->bast->suratRoya;
            $this->pelunasan = $this->bast->file_pelunasan;
            $this->bastTtd = Pelunasan::where('debitur_id', $this->debitur->id)->select('file_bast')->first();
        }
    }

    public function autoFillSuratRoya()
    {
        $this->no_surat_depan = $this->generateNoDepanSurat();
        $this->no_surat = $this->generateNoSurat();

        $sertipikat = Dokumen::where('jenis', 'Sertipikat')
            ->where('debitur_id', $this->debitur->id)
            ->first();

        $this->no_agunan = $sertipikat ? $sertipikat->no_dokumen : '';

        $sht = Dokumen::where('jenis', 'SHT')
            ->where('debitur_id', $this->debitur->id)
            ->first();

        if ($sht) {
            $this->no_sht = $sht->no_dokumen;
            $this->tanggal_sht = $sht->tanggal_terbit;
        }
    }


    public function generateNoDepanSurat()
    {
        $tahun = date('Y');
        $noDepan = SuratRoya::whereYear('created_at', $tahun)->max('no_surat_depan');
        $noDepan = $noDepan ? $noDepan + 1 : 1;
        $noDepan = $noDepan < 10 ? "0$noDepan" : $noDepan;
        return $noDepan;
    }

    public function generateNoSurat()
    {
        $bulan = DataConverterController::bulanToRomawi(date('m'));
        $tahun = date('Y');
        $noDepan = $this->no_surat_depan;

        $noSurat = "$noDepan/SMG/LD/$bulan/$tahun";
        return $noSurat;
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

    public function getAllDeveloper()
    {
        $developer = Developer::all();
        return $developer;
    }

    public function getAllKotaJawaTengah()
    {
        $this->kotaList = Regency::where('province_id', 33)->get();
    }

    public function updatedKotaBpn()
    {
        $this->kecamatan = '';
        $this->kelurahan = '';
        $this->kecamatanList = District::where('regency_id', $this->kota_bpn)->get();
    }

    public function updatedKecamatan()
    {
        $this->kelurahan = '';
        $this->kelurahanList = Village::where('district_id', $this->kecamatan)->get();
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

    public function selectAllDokumen()
    {
        $this->selectAll = !$this->selectAll;
        $this->checkedDokumen = $this->selectAll ? $this->indexDokumen()->pluck('jenis')->toArray() : [];
    }

    public function updatedCheckAllDokumen()
    {
        $this->selectAll = count($this->checkedDokumen) == count($this->indexDokumen());
    }

    public function storeBastPengambilan()
    {
        $this->validate();

        $bastId =  '';

        DB::transaction(function () use (&$bastId) {
            $namaFile = "file_pelunasan_" . strtolower(str_replace(' ', '_', $this->debitur->nama_debitur)) . ".pdf";
            $path_file = $this->file_pelunasan->storeAs('file_pelunasan', $namaFile);

            $suratRoya = SuratRoya::create([
                'no_surat_depan' => $this->no_surat_depan,
                'no_surat' => $this->no_surat,
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
                'tanggal_sht' => $this->tanggal_sht,
                'debitur_id' => $this->debitur->id,
            ]);

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
                'file_pelunasan' => $path_file,
                'surat_roya_id' => $suratRoya->id
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
        $this->resetInput();
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

    // public function showBastLog()
    // {
    //     $dokumen = Dokumen::where('debitur_id', $this->debitur->id)->get();
    //     $dokumenIdList = $dokumen->pluck('id')->toArray();

    //     $pengambilan = Pengambilan::whereIn('dokumen_id', $dokumenIdList)->get();

    //     $bastIdList = $pengambilan->pluck('bast_pengambilan_id')->toArray();
    //     $bastLog = BastPengambilan::whereIn('id', $bastIdList)->get();

    //     $jenisDokumenByBast = [];

    //     if ($bastLog->isNotEmpty()) {
    //         foreach ($bastLog as $bast) {
    //             $jenisDokumenByBast[$bast->id] = [];

    //             foreach ($pengambilan as $p) {
    //                 if ($p->bast_pengambilan_id === $bast->id) {
    //                     $jenisDokumenByBast[$bast->id][] = $p->dokumen->jenis;
    //                 }
    //             }
    //         }

    //         $this->logBast = $bastLog;
    //         $this->jenisList = $jenisDokumenByBast;
    //         // dd($this->logBast);
    //     } else {
    //         $this->logBast = [];
    //         $this->jenisList = [];
    //     }
    // }

    public function resetInput()
    {
        $this->checkedDokumen = [];

        $this->pengambil = '';
        $this->nama_pengambil = '';
        $this->no_ktp_pengambil = '';
        $this->file_pelunasan = '';

        $this->tanggal_pelunasan = '';
        $this->kota_bpn = '';
        $this->lokasi_kepala_bpn = '';
        $this->no_surat_ukur = '';
        $this->kecamatan = '';
        $this->kelurahan = '';
        $this->nib = '';
        $this->luas = '';
        $this->pemilik = '';
        $this->peringkat_sht = '';
    }

    public function render()
    {
        return view('livewire.pengambilan-dokumen.pengambilan-dokumen-livewire', [
            'dokumen' => $this->indexDokumen(),
            'developerList' => $this->getAllDeveloper()
        ]);
    }
}
