<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi (fillable)
    protected $fillable = ['name', 'content'];
}
