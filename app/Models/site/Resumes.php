<?php

namespace App\Models\site;

use App\Models\admin\Jobs;
use App\Models\admin\Sectors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

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

    public function job(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Jobs::class, 'job_id', 'id')->with('sectors');
    }
}
