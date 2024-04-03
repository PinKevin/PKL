<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            IndoRegionSeeder::class,

            // dev
            // NotarisSeeder::class,
            // StaffNotarisSeeder::class,
            // StaffCabangSeeder::class,
            // DeveloperSeeder::class,
            // DebiturSeeder::class,
            // DokumenSeeder::class
        ]);
    }
}
