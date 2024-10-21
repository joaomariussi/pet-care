<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Relacionamento com a tabela de proprietários
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owners::class, 'owner_id');
    }

    /**
     * Relacionamento com a tabela de históricos médicos
     * @return BelongsTo
     */
    public function medicalHistory(): BelongsTo
    {
        return $this->belongsTo(MedicalHistories::class, 'medical_history_id');
    }

    /**
     * Relacionamento com a tabela de agendamentos
     * @return HasMany
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointments::class, 'pet_id', 'id');
    }
}
