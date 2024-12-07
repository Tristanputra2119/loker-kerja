<?php
// app/Http/Controllers/NotificationController.php

// app/Http/Controllers/NotificationController.php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Gunakan paginate untuk mengambil data notifikasi dengan pagination
        $notifications = Notification::paginate(10);
        
        // Ambil notifikasi yang statusnya 'pending' untuk ikon pemberitahuan
        $pendingNotifications = Notification::where('status', 'pending')->get();
        
        return view('notifications.index', compact('notifications', 'pendingNotifications'));
    }

    public function update($id)
    {
        $notification = Notification::find($id);

        if ($notification) {
            $notification->status = 'complete';
            $notification->save();
        }

        return redirect()->route('notifications.index');
    }
}

