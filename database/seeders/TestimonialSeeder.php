<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        Testimonial::create([
            'job_id' => 1,
            'user_name' => 'John Doe',
            'message' => 'This job was a great experience!'
        ]);

        Testimonial::create([
            'job_id' => 2,
            'user_name' => 'Jane Smith',
            'message' => 'Amazing opportunity with fantastic team.'
        ]);
    }
}
