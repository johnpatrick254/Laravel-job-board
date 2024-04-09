<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
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
        'Finance',
        'Sales',
        'Marketing'
    ];
    public $fillable = [
        'title',
        'location',
        'salary',
        'description',
        'experience',
        'category',
    ];
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
    public function scopeFilter(Builder | QueryBuilder $query, array $filters): Builder | QueryBuilder
    {
        return $query->when($filters['Search'] ?? null, function ($query) use ($filters) {
            return $query->where('title', 'like', "%" . $filters['Search'] . "%")->orWhere('description', 'like', "%" . $filters['Search'] . "%");
        })->when($filters['From'] ?? null, function ($query) use ($filters) {
            return $query->where("salary", '>=', $filters['From']);
        })->when($filters['To'] ?? null, function ($query) use ($filters) {
            return $query->where('salary', '<=', $filters['To']);
        })->when(isset($filters['experience']) ? ($filters['experience']  !== null && $filters['experience'] !== "null") : null, function ($query) use ($filters) {
            return $query->where('experience', $filters['experience']);
        })->when(isset($filters['category']) ? ($filters['category'] !== 'null' && $filters['category'] !== null) : null, function ($query) use ($filters) {
            return $query->where('category', $filters['category']);
        });
    }

    public function hasUserApplied(Authenticatable |User |int $user)
    {
        return $this->where('id', $this->id)->whereHas('jobApplications', fn ($query) => $query->where('user_id', '=', $user->id ?? $user))->exists();
    }
}
