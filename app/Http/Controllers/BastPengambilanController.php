<?php

namespace App\Http\Controllers;

use App\Models\BastPengambilan;
use PhpOffice\PhpWord\TemplateProcessor;

class BastPengambilanController extends Controller
{
    public function cetakBast($id)
    {
        $bast = BastPengambilan::findOrFail($id);
        // dd($bast);

        // dokumen yang dipinjam
        $pengambilan = $bast->pengambilan;

        $dokumenDiambil = [];
        $counter = 1;

        foreach ($pengambilan as $p) {
            $jenis = $p->dokumen->jenis;
            $no = $p->dokumen->no_dokumen;
            $tanggal_terbit = $p->dokumen->tanggal_terbit;

            $dokumenDiambil[] = [
                "jenis" => $jenis,
                "no_dokumen" => $no,
                "tanggal_terbit" => $tanggal_terbit,
            ];

            $counter++;
        }

        // end dokumen yang dipinjam

        // tanggal
        $hariIni = DataConverterController::getHariIndonesia(date('N'));

        // end tanggal

        // nama file
        $namaDebitur = strtoupper($bast->debitur->nama_debitur);
        $namaFile = "PENGAMBILAN - $namaDebitur" . ".docx";

        $templateProcessor = new TemplateProcessor('format/format-bast-pengambilan.docx');

        if ($bast->nama_debitur == $bast->nama_pengambil) {
            $templateProcessor->cloneBlock('blok_pengambil', 0, true, false, null);
        } else {
            $templateProcessor->cloneBlock('blok_pengambil', 1, true);
        }

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
            'pengambil' => $bast->pengambil,
            'pemberi' => auth()->user()->nama,
            'nip_pemberi' => auth()->user()->nip
        ];

        $templateProcessor->setValues($data);
        $templateProcessor->cloneBlock('blok_dokumen', 0, true, false, $dokumenDiambil);

        $templateProcessor->saveAs($namaFile);
        return response()->download($namaFile)->deleteFileAfterSend(true);
    }
}
