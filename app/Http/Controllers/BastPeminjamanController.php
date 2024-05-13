<?php

namespace App\Http\Controllers;

use App\Models\BastPeminjaman;
use App\Models\SuratRoya;
use PhpOffice\PhpWord\TemplateProcessor;

class BastPeminjamanController extends Controller
{

    public function cetakBast($id)
    {
        $bastPeminjaman = BastPeminjaman::findOrFail($id);

        // dokumen yang dipinjam
        $peminjaman = $bastPeminjaman->peminjaman;

        $dokumenDipinjam = [];
        $counter = 1;

        foreach ($peminjaman as $p) {
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

            if ($p->dokumen->jenis == 'SHT') {
                $suratRoya = SuratRoya::where('bast_peminjaman_id', $bastPeminjaman->id)->first();
                $noSuratRoya = $suratRoya->no_surat;

                $dokumenDipinjam[] = [
                    "no_tabel" => $counter,
                    "jenis" => "Surat Roya No. $noSuratRoya",
                    "pemilik" => $suratRoya->pemilik,
                    "no_debitur" => $no_debitur,
                ];
            }
            $counter++;
        }

        // end dokumen yang dipinjam

        // dokumen menunjuk
        $pendukung = explode("\n", $bastPeminjaman->pendukung);
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
        $namaDebitur = strtoupper($peminjaman->first()->dokumen->debitur->nama_debitur);
        $peminta = strtoupper($bastPeminjaman->peminta()->first()->nama);
        $namaFile = "PEMINJAMAN - $peminta - $namaDebitur" . ".docx";

        $templateProcessor = new TemplateProcessor('format/format-bast-peminjaman.docx');

        $data = [
            'hari_ini' => $hariIni,
            'tanggal_sekarang' => "$tanggal $bulan $tahun",
            'pemberi' =>  strtoupper($bastPeminjaman->pemberi()->first()->nama),
            'staff_notaris' => strtoupper($bastPeminjaman->peminjam()->first()->nama),
            'notaris' => strtoupper($bastPeminjaman->peminjam()->first()->notaris()->first()->nama_notaris),
            'keperluan' => $bastPeminjaman->keperluan,
            'tanggal_pinjam' => date('d/m/Y'),
            'tanggal_jatuh_tempo' => $bastPeminjaman->tanggal_jatuh_tempo->format('d/m/Y'),
            'pemberi_perintah' => $peminta,
            'nip' => $bastPeminjaman->peminta()->first()->nip,
            'kantor' => $bastPeminjaman->peminta()->first()->kantor,
        ];

        $templateProcessor->setValues($data);
        $templateProcessor->cloneRowAndSetValues('no_tabel', $dokumenDipinjam);
        $templateProcessor->cloneBlock('blok_menunjuk', 0, true, false, $hasil);
        $templateProcessor->saveAs($namaFile);
        return response()->download($namaFile)->deleteFileAfterSend(true);
    }
}
