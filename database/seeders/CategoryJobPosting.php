<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryJobPosting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_job_posting')->insert([
            ['job_posting_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()], // Software Engineer - Teknologi
            ['job_posting_id' => 2, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()], // Digital Marketing Specialist - Teknologi
            ['job_posting_id' => 2, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()], // Digital Marketing Specialist - Keuangan
        ]);
    }
}
