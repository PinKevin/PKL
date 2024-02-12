<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use Illuminate\Http\Request;

class RekapDokumenController extends Controller
{
    public function index()
    {
        return view('rekap-dokumen.index');
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required'
        ], [
            'required' => ':attribute harus diisi!'
        ], [
            'search' => 'Kolom pencarian'
        ]);

        $search = $request->input('search');

        $debitur = Debitur::where('nama_debitur', 'like', '%' . trim($search) . '%')
            ->orWhere('no_debitur', 'like', '%' . trim($search) . '%')
            ->first();

        if ($debitur) {
            return redirect()->route('rekap-dokumen.show', ['no_debitur' => $debitur->no_debitur]);
        } else {
            return redirect()->back()->with('pesan', 'Data tidak ada')->withInput();
        }
    }

    public function show($no_debitur)
    {
        return view('rekap-dokumen.show', [
            'no_debitur' => $no_debitur
        ]);
    }
}
