<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobPostingseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_postings')->insert([
            [
                'user_id' => 2, // ID perusahaan
                'job_title' => 'Software Engineer',
                'job_description' => 'Bertanggung jawab untuk pengembangan perangkat lunak.',
                'requirements' => 'Menguasai bahasa pemrograman seperti PHP, JavaScript.',
                'salary' => 'Rp10.000.000 - Rp15.000.000',
                'location' => 'Jakarta',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // ID perusahaan
                'job_title' => 'Digital Marketing Specialist',
                'job_description' => 'Mengelola kampanye digital dan media sosial.',
                'requirements' => 'Berpengalaman di SEO, SEM, dan platform media sosial.',
                'salary' => 'Rp7.000.000 - Rp10.000.000',
                'location' => 'Bali',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
