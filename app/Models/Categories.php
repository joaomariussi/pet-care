<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Relacionamento com a tabela de serviços
     * @return HasMany
     */
    public function services(): HasMany
    {
        return $this->hasMany(Services::class, 'category_id', 'id');
    }
}
