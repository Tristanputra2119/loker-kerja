<?php
// app/Models/Notification.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'message', // Pesan notifikasi
        'status', // Status notifikasi (pending, complete)
    ];

    // Jika Anda ingin menggunakan status enum, Anda bisa mendefinisikannya seperti ini:
    protected $casts = [
        'status' => 'string', // Memastikan status disimpan sebagai string
    ];
}
