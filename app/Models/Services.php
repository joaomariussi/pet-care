<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'duration',
        'simultaneous_services',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
