<?php

namespace Database\Seeders;

use App\Models\Debitur;
use App\Models\Dokumen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Debitur::all()->each(function ($debitur) {
            $this->createDokumen($debitur, 'Sertipikat');
            $this->createDokumen($debitur, 'IMB');
            $this->createDokumen($debitur, 'PK');
            $this->createDokumen($debitur, 'SHT');
        });
    }

    /**
     * Create a new Dokumen record for the given Debitur and jenis.
     *
     * @param \App\Models\Debitur $debitur
     * @param string $jenis
     * @return \App\Models\Dokumen
     */
    private function createDokumen($debitur, $jenis)
    {
        $namaFile = strtolower(str_replace(' ', '_', $debitur->nama_debitur)) . "_" . strtolower($jenis) . ".pdf";

        return Dokumen::create([
            'jenis' => $jenis,
            'no_dokumen' => fake()->numerify('#######'),
            'tanggal_terima' => fake()->date(),
            'tanggal_terbit' => fake()->date(),
            'tanggal_jatuh_tempo' => fake()->date(),
            'file' => $namaFile,
            'status_pinjaman' => 0,
            'status_keluar' => 0,
            'debitur_id' => $debitur->id
        ]);
    }
}
