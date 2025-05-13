<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            ['admin_id' => 1, 'user_id' => 1, 'admin_nama' => 'Admin UPA']
        ];
        DB::table('admin')->insert($admin);
    }
}
