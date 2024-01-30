<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use Illuminate\Http\Request;
use App\Models\PengembalianDokumen;
use App\Http\Requests\StorePengembalianDokumenRequest;
use App\Http\Requests\UpdatePengembalianDokumenRequest;

class PengembalianDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengembalian-dokumen.index');
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required'
        ], [
            'required' => ':attribute harus diisi!'
        ], [
            'search' => 'Kotak pencarian'
        ]);

        $search = $request->input('search');

        $debitur = Debitur::where('nama_debitur', 'like', '%' . trim($search) . '%')
            ->orWhere('no_debitur', 'like', '%' . trim($search) . '%')
            ->first();

        if ($debitur) {
            return redirect()->route('pengembalian.pengembalian', ['no_debitur' => $debitur->no_debitur]);
        } else {
            return redirect()->back()->with('pesan', 'Data tidak ada')->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StorePengembalianDokumenRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show($no_debitur)
    {
        return view('pengembalian-dokumen.show', [
            'no_debitur' => $no_debitur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(PengembalianDokumen $pengembalianDokumen)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdatePengembalianDokumenRequest $request, PengembalianDokumen $pengembalianDokumen)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(PengembalianDokumen $pengembalianDokumen)
    // {
    //     //
    // }
}
