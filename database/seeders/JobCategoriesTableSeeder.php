<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_categories')->insert([
            ['name' => 'IT & Software', 'slug' => 'it-software', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Marketing', 'slug' => 'marketing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Human Resources', 'slug' => 'human-resources', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Finance', 'slug' => 'finance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Design', 'slug' => 'design', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
