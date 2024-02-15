<?php

namespace App\Livewire;

use App\Models\BastPeminjaman;
use App\Models\BastPengambilan;
use App\Models\BastPengembalian;
use Carbon\Carbon;
use Livewire\Component;
use PhpOffice\PhpWord\TemplateProcessor;

class ReportLivewire extends Component
{
    public $date_filter_awal, $date_filter_akhir, $jenis_filter;

    public function getAllTransaksi()
    {
        if (!$this->date_filter_awal && !$this->date_filter_akhir) {
            $this->date_filter_awal = now()->subDays(7)->startOfDay()->toDateString();
            $this->date_filter_akhir = now()->endOfDay()->toDateString();
        }

        $bastPeminjaman = BastPeminjaman::with('debitur')
            ->whereDate('created_at', '>=', $this->date_filter_awal)
            ->whereDate('created_at', '<=', $this->date_filter_akhir)
            ->get();

        $bastPengembalian = BastPengembalian::with('debitur')
            ->whereDate('created_at', '>=', $this->date_filter_awal)
            ->whereDate('created_at', '<=', $this->date_filter_akhir)
            ->get();

        $bastPengambilan = BastPengambilan::with('debitur')
            ->whereDate('created_at', '>=', $this->date_filter_awal)
            ->whereDate('created_at', '<=', $this->date_filter_akhir)
            ->get();

        $bastPeminjaman = $bastPeminjaman->map(function ($item) {
            $peminjamanList = [];

            foreach ($item->peminjaman as $peminjaman) {
                $dokumen = $peminjaman->dokumen;
                $jenisDokumen = $dokumen->jenis;
                $peminjamanList[] = $jenisDokumen;
            }

            return [
                'id' => $item->id,
                'no_debitur' => $item->debitur()->first()->no_debitur,
                'nama_debitur' => $item->debitur()->first()->nama_debitur,
                'dokumen' => $peminjamanList,
                'jenis' => 'Peminjaman',
                'tanggal_buat' => $item->created_at
            ];
        });

        $bastPengembalian = $bastPengembalian->map(function ($item) {
            $pengembalianList = [];

            foreach ($item->pengembalian as $pengembalian) {
                $dokumen = $pengembalian->dokumen;
                $jenisDokumen = $dokumen->jenis;
                $pengembalianList[] =   $jenisDokumen;
            }

            return [
                'id' => $item->id,
                'no_debitur' => $item->debitur()->first()->no_debitur,
                'nama_debitur' => $item->debitur()->first()->nama_debitur,
                'dokumen' => $pengembalianList,
                'jenis' => 'Pengembalian',
                'tanggal_buat' => $item->created_at
            ];
        });

        $bastPengambilan = $bastPengambilan->map(function ($item) {
            $pengambilanList = [];

            foreach ($item->pengambilan as $pengambilan) {
                $dokumen = $pengambilan->dokumen;
                $jenisDokumen = $dokumen->jenis;
                $pengambilanList[] = $jenisDokumen;
            }

            return [
                'id' => $item->id,
                'no_debitur' => $item->debitur->no_debitur,
                'nama_debitur' => $item->debitur->nama_debitur,
                'dokumen' => $pengambilanList,
                'jenis' => 'Pengambilan',
                'tanggal_buat' => $item->created_at
            ];
        });

        if ($this->jenis_filter) {
            switch ($this->jenis_filter) {
                case 'Peminjaman':
                    $allTransaksi = $bastPeminjaman;
                    break;
                case 'Pengembalian':
                    $allTransaksi = $bastPengembalian;
                    break;
                case 'Pengambilan':
                    $allTransaksi = $bastPengambilan;
                    break;
                default:
                    $allTransaksi = collect([]);
                    break;
            }
        } else {
            $allTransaksi = $bastPeminjaman->merge($bastPengembalian)->merge($bastPengambilan);
        }

        $allTransaksi = $allTransaksi->map(function ($item, $key) {
            $item['urutan'] = $key + 1;
            return $item;
        });
        return $allTransaksi;
    }

    public function printReport()
    {
        $dateAwal = Carbon::parse($this->date_filter_awal)->format('d-m-Y');
        $dateAkhir = Carbon::parse($this->date_filter_akhir)->format('d-m-Y');

        $report = $this->getAllTransaksi();
        $reportForRow = $report->map(function ($item) {
            return [
                'urutan' => $item['urutan'],
                'no_debitur' => $item['no_debitur'],
                'nama_debitur' => $item['nama_debitur'],
                'jenis' => $item['jenis'],
                'tanggal_buat' => $item['tanggal_buat']->format('d-m-Y'),
            ];
        });

        $data = [
            'date_filter_awal' => $dateAwal,
            'date_filter_akhir' => $dateAkhir,
            'jenis_filter' => $this->jenis_filter == '' ? "semua transaksi" : "transaksi" . $this->jenis_filter
        ];

        $namaFile = "LAPORAN - " . $dateAwal . " - " . $dateAkhir . " - " . strtoupper($this->jenis_filter == '' ? 'SEMUA' : $this->jenis_filter) . ".docx";

        $template = new TemplateProcessor('format/format-laporan.docx');
        $template->setValues($data);
        $template->cloneRowAndSetValues('urutan', $reportForRow->toArray());

        foreach ($report as $key => $item) {
            foreach ($item['dokumen'] as $index => $dok) {
                $replacement = array_map(function ($itemDok) use ($key) {
                    return ['dokumen#' . ($key + 1) => $itemDok];
                }, $item['dokumen']);

                $template->cloneBlock('blok_dokumen#' . ($key + 1), 0, true, false, $replacement);
            }
        }

        $template->saveAs($namaFile);
        return response()->download($namaFile)->deleteFileAfterSend(true);
    }

    public function render()
    {
        return view('livewire.report.report-livewire', [
            'allTransaksi' => $this->getAllTransaksi()
        ]);
    }
}
