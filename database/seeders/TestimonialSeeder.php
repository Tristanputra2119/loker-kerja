<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        Testimonial::create([
            'name' => 'John Doe',
            'content' => 'This is a great job listing website!'
        ]);
        Testimonial::create([
            'name' => 'Jane Smith',
            'content' => 'I found my dream job here.'
        ]);
    }
}
