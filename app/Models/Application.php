<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'status',

    ];
    protected $casts = [
        'applied_at' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'Pending' => 'Menunggu',
            'Accepted' => 'Diterima',
            'Rejected' => 'Ditolak',
            default => 'Tidak Diketahui',
        };
    }
}
