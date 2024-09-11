<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owners extends Model
{
    use HasFactory;

    protected $table = 'proprietarios';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'celular',
        'data_nasc',
        'genero',
        'endereco',
        'bairro',
        'numero',
        'complemento',
        'cep',
        'cidade',
        'estado',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
