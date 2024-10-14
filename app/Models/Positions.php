<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $fillable = [
        'name',
        'description',
        'salary',
        'experience_with_animals',
        'additional_skills',
        'weekly_workload',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
