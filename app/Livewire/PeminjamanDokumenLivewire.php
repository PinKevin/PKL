<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PeminjamanDokumenLivewire extends Component
{
    public $debitur, $no_debitur;
    public $tanggal_pinjam, $tanggal_kembali, $alasan_pinjam, $peminjam;
    public $dokumen_id;
    public $logPeminjaman;

    public function rules()
    {
        return [
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'alasan_pinjam' => 'required',
            'peminjam' => 'required'
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
            'tanggal_pinjam' => 'Tanggal pinjam',
            'tanggal_kembali' => 'Tanggal kembali',
            'alasan_pinjam' => 'Alasan pinjam',
            'peminjam' => 'Peminjam'
        ];
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

    public function createPeminjaman($dokumen_id)
    {
        $this->resetInput();
        $this->dokumen_id = $dokumen_id;
    }

    public function storePeminjaman()
    {
        $this->validate();

        DB::transaction(function () {
            $dokumen = Dokumen::where('id', $this->dokumen_id)->update([
                'status_pinjaman' => 1
            ]);

            Peminjaman::create([
                'tanggal_pinjam' => $this->tanggal_pinjam,
                'tanggal_kembali' => $this->tanggal_kembali,
                'alasan_pinjam' => $this->alasan_pinjam,
                'peminjam' => $this->peminjam,
                'dokumen_id' => $this->dokumen_id
            ]);
        });

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Peminjaman berhasil dilakukan!');
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

    public function ubahStatusPinjaman($id)
    {
        Dokumen::where('id', $id)->update([
            'status_pinjaman' => 0
        ]);

        $this->dispatch('scrollToTop');
        session()->flash('updateSuccess', 'Pengembalian berhasil dilakukan!');
    }

    public function resetInput()
    {
        $this->tanggal_kembali = '';
        $this->tanggal_pinjam = '';
        $this->alasan_pinjam = '';
        $this->peminjam = '';
    }

    public function render()
    {
        return view('livewire.peminjaman-dokumen.peminjaman-dokumen-livewire', [
            'debitur' => $this->debitur(),
            'dokumen' => $this->indexDokumen(),
            'peminjaman' => $this->indexPeminjaman()
        ]);
    }
}
