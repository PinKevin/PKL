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
    public $notaris_id, $peminjam, $pendukung, $keperluan, $tanggal_jatuh_tempo, $pemberi_perintah;
    public $peminjamList = [];

    public $dokumen_id;
    public $logPeminjaman;
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
            'pemberi_perintah' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'date' => ':attribute harus berupa tanggal!',
        ];
    }

    public function validationAttributes()
    {
        return [
            'notaris_id' => 'Nama notaris',
            'peminjam' => 'Nama staff notaris peminjam',
            'pendukung' => 'Dokumen pendukung',
            'keperluan' => 'Keperluan',
            'tanggal_jatuh_tempo' => 'Tanggal jatuh tempo',
            'pemberi_perintah' => 'Staff pemberi perintah',
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

    public function getAllPemberiPerintah()
    {
        $pemberiPerintah = StaffCabang::all();
        return $pemberiPerintah;
    }

    public function createPeminjaman($dokumen_id)
    {
        $this->resetInput();
        $this->dokumen_id = $dokumen_id;
    }

    public function storePeminjaman()
    {
        // dd($this->checkedDokumen, $this->dokumen_id, $this->no_debitur);
        $bastId = '';
        $this->validate();

        DB::transaction(function () use (&$bastId) {
            $bast = BastPeminjaman::create([
                'pemberi' => auth()->user()->id,
                'peminjam' => $this->peminjam,
                'pemberi_perintah' => $this->pemberi_perintah,
                'pendukung' => $this->pendukung,
                'keperluan' => $this->keperluan,
                'tanggal_pinjam' => date('Y-m-d'),
                'tanggal_jatuh_tempo' => $this->tanggal_jatuh_tempo,
            ]);

            $bastId = $bast->id;

            foreach ($this->checkedDokumen as $dokumenId) {
                Peminjaman::create([
                    'bast_peminjaman_id' => $bast->id,
                    'dokumen_id' => $dokumenId
                ]);

                Dokumen::where('id', $dokumenId)->update([
                    'status_pinjaman' => 1
                ]);
            }
        });

        $this->resetInput();
        redirect()->route('peminjaman.cetak', ['id' => $bastId]);

        // $this->dispatch('scrollToTop');
        // session()->flash('storeSuccess', 'Peminjaman berhasil dilakukan!');
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
        $this->pemberi_perintah = '';
    }

    public function render()
    {
        return view('livewire.peminjaman-dokumen.peminjaman-dokumen-livewire', [
            'debitur' => $this->debitur(),
            'dokumen' => $this->indexDokumen(),
            'peminjaman' => $this->indexPeminjaman(),
            'notaris' => $this->getAllNotaris(),
            'peminjamList' => $this->peminjamList,
            'pemberiPerintah' => $this->getAllPemberiPerintah()
        ]);
    }
}
