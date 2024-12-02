<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'user_id' => 3, // Sesuaikan dengan ID user yang memiliki role company
                'company_name' => 'PT Teknologi Indonesia',
                'industry' => 'Teknologi',
                'website' => 'https://teknologi.co.id',
                'description' => 'Kami bergerak di bidang teknologi informasi, menyediakan solusi IT terbaik untuk perusahaan.',
                'logo' => null,
                'address' => 'Jl. Gatot Subroto No.3, Surabaya',
                'phone' => '03112345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
