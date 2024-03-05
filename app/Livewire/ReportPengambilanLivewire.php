<?php

namespace App\Livewire;

use App\Models\Debitur;
use Livewire\Component;
use Livewire\WithPagination;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Pagination\LengthAwarePaginator;

class ReportPengambilanLivewire extends Component
{
    use WithPagination;
    public $nama_filter;

    public function debiturWithDokumenDiambil()
    {
        $debiturWithDokumen = Debitur::with('dokumen.pengambilan.bastPengambilan')
            ->where('nama_debitur', 'like', '%' . trim($this->nama_filter) . '%')
            ->orWhere('no_debitur', 'like', '%' . trim($this->nama_filter) . '%')
            ->get();

        $debiturWithDokumenDiambil = $debiturWithDokumen->map(function ($debitur) {
            $debitur->dokumen = $debitur->dokumen->filter(function ($dokumen) {
                return $dokumen->status_keluar == 1;
            })->map(function ($dokumen) {
                $latestPengambilan = $dokumen->pengambilan->sortByDesc('bast_pengambilan_id')->first();

                if ($latestPengambilan && $latestPengambilan->bastPengambilan) {
                    $dokumen->tanggal_diambil = optional($latestPengambilan)->bastPengambilan->created_at->format('d-m-Y');
                    return $dokumen;
                }
            });
            return $debitur;
        })->reject(function ($debitur) {
            return $debitur->dokumen->isEmpty();
        });
        return $debiturWithDokumenDiambil;
    }

    public function printReport()
    {
        $data = $this->debiturWithDokumenDiambil();

        if ($data) {
            $data = $data->values();

            $spreadsheet = IOFactory::load('format/format-report-pengambilan.xlsx');
            $worksheet = $spreadsheet->getActiveSheet();

            $todayDate = now()->format('d-m-Y');

            $worksheet->setCellValue("E2", $todayDate);
            $worksheet->getStyle('E2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

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
                    $worksheet->setCellValue("E" . ($startRow + $key), $dok->tanggal_diambil);
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

            $worksheet->getStyle('A4:E' . $endOfBorder)->applyFromArray($styleArray);

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

            $fileName = "REPORT - PENGAMBILAN - $todayDate.xlsx";
            $writer->save($fileName);

            return response()->download($fileName)->deleteFileAfterSend(true);
        }
    }

    public function render()
    {
        $debiturWithDokumenDiambil = $this->debiturWithDokumenDiambil();
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $debiturWithDokumenDiambil->slice(($currentPage - 1) * $perPage, $perPage);
        $paginator = new LengthAwarePaginator($currentItems, $debiturWithDokumenDiambil->count(), $perPage, $currentPage);

        return view('livewire.report-pengambilan.report-pengambilan-livewire', [
            'allDebitur' => $currentItems,
            'paginator' => $paginator
        ]);
    }
}
