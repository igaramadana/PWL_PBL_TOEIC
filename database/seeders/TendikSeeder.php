<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TendikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tendik = [
            ['id' => 1, 'nip' => '12345678', 'user_id' => 3, 'tendik_nama' => 'Dosen A', 'no_telp' => '081234567890', 'kampus_id' => 1],
        ];
        DB::table('tendik')->insert($tendik);
    }
}
