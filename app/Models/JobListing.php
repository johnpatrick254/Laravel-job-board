<?php

namespace App\Models;

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

    public function scopeFilter(Builder | QueryBuilder $query, array $filters): Builder | QueryBuilder
    {
        return $query->when($filters['Search'] ?? null, function ($query) use ($filters) {
            return $query->where('title', 'like', "%" . $filters['Search'] . "%")->orWhere('description', 'like', "%" . $filters['Search'] . "%");
        })->when($filters['From'] ?? null, function ($query) use ($filters) {
            return $query->where("salary", '>=', $filters['From']);
        })->when($filters['To'] ?? null, function ($query) use ($filters) {
            return $query->where('salary', '<=', $filters['To']);
        })->when(($filters['experience']  !== 'null' && $filters['experience'] !== null), function ($query) use ($filters) {
            return $query->where('experience', $filters['experience']);
        })->when(($filters['category'] !== 'null' && $filters['category'] !== null), function ($query) use ($filters) {
            return $query->where('category', $filters['category']);
        });
    }
}
