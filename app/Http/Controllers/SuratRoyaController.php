<?php

namespace App\Http\Controllers;

use App\Models\SuratRoya;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\StoreSuratRoyaRequest;
use App\Http\Requests\UpdateSuratRoyaRequest;
use Novay\WordTemplate\WordTemplate;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratRoyaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('surat-roya.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat-roya.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuratRoyaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('surat-roya.show', [
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('surat-roya.edit', [
            'id' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuratRoyaRequest $request, SuratRoya $suratRoya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratRoya $suratRoya)
    {
        //
    }

    public function cetakPdf($id)
    {
        $suratRoya = SuratRoya::findOrFail($id);
        $namaFile = "surat_roya_" . strtolower(str_replace(' ', '_', $suratRoya->pemilik)) . ".docx";
        $templateProcessor = new TemplateProcessor('format/format-roya.docx');

        $tanggalPelunasan = $suratRoya->tanggal_pelunasan->format('d');
        $bulanPelunasan = DataConverterController::getBulanIndonesia($suratRoya->tanggal_pelunasan->format('n'));
        $tahunPelunasan = $suratRoya->tanggal_pelunasan->format('Y');

        $peringkatShtHuruf = $suratRoya->peringkat_sht == 1 ? 'Pertama' : 'Kedua';

        // $filePath = public_path('format/format-roya.rtf');

        // dd($suratRoya->no_surat, "$tanggalPelunasan $bulanPelunasan $tahunPelunasan");

        // $data = [
        //     '[no_surat]' => $suratRoya->no_surat,
        //     '[tanggal_surat]' => "$tanggalPelunasan $bulanPelunasan $tahunPelunasan",
        //     '[kota_bpn]' => $suratRoya->kota_bpn,
        //     '[lokasi_kepala_bpn]' => strtoupper($suratRoya->lokasi_kepala_bpn),
        //     '[no_agunan]' => $suratRoya->no_agunan,
        //     '[kelurahan]' => $suratRoya->kelurahan,
        //     '[kecamatan]' => $suratRoya->kecamatan,
        //     '[no_surat_ukur]' => $suratRoya->no_surat_ukur,
        //     '[nib]' => $suratRoya->nib,
        //     '[luas]' => $suratRoya->luas,
        //     '[pemilik]' => $suratRoya->pemilik,
        //     '[peringkat_sht]' => $suratRoya->peringkat_sht,
        //     '[peringkat_sht_huruf]' => $peringkatShtHuruf,
        //     '[no_sht]' => $suratRoya->no_sht,
        //     '[tanggal_sht]' => $suratRoya->tanggal_sht->format('d-m-Y'),
        // ];

        $data = [
            'no_surat' => $suratRoya->no_surat,
            'tanggal_surat' => "$tanggalPelunasan $bulanPelunasan $tahunPelunasan",
            'kota_bpn' => $suratRoya->kota_bpn,
            'lokasi_kepala_bpn' => strtoupper($suratRoya->lokasi_kepala_bpn),
            'no_agunan' => $suratRoya->no_agunan,
            'kelurahan' => $suratRoya->kelurahan,
            'kecamatan' => $suratRoya->kecamatan,
            'no_surat_ukur' => $suratRoya->no_surat_ukur,
            'nib' => $suratRoya->nib,
            'luas' => $suratRoya->luas,
            'pemilik' => $suratRoya->pemilik,
            'peringkat_sht' => $suratRoya->peringkat_sht,
            'peringkat_sht_huruf' => $peringkatShtHuruf,
            'no_sht' => $suratRoya->no_sht,
            'tanggal_sht' => $suratRoya->tanggal_sht->format('d-m-Y'),
        ];

        // $templateProcessor->setValue('no_surat', $suratRoya->noSurat);
        $templateProcessor->setValues($data);
        $templateProcessor->saveAs($namaFile);
        return response()->download($namaFile)->deleteFileAfterSend(true);

        // $wordTemplate = new WordTemplate();

        // return $wordTemplate->export($filePath, $data, $namaFile);

        // $pdf = Pdf::loadView('surat-roya.format', [
        //     'no_surat' => $suratRoya->no_surat,
        //     'tanggal_pelunasan' => "$tanggalPelunasan $bulanPelunasan $tahunPelunasan",
        //     'kota_bpn' => $suratRoya->kota_bpn,
        //     'lokasi_kepala_bpn' => $suratRoya->lokasi_kepala_bpn,
        //     'no_agunan' => $suratRoya->no_agunan,
        //     'kelurahan' => $suratRoya->kelurahan,
        //     'kecamatan' => $suratRoya->kecamatan,
        //     'no_surat_ukur' => $suratRoya->no_surat_ukur,
        //     'nib' => $suratRoya->nib,
        //     'luas' => $suratRoya->luas,
        //     'pemilik' => $suratRoya->pemilik,
        //     'peringkat_sht' => $suratRoya->peringkat_sht,
        //     'peringkat_sht_huruf' => $peringkatShtHuruf,
        //     'no_sht' => $suratRoya->no_sht,
        //     'tanggal_sht' => $suratRoya->tanggal_sht->format('d-m-Y'),
        // ]);
        // return $pdf->stream($namaFile);
    }
}
