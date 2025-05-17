<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['id' => 1, 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'role_id' => 1],
            ['id' => 2, 'email' => 'mahasiswa@example.com', 'password' => Hash::make('password'), 'role_id' => 2],
            ['id' => 3, 'email' => 'tendik@example.com', 'password' => Hash::make('password'), 'role_id' => 3],
        ];

        DB::table('users')->insert($users);
    }
}
