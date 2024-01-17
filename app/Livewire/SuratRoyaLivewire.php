<?php

namespace App\Livewire;

use App\Models\SuratRoya;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class SuratRoyaLivewire extends Component
{
    use WithPagination, WithFileUploads;

    // public $kota_bpn, $no_hp, $pdfUrl;

    public $search = '';

    public $sortBy = 'pemilik';
    public $sortDirection = 'asc';

    public function rules()
    {
        return [
            'nama' => 'required',
            'no_hp' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'nama' =>  'Nama',
            'no_hp' => 'Nomor HP',
        ];
    }

    public function sortResult($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function indexSuratRoya()
    {
        $suratRoya = SuratRoya::select('id', 'pemilik', 'no_surat', 'created_at')
            ->where('pemilik', 'like', '%' . trim($this->search) . '%')
            ->orWhere('no_surat', 'like', '%' . trim($this->search) . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return $suratRoya;
    }

    // public function generateSuratRoya()
    // {
    //     $this->validate();

    //     $pdf = Pdf::loadView('surat-roya.format', [
    //         'nama' => $this->nama,
    //         'no_hp' => $this->no_hp,
    //     ]);

    //     // $pdf->setOption('isHtml5ParserEnabled', true);
    //     // $pdf->setOption('isPhpEnabled', true);
    //     // $pdf->setOption('isFontSubsettingEnabled', true);
    //     // return $pdf->stream('surat-roya-' . $this->nama . '.pdf');

    //     $filename = 'surat_roya_' . $this->nama . '.pdf';
    //     $pdf->save(storage_path('app/public/' . $filename));
    //     $this->pdfUrl = asset('storage/' . $filename);

    //     // $pdf->stream('surat-roya-' . $this->nama);

    //     // return view('surat-roya.format', compact('nama', 'no_hp'));
    //     // return redirect(route('dashboard'));
    //     // return redirect()->route('csr', [
    //     //     'nama' => $nama,
    //     //     'no_hp' => $no_hp
    //     // ]);
    // }

    public function render()
    {
        return view('livewire.surat-roya.surat-roya-livewire', [
            'suratRoya' => $this->indexSuratRoya()
        ]);
    }
}
