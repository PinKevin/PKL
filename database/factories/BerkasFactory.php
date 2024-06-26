<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berkas>
 */
class BerkasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_debitur' => fake()->unique()->name(),
            'no_debitur' => fake()->unique()->numerify('#############'),
            'tanggal_pengambilan' => fake()->date()
        ];
    }
}
