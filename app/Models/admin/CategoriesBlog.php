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
        'name_category',
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
     * @info Relacionamento com a tabela notices_blog
     * @return HasMany
     */
    public function noticesBlog(): HasMany
    {
        return $this->hasMany(NoticesBlog::class, 'category_id', 'id')
            ->orderBy('id', 'desc');
    }
}
