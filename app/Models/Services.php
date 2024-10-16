<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
