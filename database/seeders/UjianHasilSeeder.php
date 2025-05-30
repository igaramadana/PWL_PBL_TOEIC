<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UjianHasilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_hasil_ujian' => 'Hasil Ujian TOEIC Batch 1',
                'waktu_ujian' => '2025-05-19',
                'jam_ujian' => '09:00:00',
                'kuota' => 30,
                'status' => 'Sudah Dilaksanakan',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_hasil_ujian' => 'Hasil Ujian TOEIC Batch 2',
                'waktu_ujian' => '2025-05-26',
                'jam_ujian' => '09:00:00',
                'kuota' => 30,
                'status' => 'Belum Dilaksanakan',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_hasil_ujian' => 'Hasil Ujian TOEIC Batch 3',
                'waktu_ujian' => '2025-05-31',
                'jam_ujian' => '09:00:00',
                'kuota' => 30,
                'status' => 'Belum Dilaksanakan',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('ujian_hasil')->insert($data);
    }
}
