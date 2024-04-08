<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "job_listing_id",
        "expected_salary",
        "cv_path"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jobListing()
    {
        return $this->belongsTo(JobListing::class);
    }
}
