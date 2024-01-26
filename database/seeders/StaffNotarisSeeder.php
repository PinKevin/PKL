<?php

namespace Database\Seeders;

use App\Models\StaffNotaris;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffNotarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StaffNotaris::factory(20)->create();
    }
}
