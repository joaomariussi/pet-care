<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function position(): BelongsTo
    {
        return $this->belongsTo(Positions::class);
    }
}
