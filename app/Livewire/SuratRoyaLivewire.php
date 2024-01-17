<?php

namespace App\Livewire;

use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithFileUploads;

class SuratRoyaLivewire extends Component
{
    use WithFileUploads;

    public $nama, $no_hp, $pdfUrl;

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

    public function generateSuratRoya()
    {
        $this->validate();

        $pdf = Pdf::loadView('surat-roya.format', [
            'nama' => $this->nama,
            'no_hp' => $this->no_hp,
        ]);

        // $pdf->setOption('isHtml5ParserEnabled', true);
        // $pdf->setOption('isPhpEnabled', true);
        // $pdf->setOption('isFontSubsettingEnabled', true);
        // return $pdf->stream('surat-roya-' . $this->nama . '.pdf');

        $filename = 'surat_roya_' . $this->nama . '.pdf';
        $pdf->save(storage_path('app/public/' . $filename));
        $this->pdfUrl = asset('storage/' . $filename);

        // $pdf->stream('surat-roya-' . $this->nama);

        // return view('surat-roya.format', compact('nama', 'no_hp'));
        // return redirect(route('dashboard'));
        // return redirect()->route('csr', [
        //     'nama' => $nama,
        //     'no_hp' => $no_hp
        // ]);
    }

    public function render()
    {
        return view('livewire.surat-roya.surat-roya-livewire');
    }
}
