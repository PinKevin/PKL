<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use Livewire\Component;
use App\Models\BastPeminjaman;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ReportPeminjamanLivewire extends Component
{
    public $tanggal_pinjam_filter, $tanggal_jatuh_tempo_filter, $nama_filter;

    public function allDokumenDipinjam()
    {
        $this->tanggal_pinjam_filter = '2024-02-15';
        $this->tanggal_jatuh_tempo_filter = '2024-02-24';

        $debiturWithDokumen = Debitur::with('dokumen.peminjaman.bastPeminjaman')
            ->where('nama_debitur', 'like', '%' . trim($this->nama_filter) . '%')
            ->orWhere('no_debitur', 'like', '%' . trim($this->nama_filter) . '%')
            ->get();

        // dd($debiturWithDokumen);

        $debiturWithDokumenDipinjam = $debiturWithDokumen->map(function ($debitur) {
            $debitur->dokumen = $debitur->dokumen->filter(function ($dokumen) {
                return $dokumen->status_pinjaman == 1;
            })->map(function ($dokumen) {
                $latestPeminjaman = $dokumen->peminjaman->sortByDesc('bast_peminjaman_id')->first();

                if ($latestPeminjaman && $latestPeminjaman->bastPeminjaman) {
                    $dokumen->tanggal_pinjam = optional($latestPeminjaman)->bastPeminjaman->tanggal_pinjam->format('d-m-Y');
                    $dokumen->tanggal_jatuh_tempo = optional($latestPeminjaman)->bastPeminjaman->tanggal_jatuh_tempo->format('d-m-Y');
                    return $dokumen;
                }
            });
            return $debitur;
        })->reject(function ($debitur) {
            return $debitur->dokumen->isEmpty();
        });
        return $debiturWithDokumenDipinjam;
        // dd($debiturWithDokumenDipinjam);
    }

    // public function allDokumenDipinjam()
    // {
    //     $this->tanggal_pinjam_filter = '2024-02-15';
    //     $this->tanggal_jatuh_tempo_filter = '2024-02-24';

    //     $bastPeminjaman = BastPeminjaman::with('peminjaman.dokumen.debitur')
    //         ->whereBetween('tanggal_pinjam', [
    //             $this->tanggal_pinjam_filter,
    //             $this->tanggal_jatuh_tempo_filter
    //         ])
    //         ->orWhereBetween('tanggal_jatuh_tempo', [
    //             $this->tanggal_pinjam_filter,
    //             $this->tanggal_jatuh_tempo_filter
    //         ])
    //         ->whereHas('peminjaman.dokumen.debitur', function ($query) {
    //             $query->where('nama_debitur', 'like', '%' . trim($this->nama_filter) . '%')
    //                 ->orWhere('no_debitur', 'like', '%' . trim($this->nama_filter) . '%');
    //         })
    //         ->get();

    //     // dd($bastPeminjaman);

    //     $debiturWithDokumenDipinjam = $bastPeminjaman->map(function ($bast) {
    //         return $bast->peminjaman->map(function ($peminjaman) use ($bast) {
    //             $dokumen = $peminjaman->dokumen;
    //             $debitur = $dokumen->debitur;
    //             $dokumen->tanggal_pinjam = $bast->tanggal_pinjam->format('d-m-Y');
    //             $dokumen->tanggal_jatuh_tempo = $bast->tanggal_jatuh_tempo->format('d-m-Y');
    //             return $dokumen;
    //         });
    //     })->flatten();

    //     // dd($debiturWithDokumenDipinjam);
    //     return $debiturWithDokumenDipinjam;
    // }

    public function printReport()
    {
        $spreadsheet = IOFactory::load('format/format-laporan.xlsx');

        $worksheet = $spreadsheet->getActiveSheet();

        $worksheet->getCell('A5')->setValue('Tes');
        $worksheet->getCell('B5')->setValue('Dari PHP');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('tes.xlsx');

        return response()->download('tes.xlsx')->deleteFileAfterSend(true);
    }

    public function render()
    {
        return view('livewire.report-peminjaman.report-peminjaman-livewire', [
            'allDebitur' => $this->allDokumenDipinjam()
        ]);
    }
}
