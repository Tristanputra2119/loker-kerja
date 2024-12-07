<?php

// database/seeders/NotificationSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan beberapa data notifikasi sebagai contoh
        Notification::create([
            'message' => 'You have a new job application.',
            'status' => 'pending',
        ]);

        Notification::create([
            'message' => 'Your application has been reviewed.',
            'status' => 'complete',
        ]);

        Notification::create([
            'message' => 'You have a new message from an employer.',
            'status' => 'pending',
        ]);
    }
}
