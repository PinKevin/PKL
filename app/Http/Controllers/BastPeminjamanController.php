<?php

namespace App\Http\Controllers;

use App\Models\BastPeminjaman;
use App\Http\Requests\StoreBastPeminjamanRequest;
use App\Http\Requests\UpdateBastPeminjamanRequest;
use PhpOffice\PhpWord\TemplateProcessor;

class BastPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreBastPeminjamanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BastPeminjaman $bastPeminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BastPeminjaman $bastPeminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBastPeminjamanRequest $request, BastPeminjaman $bastPeminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BastPeminjaman $bastPeminjaman)
    {
        //
    }

    public function cetakBast($id)
    {
        $bastPeminjaman = BastPeminjaman::with(['pemberi', 'peminjam', 'pemberiPerintah'])->findOrFail($id);

        $templateProcessor = new TemplateProcessor('format/format-bast-peminjaman.docx');

        $hariIni = DataConverterController::getHariIndonesia(date('N'));
        $tanggal = date('d');
        $bulan = DataConverterController::getBulanIndonesia(date('m'));
        $tahun = date('Y');


        $data = [
            'hari_ini' => $hariIni,
            'tanggal_sekarang' => "$tanggal $bulan $tahun",
            'pemberi' =>  $bastPeminjaman->pemberi()->first()->nama,
            'staff_notaris' => $bastPeminjaman->peminjam()->first()->nama,
            'notaris' => strtoupper($bastPeminjaman->peminjam()->first()->notaris()->first()->nama_notaris),
            'keperluan' => $bastPeminjaman->keperluan,
            'tanggal_pinjam' => date('d/m/Y'),
            'tanggal_jatuh_tempo' => $bastPeminjaman->tanggal_jatuh_tempo->format('d/m/Y'),
            'pemberi_perintah' => $bastPeminjaman->pemberiPerintah()->first()->nama,
        ];

        $templateProcessor->setValues($data);
        $templateProcessor->saveAs("PEMINJAMAN.docx");
        return response()->download('PEMINJAMAN.docx')->deleteFileAfterSend(true);
    }
}
