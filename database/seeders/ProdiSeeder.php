<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodi = [
            ['prodi_id' => 1, 'prodi_kode' => 'SIB', 'prodi_nama' => 'D-IV Sistem Informasi Bisnis', 'jurusan_id' => 1],
            ['prodi_id' => 2, 'prodi_kode' => 'TI', 'prodi_nama' => 'D-IV Teknik Informatika', 'jurusan_id' => 1],
            ['prodi_id' => 3, 'prodi_kode' => 'MRK', 'prodi_nama' => 'D-IV Manajemen Rekayasa Konstruksi', 'jurusan_id' => 2],
        ];
        DB::table('prodi')->insert($prodi);
    }
}
