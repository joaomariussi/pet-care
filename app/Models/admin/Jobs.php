<?php

namespace App\Models\admin;

use App\Models\site\Resumes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jobs extends Model
{
    /*
     * @var string
     */
    protected $table = 'registered_jobs';

    /*
     * @var string[]
     */
    protected $fillable = [
        'sector_id',
        'name',
        'description',
        'status',
    ];

    /*
     * @var string[]
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo
     */
    public function sectors(): BelongsTo
    {
        return $this->belongsTo(Sectors::class, 'sector_id', 'id');
    }

    public function resumes(): HasMany
    {
        return $this->hasMany(Resumes::class, 'job_id', 'id');
    }
}
