<?php

namespace App\Http\Controllers;

use App\Models\SuratRoya;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratRoyaController extends Controller
{
    public function cetakWord($id)
    {
        $suratRoya = SuratRoya::findOrFail($id);
        $namaFile = "surat_roya_" . strtolower(str_replace(' ', '_', $suratRoya->pemilik)) . ".docx";
        $templateProcessor = new TemplateProcessor('format/format-roya.docx');

        $tanggalPelunasan = $suratRoya->tanggal_pelunasan->format('d');
        $bulanPelunasan = DataConverterController::getBulanIndonesia($suratRoya->tanggal_pelunasan->format('n'));
        $tahunPelunasan = $suratRoya->tanggal_pelunasan->format('Y');

        $peringkatShtHuruf = $suratRoya->peringkat_sht == 1 ? 'Pertama' : 'Kedua';

        $data = [
            'no_surat' => $suratRoya->no_surat,
            'tanggal_surat' => "$tanggalPelunasan $bulanPelunasan $tahunPelunasan",
            'kota_bpn' => $suratRoya->kota->name,
            'lokasi_kepala_bpn' => strtoupper($suratRoya->lokasi_kepala_bpn),
            'no_agunan' => $suratRoya->no_agunan,
            'kecamatan' => $suratRoya->kecamatan()->where('id', $suratRoya->kecamatan)->first()->name,
            'kelurahan' => $suratRoya->kelurahan()->where('id', $suratRoya->kelurahan)->first()->name,
            'no_surat_ukur' => $suratRoya->no_surat_ukur,
            'nib' => $suratRoya->nib,
            'luas' => $suratRoya->luas,
            'pemilik' => $suratRoya->pemilik,
            'peringkat_sht' => $suratRoya->peringkat_sht,
            'peringkat_sht_huruf' => $peringkatShtHuruf,
            'no_sht' => $suratRoya->no_sht,
            'tanggal_sht' => $suratRoya->tanggal_sht->format('d-m-Y'),
        ];

        $templateProcessor->setValues($data);
        $templateProcessor->saveAs($namaFile);
        return response()->download($namaFile)->deleteFileAfterSend(true);
    }
}
