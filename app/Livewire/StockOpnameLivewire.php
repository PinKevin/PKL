<?php

namespace App\Livewire;

use App\Models\Debitur;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class StockOpnameLivewire extends Component
{
    use WithPagination;
    public $nama_filter;

    public function debiturWithDokumenTersedia()
    {
        $nama_filter = $this->nama_filter;

        $debiturWithDokumen = Debitur::with('dokumen')
            ->where(function ($query) use ($nama_filter) {
                $query->where('sudah_lunas', 0)
                    ->where(function ($query) use ($nama_filter) {
                        $query->where('nama_debitur', 'like', '%' . trim($nama_filter) . '%')
                            ->orWhere('no_debitur', 'like', '%' . trim($nama_filter) . '%');
                    });
            })
            ->get();

        $debiturWithDokumenTersedia = $debiturWithDokumen->map(function ($debitur) {
            $debitur->dokumen = $debitur->dokumen->filter(function ($dokumen) {
                return $dokumen->status_pinjaman == 0  && $dokumen->status_keluar == 0;
            });
            return $debitur;
        });

        return $debiturWithDokumenTersedia->values();
    }

    public function printReport()
    {
        $data = $this->debiturWithDokumenTersedia();

        if ($data) {
            $data = $data->values();

            $spreadsheet = IOFactory::load('format/format-stock-opname.xlsx');
            $worksheet = $spreadsheet->getActiveSheet();

            $todayDate = now()->format('d-m-Y');

            $worksheet->setCellValue("E2", $todayDate);
            $worksheet->getStyle('E2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            $endOfBorder = 0;

            $startRow = 5;
            foreach ($data as $index => $debitur) {
                if (!$debitur->sudah_lunas) {
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
                        $worksheet->setCellValue("E" . ($startRow + $key), $dok->created_at->format('d-m-Y'));
                    }

                    $startRow += $dokumenCount;

                    if ($isLastIteration) {
                        $endOfBorder = $endRow;
                    }
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

            $fileName = "STOCK OPNAME - $todayDate.xlsx";
            $writer->save($fileName);

            return response()->download($fileName)->deleteFileAfterSend(true);
        }
    }

    public function render()
    {
        $debiturWithDokumenTersedia = $this->debiturWithDokumenTersedia();
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $debiturWithDokumenTersedia->slice(($currentPage - 1) * $perPage, $perPage);
        $paginator = new LengthAwarePaginator($currentItems, $debiturWithDokumenTersedia->count(), $perPage, $currentPage);

        return view('livewire.stock-opname.stock-opname-livewire', [
            'allDebitur' => $currentItems,
            'paginator' => $paginator
        ]);
    }
}
