<?php

namespace App\Livewire;

use App\Models\Berkas;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class BerkasLivewire extends Component
{
    use WithPagination, WithFileUploads;

    public $nama, $no_rekening, $file_bukti, $tanggal_pengambilan;

    public function rules()
    {
        return [
            'nama' => 'required|min:5|string',
            'no_rekening' => 'required|min:5|unique:berkas,no_rekening',
            'tanggal_pengambilan' => 'required|date',
            'file_bukti' => 'required|file|mimes:pdf'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'min' => ':attribute harus terdiri atas :min karakter!',
            'string' => ':attribute hanya terdiri atas huruf!',
            'unique' => ':attribute sudah ada di dalam database!',
            'date' => ':attribute harus berupa tanggal!',
            'file' => ':attribute harus berupa file!',
            'mimes' => ':attribute harus berupa PDF!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'nama' => 'Nama debitur',
            'no_rekening' => 'Nomor debitur',
            'tanggal_pengambilan' => 'Tanggal pengambilan',
            'file_bukti' => 'Bukti pengambilan'
        ];
    }

    public function indexBerkas()
    {
        $berkas = Berkas::select('id', 'nama', 'no_rekening')->paginate(10);
        return $berkas;
    }

    public function createBerkas()
    {
        $this->validate();

        $namaFile = "bukti_" . strtolower(str_replace(' ', '_', $this->nama)) . ".pdf";
        $this->file_bukti->storeAs('file_bukti', $namaFile);

        Berkas::create([
            'nama' => $this->nama,
            'no_rekening' => $this->no_rekening,
            'tanggal_pengambilan' => $this->tanggal_pengambilan,
            'file_bukti' => $namaFile,
        ]);

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Berkas berhasil ditambahkan!');
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
