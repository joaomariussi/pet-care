<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinarians extends Model
{
    use HasFactory;

    protected $table = 'veterinarians';

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'cell_phone',
        'crm',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
