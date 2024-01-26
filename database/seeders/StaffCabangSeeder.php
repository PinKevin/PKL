<?php

namespace Database\Seeders;

use App\Models\StaffCabang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffCabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StaffCabang::factory(20)->create();
    }
}
