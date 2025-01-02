<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $fillable = [
        'job_id',
        'user_id',
        'status',
        'applied_at',
        'applicant_name',
        'applicant_email',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'job_id', 'id');
    }
}
