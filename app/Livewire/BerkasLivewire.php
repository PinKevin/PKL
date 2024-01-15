<?php

namespace App\Livewire;

use App\Models\Berkas;
use Livewire\Component;
use Livewire\WithPagination;

class BerkasLivewire extends Component
{
    use WithPagination;

    public $nama, $no_rekening, $file_bukti, $tanggal_pengambilan;

    public function indexBerkas()
    {
        $berkas = Berkas::select('id', 'nama', 'no_rekening')->paginate(10);
        return $berkas;
    }

    public function showBerkas($id)
    {
        $this->resetInput();
        $detailBerkas = Berkas::find($id);

        $this->nama = $detailBerkas->nama;
        $this->no_rekening = $detailBerkas->no_rekening;
        $this->tanggal_pengambilan = $detailBerkas->tanggal_pengambilan;
        $this->file_bukti = $detailBerkas->file_bukti;
    }

    public function resetInput()
    {
        $this->nama = '';
        $this->no_rekening = '';
        $this->tanggal_pengambilan = '';
    }

    public function render()
    {
        return view('livewire.berkas.berkas-livewire', [
            'berkas' => $this->indexBerkas()
        ]);
    }
}
