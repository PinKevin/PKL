<?php

namespace App\Livewire;

use App\Models\BastPeminjaman;
use App\Models\BastPengembalian;
use App\Models\Debitur;
use App\Models\Dokumen;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Livewire\Component;
use App\Models\SuratRoya;
use Illuminate\Support\Facades\DB;

class PengembalianDokumenLivewire extends Component
{
    public $debitur, $no_debitur;
    public $checkedDokumen = [];
    public $keperluan;

    public function rules()
    {
        return [
            'checkedDokumen' => 'required',
            // 'notaris_id' => 'required',
            // 'peminjam' => 'required',
            // 'pendukung' => 'required',
            'keperluan' => 'required',
            // 'tanggal_jatuh_tempo' => 'required|date',
            // 'peminta' => 'required',
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
        $this->debitur();
    }

    public function debitur()
    {
        $this->debitur = Debitur::select('id', 'nama_debitur', 'no_debitur')
            ->where('no_debitur', $this->no_debitur)
            ->first();
    }

    public function indexDokumen()
    {
        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)->get();
        return $dokumen;
    }

    public function getRoyaDebitur()
    {
        $roya = SuratRoya::where('debitur_id', $this->debitur->id)->first();
        return $roya;
    }

    public function storePengembalian()
    {
        $this->validate();

        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)->pluck('id')->toArray();

        // Initialize an array to store peminjaman for each jenis dokumen
        $peminjamanByJenis = [];

        // Loop through each selected jenis dokumen
        foreach ($this->checkedDokumen as $jenisDokumen) {
            $bastTerbaru = BastPeminjaman::whereHas('peminjaman', function ($query) use ($dokumen, $jenisDokumen) {
                $query->whereIn('dokumen_id', $dokumen)->whereHas('dokumen', function ($subQuery) use ($jenisDokumen) {
                    $subQuery->where('jenis', $jenisDokumen);
                });
            })->latest('tanggal_pinjam')->first();

            $peminjamanTerbaru = $bastTerbaru->peminjaman()->get();

            $peminjamanUntukPengembalian = $peminjamanTerbaru->filter(function ($peminjaman) use ($jenisDokumen) {
                return $peminjaman->dokumen->jenis === $jenisDokumen;
            });

            // Store peminjaman for each jenis dokumen
            $peminjamanByJenis[$jenisDokumen] = $peminjamanUntukPengembalian;
        }

        // Create a single BastPengembalian outside the loop
        DB::transaction(function () use ($peminjamanByJenis) {
            $bastPengembalian = BastPengembalian::create([
                'penerima' => auth()->user()->id,
                'tanggal_kembali' => now()
            ]);

            foreach ($peminjamanByJenis as $jenisDokumen => $peminjamanUntukPengembalian) {
                foreach ($peminjamanUntukPengembalian as $peminjaman) {
                    $peminjaman->dokumen->update(['status_pinjaman' => 0]);

                    Pengembalian::create([
                        'bast_pengembalian_id' => $bastPengembalian->id,
                        'peminjaman_id' => $peminjaman->id,
                        'bast_peminjaman_id' => $peminjaman->bast_peminjaman_id,
                        'dokumen_id' => $peminjaman->dokumen->id,
                    ]);
                }
            }
        });

        $this->resetInput();
        $this->dispatch('scrollToTop');
    }


    public function resetInput()
    {
        // $this->notaris_id = '';
        // $this->peminjam = '';
        // $this->pendukung = '';
        $this->keperluan = '';
        // $this->tanggal_jatuh_tempo = '';
        // $this->peminta = '';
        $this->checkedDokumen = [];
    }

    public function render()
    {
        return view('livewire.pengembalian-dokumen.pengembalian-dokumen-livewire', [
            'dokumen' => $this->indexDokumen(),
            'roya' => $this->getRoyaDebitur()
        ]);
    }
}
