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
                'name' => 'Admin Kampus',
                'email' => 'admin@kampus.ac.id',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'profile_picture' => null,
                'address' => 'Jl. Raya Kampus No.1, Denpasar, Bali',
                'phone_number' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'profile_picture' => null,
                'address' => 'Jl. Kebon Jeruk No.2, Jakarta',
                'phone_number' => '081987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PT Teknologi Indonesia',
                'email' => 'contact@teknologi.co.id',
                'password' => Hash::make('company123'),
                'role' => 'company',
                'profile_picture' => null,
                'address' => 'Jl. Gatot Subroto No.3, Surabaya',
                'phone_number' => '03112345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
