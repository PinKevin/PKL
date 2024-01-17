<?php

namespace Database\Seeders;

use App\Models\SuratRoya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratRoyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SuratRoya::factory(10)->create();
    }
}
