<?php

namespace App\Http\Controllers;

use App\Models\BastPengambilan;
use Illuminate\Http\Request;

class BastPengambilanController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BastPengambilan $bastPengambilan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BastPengambilan $bastPengambilan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BastPengambilan $bastPengambilan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BastPengambilan $bastPengambilan)
    {
        //
    }

    public function cetakBast($id)
    {
        $bast = BastPengambilan::findOrFail($id);
        // dd($bast);

        // dokumen yang dipinjam
        $pengambilan = $bast->pengambilan;
        // dd($pengambilan);

        $dokumenDiambil = [];
        $counter = 1;

        foreach ($pengambilan as $p) {
            $jenis = $p->dokumen->jenis;
            $no = $p->dokumen->no_dokumen;
            $tanggal_terbit = $p->dokumen->tanggal_terbit;

            $dokumenDiambil[] = [
                "no_tabel" => $counter,
                "jenis" => "$jenis",
                "no" => $no,
                "tanggal_terbit" => $tanggal_terbit,
            ];

            $counter++;
        }

        // end dokumen yang dipinjam
        // dd($dokumenDiambil);


        // tanggal
        $hariIni = DataConverterController::getHariIndonesia(date('N'));
        // dd($tanggal);

        // end tanggal

        // nama file
        $namaDebitur = strtoupper($bast->debitur->nama_debitur);
        $namaFile = "PENGAMBILAN - $namaDebitur" . ".docx";

        // $templateProcessor = new TemplateProcessor('format/format-bast-pengambilan.docx');
        // dd($bast->developer->nama_developer);

        $data = [
            'tanggal_nomor' => date('d-m-Y'),
            'no_debitur' => $bast->debitur->no_debitur,
            'hari_ini' => $hariIni,
            'tanggal_sekarang' => date('d/m/Y'),
            'nama_debitur' => $namaDebitur,
            'alamat_agunan' => $bast->debitur->alamat_agunan,
            'blok' => $bast->debitur->blok,
            'no' => $bast->debitur->no,
            'alamat_ktp' => $bast->debitur->alamat_ktp,
            'tanggal_pelunasan' => $bast->tanggal_pelunasan,
            'nama_developer' => $bast->developer->nama_developer,
            'nama_pengambil' => $bast->nama_pengambil,
            'no_ktp_pengambil' => $bast->no_ktp_pengambil,
        ];

        dd($data);

        // $templateProcessor->setValues($data);
        // $templateProcessor->cloneRowAndSetValues('no_tabel', $dokumenDiambil);
        // $templateProcessor->cloneBlock('blok_menunjuk', 0, true, false, $hasil);
        // $templateProcessor->saveAs($namaFile);
        // return response()->download($namaFile)->deleteFileAfterSend(true);
    }
}
