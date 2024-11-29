<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Made Ngurah Tristan Putra',
                'email' => 'tristan@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'profile_picture' => null,
                'phone_number' => '081234567890',
                'address' => 'Jl. Pantai Kuta No.10, Bali',
                'description' => null,
                'industry' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PT Teknologi Nusantara',
                'email' => 'teknologi@example.com',
                'password' => Hash::make('password123'),
                'role' => 'company',
                'profile_picture' => null,
                'phone_number' => '081987654321',
                'address' => 'Jl. Sudirman No.1, Jakarta',
                'description' => 'Perusahaan teknologi terkemuka di Indonesia.',
                'industry' => 'Teknologi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
