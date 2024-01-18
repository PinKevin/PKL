<?php

namespace Database\Factories;

use App\Http\Controllers\DataConverterController;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuratRoya>
 */
class SuratRoyaFactory extends Factory
{
    protected $counter = 1;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $noSuratTengah = 'SMG/LD';
        $month = DataConverterController::bulanToRomawi(date('m'));
        $year = date('Y');

        $cnt = $this->counter++;
        if ($cnt >= 1 && $cnt <= 9) {
            $cnt = '0' . $cnt;
        }

        return [
            'no_surat_depan' => $cnt,
            'no_surat' => "$cnt/$noSuratTengah/$month/$year",
            'tanggal_pelunasan' => fake()->date(),
            'kota_bpn' => fake()->city(),
            'lokasi_kepala_bpn' => fake()->city(),
            'no_agunan' => fake()->numerify('HM. ####'),
            'kelurahan' => fake()->citySuffix(),
            'kecamatan' => fake()->streetSuffix(),
            'no_surat_ukur' => fake()->numerify('SU No. #####/Kota/####/####'),
            'nib' => fake()->numerify('##.##.##.##.####'),
            'luas' => fake()->randomNumber(3),
            'pemilik' => fake()->name(),
            'peringkat_sht' => fake()->randomElement([1, 2]),
            'no_sht' => fake()->numerify('No. ####/####'),
            'tanggal_sht' => fake()->date()
        ];
    }
}
