<?php

namespace App\Livewire;

use App\Models\Debitur;
use App\Models\Dokumen;
use Livewire\Component;
use Livewire\WithFileUploads;

class PenerimaanDokumenLivewire extends Component
{
    use WithFileUploads;

    public $id, $jenis, $no_dokumen, $tanggal_terima, $tanggal_terbit, $tanggal_jatuh_tempo;
    public $status_pinjaman, $file, $withFile;
    public $no_debitur;
    // public $debiturInfo, $dokumen;
    public $debitur;

    public function rules()
    {
        return [
            'jenis' => 'required',
            'no_dokumen' => 'required',
            'tanggal_terima' => 'required|date',
            'tanggal_terbit' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date',
            'file' => 'required|file|mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'date' => ':attribute harus berupa tanggal!',
            'file' => ':attribute harus berupa file!',
            'mimes' => ':attribute harus berupa :values'
        ];
    }

    public function validationAttributes()
    {
        return [
            'jenis' => 'Jenis',
            'no_dokumen' => 'Nomor dokumen',
            'tanggal_terima' => 'Tanggal terima',
            'tanggal_terbit' => 'Tanggal terbit',
            'tanggal_jatuh_tempo' => 'Tanggal jatuh tempo',
            'file' => 'File',
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

    public function createDokumen($jenis)
    {
        $this->resetInput();
        $this->jenis = $jenis;
    }

    public function storeDokumen()
    {
        $this->validate();

        // $debitur = Debitur::where('id', $this->debiturResult->id)->select('nama_debitur')->first();
        $namaDebitur = $this->debitur->nama_debitur;
        $idDebitur = $this->debitur->id;

        $namaFile = strtolower(str_replace(' ', '_', $this->jenis)) . "_" . strtolower(str_replace(' ', '_', $namaDebitur)) . ".pdf";
        $path_file = $this->file->storeAs(strtolower(str_replace(' ', '_', $this->jenis)), $namaFile);

        Dokumen::create([
            'jenis' => $this->jenis,
            'debitur_id' => $idDebitur,
            'no_dokumen' => $this->no_dokumen,
            'tanggal_terima' => $this->tanggal_terima,
            'tanggal_terbit' => $this->tanggal_terbit,
            'tanggal_jatuh_tempo' => $this->tanggal_jatuh_tempo,
            'file' => $path_file,
            'status_pinjaman' => 0,
        ]);

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Dokumen berhasil ditambahkan!');
    }

    public function resetInput()
    {
        $this->id = '';
        $this->jenis = '';
        $this->no_dokumen = '';
        $this->tanggal_terima = '';
        $this->tanggal_terbit = '';
        $this->tanggal_jatuh_tempo = '';
        $this->file = '';
        $this->status_pinjaman = 0;
        $this->withFile = FALSE;
    }

    public function render()
    {

        return view('livewire.penerimaan-dokumen.penerimaan-dokumen-livewire', [
            'debitur' => $this->debitur(),
            'dokumen' => $this->indexDokumen()
        ]);
    }
}
