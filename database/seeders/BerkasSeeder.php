<?php

namespace Database\Seeders;

use App\Models\Berkas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berkas::factory(60)->create();
    }
}
