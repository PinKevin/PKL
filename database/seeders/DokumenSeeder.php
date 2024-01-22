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
            $namaFile = "sertipikat_" . strtolower(str_replace(' ', '_', $debitur->nama_debitur)) . ".pdf";

            Dokumen::create([
                'jenis' => 'Sertipikat',
                'no_dokumen' => fake()->numerify('#######'),
                'tanggal_terima' => fake()->date(),
                'tanggal_terbit' => fake()->date(),
                'tanggal_jatuh_tempo' => fake()->date(),
                'file' => $namaFile,
                'status_pinjaman' => fake()->randomElement([0, 1]),
                'debitur_id' => $debitur->id
            ]);
        });
    }
}
