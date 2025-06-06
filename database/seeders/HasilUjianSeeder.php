<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HasilUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hasilUjian = [
            ['id' => 1, 'pendaftaran_id' => 6, 'skor_listening' => 200, 'skor_reading' => 200, 'total_skor' => 400],
        ];

        DB::table('hasil_ujian')->insert($hasilUjian);
    }
}
