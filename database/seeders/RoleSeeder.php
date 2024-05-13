<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleAdmin->syncPermissions([
            'penerimaan',
            'peminjaman',
            'pengembalian',
            'pengambilan',
            'stock-opname',
            'report-peminjaman',
            'report-pengambilan',
            'debitur',
            'developer',
            'notaris',
            'staff-notaris',
            'staff-cabang',
            'kota',
            'kecamatan',
            'kelurahan',
            'kelola-akun',
            'kelola-role',
            'kelola-izin'
        ]);

        $roleUser = Role::create(['name' => 'User']);
        $roleUser->syncPermissions([
            'penerimaan',
            'peminjaman',
            'pengembalian',
            'pengambilan',
            'stock-opname',
            'report-peminjaman',
            'report-pengambilan',
            'debitur',
            'developer',
            'notaris',
            'staff-notaris',
            'staff-cabang',
            'kota',
            'kecamatan',
            'kelurahan',
        ]);
    }
}
