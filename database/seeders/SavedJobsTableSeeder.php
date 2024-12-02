<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SavedJobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('saved_jobs')->insert([
            [
                'job_id' => 2, // Sesuaikan dengan ID job
                'user_id' => 2, // Sesuaikan dengan ID user
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
