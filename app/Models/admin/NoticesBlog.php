<?php

namespace App\Models\admin;

use Carbon\Carbon;
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
        'slug',
        'subtitle',
        'content',
        'avatar',
        'status',
        'date',
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

    /**
     * @param $value
     * @return string
     */
    public function getDateAttribute($value): string
    {
        return $value ? (new Carbon($value))->format('Y-m-d') : '';
    }
}
