<?php

namespace App\Http\Controllers;

use App\Models\BastPengembalian;
use PhpOffice\PhpWord\TemplateProcessor;

class BastPengembalianController extends Controller
{
    public function cetakBast($id)
    {
        $bastPengembalian = BastPengembalian::findOrFail($id);

        // dokumen yang dipinjam
        $pengembalian = $bastPengembalian->pengembalian;

        $dokumenDipinjam = [];
        $counter = 1;

        foreach ($pengembalian as $p) {
            $jenis = $p->dokumen->jenis;
            $no = $p->dokumen->no_dokumen;
            $pemilik = $p->dokumen->debitur->nama_debitur;
            $no_debitur = $p->dokumen->debitur->no_debitur;

            $dokumenDipinjam[] = [
                "no_tabel" => $counter,
                "jenis" => "$jenis No. $no",
                "pemilik" => $pemilik,
                "no_debitur" => $no_debitur,
            ];

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
        $namaFile = "PENGEMBALIAN - $namaDebitur" . ".docx";

        $templateProcessor = new TemplateProcessor('format/format-bast-pengembalian.docx');

        $data = [
            'hari_ini' => $hariIni,
            'tanggal_sekarang' => "$tanggal $bulan $tahun",
            'penerima' =>  strtoupper($bastPengembalian->penerima()->first()->nama),
            'staff_notaris' => strtoupper($bastPengembalian->peminjam()->first()->nama),
            'notaris' => strtoupper($bastPengembalian->peminjam()->first()->notaris()->first()->nama_notaris),
            'keperluan' => $bastPengembalian->keperluan,
            'tanggal_kembali' => $bastPengembalian->tanggal_kembali->format('d/m/Y'),
        ];

        $templateProcessor->setValues($data);
        $templateProcessor->cloneRowAndSetValues('no_tabel', $dokumenDipinjam);
        $templateProcessor->cloneBlock('blok_menunjuk', 0, true, false, $hasil);
        $templateProcessor->saveAs($namaFile);
        return response()->download($namaFile)->deleteFileAfterSend(true);
    }
}
