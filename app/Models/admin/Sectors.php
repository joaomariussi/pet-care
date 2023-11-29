<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sectors extends Model{

    /**
     * @var string
     */
    protected $table = 'sectors';

    /**
     * @var string
     */
    protected $fillable = [
        'name',
        'description',
        'avatar',
        'status'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return HasMany
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Jobs::class, 'sector_id', 'id');
    }
}
