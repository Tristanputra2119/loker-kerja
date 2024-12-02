<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $fillable = [
        'company_id',
        'job_title',
        'job_description',
        'requirements',
        'salary',
        'location',
        'category',
    ];

}
