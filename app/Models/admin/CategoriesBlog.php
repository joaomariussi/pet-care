<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriesBlog extends Model
{
    /**
     * @var string
     */
    protected $table = 'categories_blog';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name-category',
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
    public function noticesBlog(): HasMany
    {
        return $this->hasMany(NoticesBlog::class, 'category_id', 'id');
    }
}