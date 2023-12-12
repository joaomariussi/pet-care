<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

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
}
