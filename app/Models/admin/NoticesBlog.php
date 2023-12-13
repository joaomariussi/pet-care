<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NoticesBlog extends Model
{
    /**
     * @var string
     */
    protected $table = 'notices_blog';

    /**
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'title',
        'subtitle',
        'content',
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
     * @return BelongsTo
     */
    public function categoryBlog(): BelongsTo
    {
        return $this->belongsTo(CategoriesBlog::class, 'category_id', 'id');
    }
}
