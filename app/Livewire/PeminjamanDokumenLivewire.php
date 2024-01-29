<?php

namespace App\Livewire;

use App\Models\BastPeminjaman;
use App\Models\Debitur;
use App\Models\Dokumen;
use App\Models\Notaris;
use Livewire\Component;
use App\Models\Peminjaman;
use App\Models\StaffCabang;
use App\Models\StaffNotaris;
use Illuminate\Support\Facades\DB;

class PeminjamanDokumenLivewire extends Component
{
    public $debitur, $no_debitur;
    public $notaris_id, $peminjam, $pendukung, $keperluan, $tanggal_jatuh_tempo, $peminta;
    public $peminjamList = [];

    public $dokumen_id;
    public $logPeminjaman, $jenisList;
    public $logBast;
    public $checkedDokumen = [];

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

    public function createPeminjaman($dokumen_id)
    {
        $this->resetInput();
        $this->dokumen_id = $dokumen_id;
    }

    public function storePeminjaman()
    {
        $bastId = '';
        $this->validate();

        DB::transaction(function () use (&$bastId) {
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

            foreach ($this->checkedDokumen as $jenis) {
                $dokumen = Dokumen::where('jenis', $jenis)
                    ->where('debitur_id', $this->debitur->id)->first();

                Peminjaman::create([
                    'bast_peminjaman_id' => $bast->id,
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
        session()->flash('storeSuccess', "Peminjaman berhasil dilakukan! Silakan download BAST di <a href=\"$route\" class=\"underline\">sini!</a>");
    }

    public function showLog($id)
    {
        $log = Peminjaman::where('dokumen_id', $id)->get();
        if ($log->isNotEmpty()) {
            $this->logPeminjaman = $log;
        } else {
            $this->logPeminjaman = [];
        }
    }

    public function showBastLog()
    {
        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)->get();
        $dokumenIdList = $dokumen->pluck('id')->toArray();

        $peminjaman = Peminjaman::whereIn('dokumen_id', $dokumenIdList)->get();

        $bastIdList = $peminjaman->pluck('bast_peminjaman_id')->toArray();
        $bastLog = BastPeminjaman::whereIn('id', $bastIdList)->get();

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



    // public function ubahStatusPinjaman($id)
    // {
    //     Dokumen::where('id', $id)->update([
    //         'status_pinjaman' => 0
    //     ]);

    //     $this->dispatch('scrollToTop');
    //     session()->flash('updateSuccess', 'Pengembalian berhasil dilakukan!');
    // }

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
            'debitur' => $this->debitur(),
            'dokumen' => $this->indexDokumen(),
            'peminjaman' => $this->indexPeminjaman(),
            'notaris' => $this->getAllNotaris(),
            'peminjamList' => $this->peminjamList,
            'pemintaList' => $this->getAllPeminta()
        ]);
    }
}
