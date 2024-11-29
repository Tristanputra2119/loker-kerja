<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Categoriesseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Teknologi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kesehatan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Keuangan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pendidikan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hukum', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Konstruksi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
