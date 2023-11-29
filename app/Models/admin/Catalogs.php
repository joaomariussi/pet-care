<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Catalogs extends Model
{

    /**
     * @var string
     */
    protected $fillable = [
        'name',
        'status',
        'fileUpload',
        'avatar'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
