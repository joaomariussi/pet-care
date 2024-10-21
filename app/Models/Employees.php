<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employees extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'position_id',
        'name',
        'cpf',
        'email',
        'telephone',
        'admission_date',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Relacionamento com a tabela de cargos.
     * @return BelongsTo
     */
    public function position(): BelongsTo
    {
        return $this->belongsTo(Positions::class);
    }

    /**
     * Relacionamento com a tabela de agendamentos.
     * @return HasMany
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointments::class, 'employee_id', 'id');
    }
}
