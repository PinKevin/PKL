<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Debitur>
 */
class DebiturFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_debitur' => fake()->numerify('#############'),
            'nama_debitur' => fake()->name(),
            'tanggal_realisasi' => fake()->date(),
            'jenis_kredit' => fake()->randomElement(['Kredit Setan', 'Kredit2an']),
            'kode_developer' => fake()->randomNumber(2, true),
            'proyek_perumahan' => fake()->word(),
            'kode_notaris' => fake()->numberBetween(1, 10),
            'plafon_kredit' => fake()->randomNumber(6, true),
            'saldo_pokok' => fake()->randomNumber(6, true),
            'blok' => fake()->numerify('A#'),
            'no' => fake()->randomDigit(),
            'luas_tanah' => fake()->randomNumber(3),
            'luas_bangunan' => fake()->randomNumber(3)
        ];
    }
}
