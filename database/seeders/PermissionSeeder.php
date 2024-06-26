<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'penerimaan', 'group' => 'transaksi']);
        Permission::create(['name' => 'peminjaman', 'group' => 'transaksi']);
        Permission::create(['name' => 'pengembalian', 'group' => 'transaksi']);
        Permission::create(['name' => 'pengambilan', 'group' => 'transaksi']);
        Permission::create(['name' => 'stock-opname', 'group' => 'report']);
        Permission::create(['name' => 'report-peminjaman', 'group' => 'report']);
        Permission::create(['name' => 'report-pengambilan', 'group' => 'report']);
        Permission::create(['name' => 'debitur', 'group' => 'master-data']);
        Permission::create(['name' => 'developer', 'group' => 'master-data']);
        Permission::create(['name' => 'notaris', 'group' => 'master-data']);
        Permission::create(['name' => 'staff-notaris', 'group' => 'master-data']);
        Permission::create(['name' => 'staff-cabang', 'group' => 'master-data']);
        Permission::create(['name' => 'kota', 'group' => 'master-data']);
        Permission::create(['name' => 'kecamatan', 'group' => 'master-data']);
        Permission::create(['name' => 'kelurahan', 'group' => 'master-data']);
        Permission::create(['name' => 'kelola-akun', 'group' => 'akun']);
        Permission::create(['name' => 'kelola-role', 'group' => 'akun']);
        Permission::create(['name' => 'kelola-izin', 'group' => 'akun']);
    }
}
