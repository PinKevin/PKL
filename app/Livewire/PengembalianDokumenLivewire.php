<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use App\Models\Notaris;
use Livewire\Component;
use App\Models\SuratRoya;
use App\Models\Peminjaman;
use App\Models\StaffCabang;
use App\Models\Pengembalian;
use App\Models\StaffNotaris;
use App\Models\BastPeminjaman;
use App\Models\BastPengambilan;
use App\Models\BastPengembalian;
use Illuminate\Support\Facades\DB;

class PengembalianDokumenLivewire extends Component
{

    public $debitur, $no_debitur;
    public $checkedDokumen = [];
    public $notaris_id, $peminjam, $pendukung, $keperluan, $tanggal_kembali, $peminta;

    public $peminjamList;
    public $logBast, $jenisList;

    public function rules()
    {
        return [
            'checkedDokumen' => 'required',
            'notaris_id' => 'required',
            'peminjam' => 'required',
            'pendukung' => 'required',
            'keperluan' => 'required',
            'tanggal_kembali' => 'required|date',
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
            'tanggal_kembali' => 'Tanggal kembali',
            'peminta' => 'Staff peminta',
        ];
    }

    public function mount()
    {
        $this->debitur();
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
        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)->get();
        return $dokumen;
    }

    public function getRoyaDebitur()
    {
        $roya = SuratRoya::where('debitur_id', $this->debitur->id)->first();
        return $roya;
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

    public function storePengembalian()
    {
        $this->validate();

        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)->pluck('id')->toArray();

        $bastPengembalianId = '';
        $peminjamanByJenis = [];

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

            $peminjamanByJenis[$jenisDokumen] = $peminjamanUntukPengembalian;
        }

        DB::transaction(function () use ($peminjamanByJenis, &$bastPengembalianId) {
            $bastPengembalian = BastPengembalian::create([
                'penerima' => auth()->user()->id,
                'peminjam' => $this->peminjam,
                'peminta' => $this->peminta,
                'debitur' => $this->debitur->id,
                'pendukung' => $this->pendukung,
                'keperluan' => $this->keperluan,
                'tanggal_kembali' => $this->tanggal_kembali,
            ]);

            $bastPengembalianId = $bastPengembalian->id;

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

        $route = route('pengembalian.cetak', ['id' => $bastPengembalianId]);

        $this->resetInput();
        $this->dispatch('scrollToTop');
        session()->flash('storeSuccess', "Pengembalian berhasil dilakukan! Silakan download BAST di <a href=\"$route\" class=\"underline\">sini!</a>");
    }

    public function showBastLog()
    {
        $dokumen = Dokumen::where('debitur_id', $this->debitur->id)->get();
        $dokumenIdList = $dokumen->pluck('id')->toArray();

        $pengembalian = Pengembalian::whereIn('dokumen_id', $dokumenIdList)->get();

        $bastIdList = $pengembalian->pluck('bast_pengembalian_id')->toArray();
        $bastLog = BastPengembalian::whereIn('id', $bastIdList)->get();

        $jenisDokumenByBast = [];

        if ($bastLog->isNotEmpty()) {
            foreach ($bastLog as $bast) {
                $jenisDokumenByBast[$bast->id] = [];

                foreach ($pengembalian as $p) {
                    if ($p->bast_pengembalian_id === $bast->id) {
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
        $this->tanggal_kembali = '';
        $this->peminta = '';
        $this->checkedDokumen = [];
    }

    public function render()
    {
        return view('livewire.pengembalian-dokumen.pengembalian-dokumen-livewire', [
            'dokumen' => $this->indexDokumen(),
            'roya' => $this->getRoyaDebitur(),
            'notaris' => $this->getAllNotaris(),
            'pemintaList' => $this->getAllPeminta()
        ]);
    }
}
