<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class HomeConfig extends Model
{
    /**
     * @var string
     * @info Table name
     */
    protected $table = 'home_config';

    /**
     * @var string[]
     * @info Fillable fields
     */
    protected $fillable = [
        'home_title',
        'home_subtitle',
        'avatar'
    ];

    /**
     * @var string[]
     * @info Hidden fields
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
