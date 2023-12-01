<?php

namespace App\Models\site;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    /**
     * @var string
     */
    protected $table = 'notifications';

    /**
     * @var array
     */
    protected $fillable = [
        'message',
        'link',
        'type',
        'read'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
