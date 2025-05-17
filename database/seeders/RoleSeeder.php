<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => 1, 'role_kode' => 'ADM', 'role_nama' => 'Administrator'],
            ['id' => 2, 'role_kode' => 'MHS', 'role_nama' => 'Mahasiswa'],
            ['id' => 3, 'role_kode' => 'TND', 'role_nama' => 'Tenaga Pendidik'],
        ];
        DB::table('roles')->insert($roles);
    }
}
