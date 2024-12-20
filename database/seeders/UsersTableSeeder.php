<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'kuro',
                'email' => 'blacknigga@gmail.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'profile_picture' => null,
                'address' => 'Jl. Gatot Subroto No.3, Surabaya',
                'phone_number' => '03112345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
