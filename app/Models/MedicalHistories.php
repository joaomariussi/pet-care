<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalHistories extends Model
{
    use HasFactory;

    protected $table = 'medical_histories';

    protected $fillable = [
        'pet_id',
        'veterinarian_id',
        'diagnosis',
        'treatment',
        'date',
        'observations',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public  function pet(): BelongsTo
    {
        return $this->belongsTo(Pets::class, 'pet_id');
    }

    public  function veterinarian(): BelongsTo
    {
        return $this->belongsTo(Veterinarians::class, 'veterinarian_id');
    }
}
