<?php

namespace App\Livewire;

use App\Models\Notaris;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class NotarisLivewire extends Component
{
    use WithPagination;

    public $id, $kode_notaris, $nama_notaris;

    public $search = '';

    public $sortBy = 'kode_notaris';
    public $sortDirection = 'asc';


    public function indexNotaris()
    {
        $notaris = Notaris::select('id', 'kode_notaris', 'nama_notaris')
            ->where('nama_notaris', 'like', '%' . trim($this->search) . '%')
            ->orWhere('kode_notaris', 'like', '%' . trim($this->search) . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return $notaris;
    }

    public function render()
    {
        return view('livewire.notaris.notaris-livewire', [
            'notaris'=> $this->indexNotaris()
        ]);
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi!',
            'numeric' => ':attribute harus berupa numerik!',
            'digits' => ':attribute harus terdiri atas :digits digit!',
            'unique' => ':attribute sudah ada di dalam database!',
            'min' => ':attribute minimal terdiri atas :min karakter!',
            'string' => ':attribute hanya terdiri atas huruf!',
        ];
    }

    public function validationAttributes()
    {
        return [
            'kode_notaris' => 'Kode notaris',
            'nama_notaris' =>  'Nama notaris'
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

    public function createNotaris()
    {
        $this->validate();

        DB::transaction(function () {
            Notaris::create([
                'kode_notaris' => $this->kode_notaris,
                'nama_notaris' => $this->nama_notaris,
            ]);
        });

        $this->resetInput();
        $this->dispatch('closeCreateModal');
        session()->flash('storeSuccess', 'Notaris berhasil dibuat!');
    }

    public function editNotaris($id)
    {
        $this->resetInput();
        $notaris = Notaris::findOrFail($id);

        $this->id = $notaris->id;
        $this->kode_notaris = $notaris->kode_notaris;
        $this->nama_notaris = $notaris->nama_notaris;
    }

    public function updateNotaris()
    {
        $this->validateOnly('nama_notaris');

        DB::transaction(function () {
            Notaris::where('id', $this->id)->update([
                'nama_notaris' => $this->nama_notaris,
            ]);
        });

        $this->resetInput();
        $this->dispatch('closeEditModal');
        session()->flash('updateSuccess', 'Notaris berhasil diubah!');
    }

    public function deleteNotaris($id)
    {
        $this->resetInput();
        $notaris = Notaris::findOrFail($id);

        $this->id = $notaris->id;
        $this->nama_notaris = $notaris->nama_notaris;
    }

    // public function destroyNotaris()
    // {
    //     $countDokumen = Dokumen::where('debitur_id', $this->id)->count();

    //     if ($countDokumen > 0) {
    //         $this->resetInput();
    //         $this->dispatch('scrollToTop');
    //         session()->flash('deleteError', 'Terdapat dokumen yang terkait dengan data tersebut!');
    //     } else {
    //         DB::transaction(function () {
    //             Debitur::where('id', $this->id)->delete();
    //         });

    //         $this->resetInput();
    //         $this->dispatch('scrollToTop');
    //         session()->flash('deleteSuccess', 'Debitur berhasil dihapus!');
    //     }
    // }

    public function resetInput()
    {
        $this->id = '';
        $this->kode_notaris = '';
        $this->nama_notaris = '';
    }

    public function rules()
    {
        return [
            'kode_notaris' => 'required',
            'nama_notaris' => 'required',
            
        ];
    }
}
