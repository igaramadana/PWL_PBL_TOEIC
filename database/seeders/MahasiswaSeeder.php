<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa = [
            ['mahasiswa_id' => 1, 'user_id' => 2, 'nim' => '1234567890', 'mahasiswa_nama' => 'Mahasiswa A', 'no_telp' => '081234567890', 'angkatan' => 2023, 'prodi_id' => 1, 'status' => 'aktif', 'kampus_id' => 1, 'daftar_ujian' => false],
        ];
        DB::table('mahasiswa')->insert($mahasiswa);
    }
}
