<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusan = [
            ['jurusan_id' => 1, 'jurusan_kode' => 'JTI', 'jurusan_nama' => 'Jurusan Teknologi Informasi', 'kampus_id' => 1],
            ['jurusan_id' => 2, 'jurusan_kode' => 'JTS', 'jurusan_nama' => 'Jurusan Teknik Sipil', 'kampus_id' => 1],
        ];
        DB::table('jurusan')->insert($jurusan);
    }
}
