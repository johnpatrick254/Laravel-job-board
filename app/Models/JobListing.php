<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    public static $experienceLevels = [
        'entry',
        'intermediate',
        'senior'
    ];

    public static $categories = [
        'IT',
        'FINANCE',
        'SALES',
        'Marketing'
    ];
}
