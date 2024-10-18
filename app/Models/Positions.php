<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Relatcionamento com a tabela de funcionários
     * @return HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employees::class, 'position_id', 'id');
    }
}
