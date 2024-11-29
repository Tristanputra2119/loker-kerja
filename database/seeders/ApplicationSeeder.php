<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applications')->insert([
            [
                'job_posting_id' => 1,
                'user_id' => 1, // ID user pelamar
                'status' => 'Pending',
                'cover_letter' => 'Saya memiliki pengalaman 3 tahun di bidang pengembangan perangkat lunak.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
