<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    public function jobListings()
    {
        return $this->hasMany(JobListing::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
