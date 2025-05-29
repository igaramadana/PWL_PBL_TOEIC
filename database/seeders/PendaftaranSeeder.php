<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_ujian'    => 'Pendaftaran TOEIC Batch 1',
                'jadwal_ujian' => '2025-05-19',
                'waktu_ujian'   => '09:00:00',
                'kuota'        => 30,
                'admin_id'      => 1
            ],
            [
                'nama_ujian'    => 'Pendaftaran TOEIC Batch 2',
                'jadwal_ujian' => '2025-05-26',
                'waktu_ujian'   => '09:00:00',
                'kuota'        => 30,
                'admin_id'      => 1
            ],
            [
                'nama_ujian'    => 'Pendaftaran TOEIC Batch 3',
                'jadwal_ujian' => '2025-05-31',
                'waktu_ujian'   => '09:00:00',
                'kuota'        => 30,
                'admin_id'      => 1
            ]
        ];

        DB::table('pendaftaran')->insert($data);
    }
}