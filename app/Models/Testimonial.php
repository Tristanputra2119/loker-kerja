<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'user_name', 'message'];

    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }
}
