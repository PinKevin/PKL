<?php

namespace App\Livewire;

use App\Models\Debitur;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

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
    }

    public function printReport()
    {
        $data = $this->allDokumenDipinjam();

        if ($data) {
            $data = $data->values();

            $spreadsheet = IOFactory::load('format/format-report-peminjaman.xlsx');
            $worksheet = $spreadsheet->getActiveSheet();

            $todayDate = now()->format('d-m-Y');

            $worksheet->setCellValue("E2", $todayDate);

            $endOfBorder = 0;

            $startRow = 5;
            foreach ($data as $index => $debitur) {
                $dokumen = $debitur->dokumen->values();
                $dokumenCount = count($dokumen);

                $isLastIteration = $index === count($data) - 1;

                $worksheet->setCellValue("A$startRow", $index + 1);
                $worksheet->setCellValueExplicit("B$startRow", $debitur->no_debitur, DataType::TYPE_STRING);
                $worksheet->setCellValue("C$startRow", $debitur->nama_debitur);

                $endRow = $startRow + $dokumenCount - 1;

                $worksheet->mergeCells("A$startRow:A" . ($endRow));
                $worksheet->mergeCells("B$startRow:B" . ($endRow));
                $worksheet->mergeCells("C$startRow:C" . ($endRow));

                foreach ($dokumen as $key => $dok) {
                    $worksheet->setCellValue("D" . ($startRow + $key), $dok->jenis);
                    $worksheet->setCellValue("E" . ($startRow + $key), $dok->tanggal_pinjam);
                    $worksheet->setCellValue("F" . ($startRow + $key), $dok->tanggal_jatuh_tempo);
                }

                $startRow += $dokumenCount;

                if ($isLastIteration) {
                    $endOfBorder = $endRow;
                }
            }

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER
                ]
            ];

            $worksheet->getStyle('A4:F' . $endOfBorder)->applyFromArray($styleArray);

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

            $fileName = "REPORT - PEMINJAMAN - $todayDate.xlsx";
            $writer->save($fileName);

            return response()->download($fileName)->deleteFileAfterSend(true);
        }
    }

    public function render()
    {
        return view('livewire.report-peminjaman.report-peminjaman-livewire', [
            'allDebitur' => $this->allDokumenDipinjam()
        ]);
    }
}
