<?php

namespace App\Models\site;

use Illuminate\Database\Eloquent\Model;

class Resumes extends Model
{

    /**
     * @var string
     */
    protected $table = 'resumes';

    /**
     * @var string
     */
    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'birth_date',
        'city',
        'state',
        'file_pdf'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
