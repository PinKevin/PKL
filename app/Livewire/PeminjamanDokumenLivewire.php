<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use App\Models\Notaris;
use Livewire\Component;
use App\Models\SuratRoya;
use App\Models\Peminjaman;
use App\Models\StaffCabang;
use App\Models\StaffNotaris;
use App\Models\BastPeminjaman;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DataConverterController;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;

class PeminjamanDokumenLivewire extends Component
{
    public $debitur, $no_debitur;
    public $notaris_id, $peminjam, $pendukung, $keperluan, $tanggal_jatuh_tempo, $peminta;
    public $peminjamList = [];
    public $kotaList, $kecamatanList, $kelurahanList;

    public $dokumen_id;
    public $logPeminjaman, $jenisList;
    public $logBast;
    public $checkedDokumen = [];

    public $no_surat_depan, $no_surat, $tanggal_pelunasan, $kota_bpn, $lokasi_kepala_bpn, $no_agunan;
    public $kelurahan, $kecamatan, $no_surat_ukur, $nib, $luas, $pemilik, $peringkat_sht, $no_sht;
    public $tanggal_sht;

    public function rules()
    {
        return [
            'checkedDokumen' => 'required',
            'notaris_id' => 'required',
            'peminjam' => 'required',
            'pendukung' => 'required',
            'keperluan' => 'required',
            'tanggal_jatuh_tempo' => 'required|date',
            'peminta' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'date' => ':attribute harus berupa tanggal!',
            'checkedDokumen.required' => 'Dokumen harus dipilih!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'checkedDokumen' => 'Dokumen',
            'notaris_id' => 'Nama notaris',
            'peminjam' => 'Nama staff notaris peminjam',
            'pendukung' => 'Dokumen pendukung',
            'keperluan' => 'Keperluan',
            'tanggal_jatuh_tempo' => 'Tanggal jatuh tempo',
            'peminta' => 'Staff peminta',
        ];
    }

    public function mount()
    {
        $this->updatedNotarisId();
        $this->debitur();
        $this->autoFillSuratRoya();
        $this->getAllKotaJawaTengah();
        $this->updatedKotaBpn();
        $this->updatedKecamatan();
    }

    public function autoFillSuratRoya()
    {
        $this->no_surat_depan = $this->generateNoDepanSurat();
        $this->no_surat = $this->generateNoSurat();

        $sertipikat = Dokumen::where('jenis', 'Sertipikat')
            ->where('debitur_id', $this->debitur->id)
            ->first();

        $sht = Dokumen::where('jenis', 'SHT')
            ->where('debitur_id', $this->debitur->id)
            ->first();

        $this->no_agunan = $sertipikat->no_dokumen;

        $this->no_sht = $sht->no_dokumen;
        $this->tanggal_sht = $sht->tanggal_terbit;
    }

    public function generateNoDepanSurat()
    {
        $tahun = date('Y');
        $noDepan = SuratRoya::whereYear('created_at', $tahun)->max('no_surat_depan');
        $noDepan = $noDepan ? $noDepan + 1 : 1;
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
        $this->debitur = Debitur::select('id', 'nama_debitur', 'no_debitur')
            ->where('no_debitur', $this->no_debitur)
            ->first();
    }

    public function indexDokumen()
    {
        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)
            ->get();
        return $dokumen;
    }

    public function indexPeminjaman()
    {
        $dokumenData = $this->indexDokumen();

        $peminjaman = Peminjaman::whereIn('dokumen_id', $dokumenData->pluck('id'))
            ->get();

        return $peminjaman;
    }

    public function getAllNotaris()
    {
        $notaris = Notaris::all();
        return $notaris;
    }

    public function getRoyaDebitur()
    {
        $roya = SuratRoya::where('debitur_id', $this->debitur->id)->first();
        return $roya;
    }

    public function updatedNotarisId()
    {
        $this->peminjam = '';
        $this->peminjamList = StaffNotaris::where('notaris_id', $this->notaris_id)->get();
    }

    public function getAllPeminta()
    {
        $peminta = StaffCabang::all();
        return $peminta;
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

    public function createPeminjaman($dokumen_id)
    {
        $this->resetInput();
        $this->dokumen_id = $dokumen_id;
    }

    public function storePeminjaman()
    {
        $bastId = '';
        $routeSuratRoya = '';

        if (in_array('SHT', $this->checkedDokumen)) {
            $this->validate([
                'checkedDokumen' => 'required',
                'notaris_id' => 'required',
                'peminjam' => 'required',
                'pendukung' => 'required',
                'keperluan' => 'required',
                'tanggal_jatuh_tempo' => 'required|date',
                'peminta' => 'required',
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
            ], [
                'required' => ':attribute harus diisi!',
                'date' => ':attribute harus berupa tanggal!',
                'checkedDokumen.required' => 'Dokumen harus dipilih!',
                'integer' => ':attribute harus berupa numerik!',
                'unique' => ':attribute sudah ada di dalam database!'
            ], [
                'checkedDokumen' => 'Dokumen',
                'notaris_id' => 'Nama notaris',
                'peminjam' => 'Nama staff notaris peminjam',
                'pendukung' => 'Dokumen pendukung',
                'keperluan' => 'Keperluan',
                'tanggal_jatuh_tempo' => 'Tanggal jatuh tempo',
                'peminta' => 'Staff peminta',
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
            ]);
        } else {
            $this->validate();
        }

        DB::transaction(function () use (&$bastId, &$routeSuratRoya) {
            $bast = BastPeminjaman::create([
                'pemberi' => auth()->user()->id,
                'peminjam' => $this->peminjam,
                'peminta' => $this->peminta,
                'debitur' => $this->debitur->id,
                'pendukung' => $this->pendukung,
                'keperluan' => $this->keperluan,
                'tanggal_pinjam' => date('Y-m-d'),
                'tanggal_jatuh_tempo' => $this->tanggal_jatuh_tempo,
            ]);

            $bastId = $bast->id;

            if (in_array('SHT', $this->checkedDokumen)) {
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
                    'bast_peminjaman_id' => $bastId
                ]);
                $routeSuratRoya = route('surat-roya.cetak', ['id' => $suratRoya->id]);
            }

            foreach ($this->checkedDokumen as $jenis) {
                $dokumen = Dokumen::where('jenis', $jenis)
                    ->where('debitur_id', $this->debitur->id)->first();

                Peminjaman::create([
                    'bast_peminjaman_id' => $bastId,
                    'dokumen_id' => $dokumen->id
                ]);

                $dokumen->update([
                    'status_pinjaman' => 1
                ]);
            }
        });

        $route = route('peminjaman.cetak', ['id' => $bastId]);

        $this->resetInput();
        $this->dispatch('scrollToTop');
        if (in_array('SHT', $this->checkedDokumen)) {
            session()->flash('storeSuccess', "Peminjaman berhasil dilakukan! Silakan download BAST di <a href=\"$route\" class=\"underline\">sini!</a> dan Surat Roya di <a href=\"$routeSuratRoya\" class=\"underline\">sini!</a>");
        } else {
            session()->flash('storeSuccess', "Peminjaman berhasil dilakukan! Silakan download BAST di <a href=\"$route\" class=\"underline\">sini!</a>");
        }
    }

    public function showBastLog()
    {
        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)->get();
        $dokumenIdList = $dokumen->pluck('id')->toArray();

        $peminjaman = Peminjaman::whereIn('dokumen_id', $dokumenIdList)->get();

        $bastIdList = $peminjaman->pluck('bast_peminjaman_id')->toArray();
        $bastLog = BastPeminjaman::whereIn('id', $bastIdList)->get();

        $suratRoyaSht = SuratRoya::where('bast_peminjaman_id', '');

        $jenisDokumenByBast = [];

        if ($bastLog->isNotEmpty()) {
            foreach ($bastLog as $bast) {
                $jenisDokumenByBast[$bast->id] = [];

                foreach ($peminjaman as $p) {
                    if ($p->bast_peminjaman_id === $bast->id) {
                        $jenisDokumenByBast[$bast->id][] = $p->dokumen->jenis;
                    }
                }
            }

            $this->logBast = $bastLog;
            $this->jenisList = $jenisDokumenByBast;
        } else {
            $this->logBast = [];
            $this->jenisList = [];
        }
    }

    public function resetInput()
    {
        $this->notaris_id = '';
        $this->peminjam = '';
        $this->pendukung = '';
        $this->keperluan = '';
        $this->tanggal_jatuh_tempo = '';
        $this->peminta = '';
        $this->checkedDokumen = [];
    }

    public function render()
    {
        return view('livewire.peminjaman-dokumen.peminjaman-dokumen-livewire', [
            'dokumen' => $this->indexDokumen(),
            'peminjaman' => $this->indexPeminjaman(),
            'notaris' => $this->getAllNotaris(),
            'peminjamList' => $this->peminjamList,
            'pemintaList' => $this->getAllPeminta(),
            'roya' => $this->getRoyaDebitur()
        ]);
    }
}
