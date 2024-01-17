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

    public $id, $nama_debitur, $no_debitur, $file_bukti, $tanggal_pengambilan;
    public $withFile = FALSE;

    public $search = '';

    public $sortBy = 'nama_debitur';
    public $sortDirection = 'asc';

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'min' => ':attribute minimal terdiri atas :min karakter!',
            'size' => ':attribute harus terdiri atas :size karakter!',
            'string' => ':attribute hanya terdiri atas huruf!',
            'unique' => ':attribute sudah ada di dalam database!',
            'date' => ':attribute harus berupa tanggal!',
            'file' => ':attribute harus berupa file!',
            'mimes' => ':attribute harus berupa PDF!',
            'numeric' => ':attribute harus berupa numerik!',
            'digits' => ':attribute harus terdiri atas :digits digit!'
        ];
    }

    public function validationAttributes()
    {
        return [
            'nama_debitur' =>  'Nama debitur',
            'no_debitur' => 'Nomor debitur',
            'tanggal_pengambilan' => 'Tanggal pengambilan',
            'file_bukti' => 'Bukti pengambilan'
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

    public function indexBerkas()
    {
        $berkas = Berkas::select('id', 'nama_debitur', 'no_debitur', 'tanggal_pengambilan')
            ->where('nama_debitur', 'like', '%' . trim($this->search) . '%')
            ->orWhere('no_debitur', 'like', '%' . trim($this->search) . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return $berkas;
    }

    public function createBerkas()
    {
        if ($this->withFile == TRUE) {
            $this->validate([
                'nama_debitur' => 'required|min:5|string',
                'no_debitur' => 'required|numeric|digits:13|unique:berkas,no_debitur',
                'tanggal_pengambilan' => 'required|date',
                'file_bukti' => 'required|file|mimes:pdf'
            ]);

            $namaFile = "bukti_" . strtolower(str_replace(' ', '_', $this->nama_debitur)) . ".pdf";
            $path_file = $this->file_bukti->storeAs('file_bukti', $namaFile);

            Berkas::create([
                'nama_debitur' => $this->nama_debitur,
                'no_debitur' => $this->no_debitur,
                'tanggal_pengambilan' => $this->tanggal_pengambilan,
                'file_bukti' => $path_file,
            ]);
        } else {
            $this->validate([
                'nama_debitur' => 'required|min:5|string',
                'no_debitur' => 'required|numeric|digits:13|unique:berkas,no_debitur',
                'tanggal_pengambilan' => 'required|date'
            ]);

            Berkas::create([
                'nama_debitur' => $this->nama_debitur,
                'no_debitur' => $this->no_debitur,
                'tanggal_pengambilan' => $this->tanggal_pengambilan
            ]);
        }

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Berkas berhasil ditambahkan!');
    }

    public function showBerkas($id)
    {
        $this->resetInput();
        $detailBerkas = Berkas::find($id);

        $this->nama_debitur = $detailBerkas->nama_debitur;
        $this->no_debitur = $detailBerkas->no_debitur;
        $this->tanggal_pengambilan = $detailBerkas->tanggal_pengambilan->format('Y-m-d');
        $this->file_bukti = $detailBerkas->file_bukti;
    }

    public function editBerkas($id)
    {
        $this->resetInput();
        $detailBerkas = Berkas::where('id', $id)
            ->select('id', 'nama_debitur', 'no_debitur', 'tanggal_pengambilan')
            ->first();

        $this->id = $detailBerkas->id;
        $this->nama_debitur = $detailBerkas->nama_debitur;
        $this->no_debitur = $detailBerkas->no_debitur;
        $this->tanggal_pengambilan = $detailBerkas->tanggal_pengambilan->format('Y-m-d');
    }

    public function updateBerkas()
    {
        if ($this->withFile) {
            $this->validate([
                'nama_debitur' => 'required|min:5|string',
                'tanggal_pengambilan' => 'required|date',
                'file_bukti' => 'required|file|mimes:pdf'
            ]);

            $namaFile = "bukti_" . strtolower(str_replace(' ', '_', $this->nama_debitur)) . ".pdf";
            $path_file = $this->file_bukti->storeAs('file_bukti', $namaFile);


            Berkas::where('id', $this->id)
                ->update([
                    'nama_debitur' => $this->nama_debitur,
                    'tanggal_pengambilan' => $this->tanggal_pengambilan,
                    'file_bukti' => $path_file
                ]);
        } else {
            $this->validate([
                'nama_debitur' => 'required|min:5|string',
                'tanggal_pengambilan' => 'required|date'
            ]);

            Berkas::where('id', $this->id)
                ->update([
                    'nama_debitur' => $this->nama_debitur,
                    'tanggal_pengambilan' => $this->tanggal_pengambilan
                ]);
        }

        $this->resetInput();
        $this->dispatch('closeEditModal');
        session()->flash('updateSuccess', 'Berkas berhasil diubah!');
    }

    public function deleteBerkas($id)
    {
        $this->resetInput();
        $detailBerkas = Berkas::where('id', $id)
            ->select('id', 'nama_debitur')
            ->first();

        $this->id = $detailBerkas->id;
        $this->nama_debitur = $detailBerkas->nama_debitur;
    }

    public function destroyBerkas()
    {
        Berkas::where('id', $this->id)->delete();
        $this->resetInput();
        $this->dispatch('scrollToTop');
        session()->flash('deleteSuccess', 'Berkas berhasil dihapus!');
    }

    public function resetInput()
    {
        $this->id = '';
        $this->nama_debitur = '';
        $this->no_debitur = '';
        $this->tanggal_pengambilan = '';
        $this->file_bukti = '';
        $this->withFile = FALSE;
    }

    public function render()
    {
        return view('livewire.berkas.berkas-livewire', [
            'berkas' => $this->indexBerkas()
        ]);
    }
}
