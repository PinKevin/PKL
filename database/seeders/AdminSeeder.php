<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'nama' => 'Admin',
            'nip' => '12345678',
            'username' => 'admin',
            'password' => Hash::make('password')
        ]);

        $user->assignRole('Admin');
    }
}
