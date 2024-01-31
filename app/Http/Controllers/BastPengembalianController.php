<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BastPengembalian;
use PhpOffice\PhpWord\TemplateProcessor;

class BastPengembalianController extends Controller
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
    public function show(BastPengembalian $bastPengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BastPengembalian $bastPengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BastPengembalian $bastPengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BastPengembalian $bastPengembalian)
    {
        //
    }

    public function cetakBast($id)
    {
        $bastPengembalian = BastPengembalian::findOrFail($id);

        // dokumen yang dipinjam
        $pengembalian = $bastPengembalian->pengembalian;
        // dd($pengembalian);

        $dokumenDipinjam = [];
        $counter = 1;

        foreach ($pengembalian as $p) {
            $jenis = $p->dokumen->jenis;
            // dd($jenis);
            $no = $p->dokumen->no_dokumen;
            $pemilik = $p->dokumen->debitur->nama_debitur;
            $no_debitur = $p->dokumen->debitur->no_debitur;

            $dokumenDipinjam[] = [
                "no_tabel" => $counter,
                "jenis" => "$jenis No. $no",
                "pemilik" => $pemilik,
                "no_debitur" => $no_debitur,
            ];

            // if ($p->dokumen->jenis == 'SHT') {
            //     $suratRoya = SuratRoya::where('bast_peminjaman_id', $bastPengembalian->id)->first();
            //     $noSuratRoya = $suratRoya->no_surat;

            //     $dokumenDipinjam[] = [
            //         "no_tabel" => $counter,
            //         "jenis" => "Surat Roya No. $noSuratRoya",
            //         "pemilik" => $suratRoya->pemilik,
            //         "no_debitur" => $no_debitur,
            //     ];
            // }
            $counter++;
        }

        // end dokumen yang dipinjam

        // dokumen menunjuk
        $pendukung = explode("\n", $bastPengembalian->pendukung);
        $pendukung = array_filter($pendukung);

        foreach ($pendukung as $key => $kalimat) {
            $pendukung[$key] = preg_replace('/^\s*\d+\.\s*/', '', $kalimat);
        }

        $hasil = array_map(function ($teks) {
            return ["penunjuk" => $teks];
        }, $pendukung);

        // end dokumen menunjuk

        // tanggal
        $hariIni = DataConverterController::getHariIndonesia(date('N'));
        $tanggal = date('d');
        $bulan = DataConverterController::getBulanIndonesia(date('m'));
        $tahun = date('Y');

        // end tanggal

        // nama file
        $namaDebitur = strtoupper($pengembalian->first()->dokumen->debitur->nama_debitur);
        $peminta = strtoupper($bastPengembalian->peminta()->first()->nama);
        $namaFile = "PENGEMBALIAN - $peminta - $namaDebitur" . ".docx";

        $templateProcessor = new TemplateProcessor('format/format-bast-pengembalian.docx');

        $data = [
            'hari_ini' => $hariIni,
            'tanggal_sekarang' => "$tanggal $bulan $tahun",
            'penerima' =>  strtoupper($bastPengembalian->penerima()->first()->nama),
            'staff_notaris' => strtoupper($bastPengembalian->peminjam()->first()->nama),
            'notaris' => strtoupper($bastPengembalian->peminjam()->first()->notaris()->first()->nama_notaris),
            'keperluan' => $bastPengembalian->keperluan,
            // 'tanggal_pinjam' => date('d/m/Y'),
            // 'tanggal_jatuh_tempo' => $bastPengembalian->tanggal_jatuh_tempo->format('d/m/Y'),
            'tanggal_kembali' => $bastPengembalian->tanggal_kembali->format('d/m/Y'),
            'pemberi_perintah' => $peminta,
            'nip' => $bastPengembalian->peminta()->first()->nip,
            'kantor' => $bastPengembalian->peminta()->first()->kantor,
        ];

        $templateProcessor->setValues($data);
        $templateProcessor->cloneRowAndSetValues('no_tabel', $dokumenDipinjam);
        $templateProcessor->cloneBlock('blok_menunjuk', 0, true, false, $hasil);
        $templateProcessor->saveAs($namaFile);
        return response()->download($namaFile)->deleteFileAfterSend(true);
    }
}
