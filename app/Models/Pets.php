<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pets extends Model
{
    use HasFactory;

    protected $table = 'pets';

    protected $fillable = [
        'owner_id',
        'medical_history_id',
        'name',
        'date_birth',
        'species',
        'race',
        'gender',
        'color',
        'weight',
        'photo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owners::class, 'owner_id');
    }

    public function medicalHistory(): BelongsTo
    {
        return $this->belongsTo(MedicalHistories::class, 'medical_history_id');
    }
}
