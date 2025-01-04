<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $fillable = [
        'company_id',
        'job_category_id',
        'title',
        'description',
        'requirements',
        'salary',
        'location',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    // Relasi dengan testimonial (jika ada)
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'job_id', 'id');
    }
}
