<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use Illuminate\Http\Request;

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
     * Display the specified resource.
     */
    public function show($no_debitur)
    {
        return view('pengembalian-dokumen.show', [
            'no_debitur' => $no_debitur
        ]);
    }
}
