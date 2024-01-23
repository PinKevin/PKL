<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notaris>
 */
class NotarisFactory extends Factory
{

    protected $counter = 1;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_notaris' => $this->counter++,
            'nama_notaris' => fake()->name()
        ];
    }
}
