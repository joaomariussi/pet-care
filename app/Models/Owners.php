<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owners extends Model
{
    use HasFactory;

    protected $table = 'owners';

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'telephone',
        'cell_phone',
        'date_birth',
        'gender',
        'address',
        'neighborhood',
        'number',
        'complement',
        'zip_code',
        'city',
        'state',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Relacionamento com a tabela de agendamentos
     * @return HasMany
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointments::class, 'owner_id', 'id');
    }
}
