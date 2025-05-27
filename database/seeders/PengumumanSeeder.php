<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengumuman = [
            ['id' => 1, 'admin_id' => 1, 'judul' => 'Pengumuman test', 'isi' => 'dibuka pendaftara....'],
        ];

        DB::table('pengumuman')->insert($pengumuman);
    }
}
