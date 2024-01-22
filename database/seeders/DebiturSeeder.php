<?php

namespace Database\Seeders;

use App\Models\Debitur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DebiturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Debitur::factory(10)->create();
    }
}
