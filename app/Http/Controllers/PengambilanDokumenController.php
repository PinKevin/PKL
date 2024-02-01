<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use App\Models\Pengambilan;
use Illuminate\Http\Request;

class PengambilanDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengambilan-dokumen.index');
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
            return redirect()->route('pengambilan.pengambilan', ['no_debitur' => $debitur->no_debitur]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($no_debitur)
    {
        return view('pengambilan-dokumen.show', [
            'no_debitur' => $no_debitur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengambilan $pengambilan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengambilan $pengambilan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengambilan $pengambilan)
    {
        //
    }
}
