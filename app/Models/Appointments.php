<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointments extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'pet_id',
        'owner_id',
        'service_id',
        'employee_id',
        'schedule_date',
        'schedule_time',
        'status',
        'observations'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pets::class, 'pet_id', 'id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owners::class, 'owner_id', 'id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employees::class, 'employee_id', 'id');
    }
}
