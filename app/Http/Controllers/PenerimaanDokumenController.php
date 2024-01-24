<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use App\Models\Dokumen;
use Illuminate\Http\Request;

class PenerimaanDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penerimaan-dokumen.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $debitur = Debitur::where('nama_debitur', 'like', '%' . trim($search) . '%')
            ->orWhere('no_debitur', 'like', '%' . trim($search) . '%')
            ->first();

        if ($debitur) {
            return redirect()->route('penerimaan.dokumen', ['no_debitur' => $debitur->no_debitur]);
        } else {
            return redirect()->back()->with('pesan', 'Data tidak ada');
        }

        // $dokumen = Dokumen::where('debitur_id', $debitur->id)->get();
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
        $debitur = Debitur::select('id', 'nama_debitur', 'no_debitur')
            ->where('no_debitur',  $no_debitur)
            ->first();

        $dokumen = Dokumen::where('debitur_id', $debitur->id)->get();

        dd($dokumen, $debitur);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumen $dokumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen)
    {
        //
    }
}
