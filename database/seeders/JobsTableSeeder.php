<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jobs')->insert([
            [
                'company_id' => 2, // Sesuaikan dengan ID perusahaan
                'job_category_id' => 1, // IT & Software
                'title' => 'Frontend Developer',
                'description' => 'Bertanggung jawab untuk pengembangan antarmuka pengguna website.',
                'requirements' => 'Menguasai HTML, CSS, JavaScript, dan React.js.',
                'salary' => 'Rp 8.000.000 - Rp 12.000.000',
                'location' => 'Surabaya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 2,
                'job_category_id' => 2, // Marketing
                'title' => 'Digital Marketing Specialist',
                'description' => 'Meningkatkan visibilitas produk di platform digital.',
                'requirements' => 'Pengalaman di bidang digital marketing minimal 2 tahun.',
                'salary' => 'Rp 6.000.000 - Rp 9.000.000',
                'location' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
